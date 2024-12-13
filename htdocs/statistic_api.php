<?php
require 'includes/db.php';
require 'config/config.php';

// Get page and rowsPerPage parameters from the request
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = isset($_GET['rowsPerPage']) ? (int)$_GET['rowsPerPage'] : 10;
$offset = ($page - 1) * $rowsPerPage;

// Fetch the latest crypto rates from the 'crypto_rates' table
$stmt_rates = $pdo->query("SELECT crypto_name, rate_usd FROM crypto_rates");
$crypto_rates = $stmt_rates->fetchAll(PDO::FETCH_KEY_PAIR);

// Currency mapping
$currency_mapping = [
    'BTC' => 'bitcoin',
    'ETH' => 'ethereum',
    'DOGE' => 'dogecoin',
    'LTC' => 'litecoin',
    'BCH' => 'bitcoin-cash',
    'DASH' => 'dash',
    'DGB' => 'digibyte',
    'TRX' => 'tron',
    'USDT' => 'tether',
    'FEY' => 'feyorra',
    'ZEC' => 'zcash',
    'BNB' => 'binancecoin',
    'SOL' => 'solana',
    'XRP' => 'ripple',
    'MATIC' => 'matic-network',
    'ADA' => 'cardano',
    'TON' => 'the-open-network',
    'XLM' => 'stellar',
    'USDC' => 'usd-coin',
    'XMR' => 'monero',
    'TARA' => 'taraxa'
];

// Initialize total deposit and withdrawal values in USD
$total_withdrawals_usd = 0;
$total_deposits_usd = 0;

// Query for all withdrawals (for total calculation)
$stmt_all_withdrawals = $pdo->query("SELECT amount, currency FROM withdraw_requests");
$all_withdrawals = $stmt_all_withdrawals->fetchAll(PDO::FETCH_ASSOC);

// Calculate total withdrawals in USD (for all records)
foreach ($all_withdrawals as $withdrawal) {
    $currency = strtoupper($withdrawal['currency']);
    $amount = $withdrawal['amount'];

    if (isset($currency_mapping[$currency])) {
        $mapped_currency = $currency_mapping[$currency];
        if (isset($crypto_rates[$mapped_currency])) {
            $rate_usd = $crypto_rates[$mapped_currency];
            $total_withdrawals_usd += $amount * $rate_usd;
        }
    }
}

// Query for all deposits (for total calculation)
$stmt_all_deposits = $pdo->query("SELECT amount, currency FROM deposit_requests");
$all_deposits = $stmt_all_deposits->fetchAll(PDO::FETCH_ASSOC);

// Calculate total deposits in USD (for all records)
foreach ($all_deposits as $deposit) {
    $currency = strtoupper($deposit['currency']);
    $amount = $deposit['amount'];

    if (isset($currency_mapping[$currency])) {
        $mapped_currency = $currency_mapping[$currency];
        if (isset($crypto_rates[$mapped_currency])) {
            $rate_usd = $crypto_rates[$mapped_currency];
            $total_deposits_usd += $amount * $rate_usd;
        }
    }
}

// Query for paginated withdrawals
$stmt_withdrawals = $pdo->prepare("
    SELECT w.amount, w.currency, w.status, w.completed_at, w.payout_user_hash, u.username 
    FROM withdraw_requests w 
    JOIN users u ON w.user_id = u.id
    ORDER BY w.completed_at DESC
    LIMIT :offset, :rowsPerPage
");
$stmt_withdrawals->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_withdrawals->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
$stmt_withdrawals->execute();
$withdrawals = $stmt_withdrawals->fetchAll(PDO::FETCH_ASSOC);

// Query for paginated deposits
$stmt_deposits = $pdo->prepare("
    SELECT d.amount, d.currency, d.status, d.completed_at, d.transaction_id, u.username 
    FROM deposit_requests d 
    JOIN users u ON d.user_id = u.id
    ORDER BY d.completed_at DESC
    LIMIT :offset, :rowsPerPage
");
$stmt_deposits->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_deposits->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
$stmt_deposits->execute();
$deposits = $stmt_deposits->fetchAll(PDO::FETCH_ASSOC);

// Query to get the total number of withdrawals and deposits (for pagination)
$total_withdrawals_stmt = $pdo->query("SELECT COUNT(*) FROM withdraw_requests");
$total_withdrawals = $total_withdrawals_stmt->fetchColumn();

$total_deposits_stmt = $pdo->query("SELECT COUNT(*) FROM deposit_requests");
$total_deposits = $total_deposits_stmt->fetchColumn();

// Return data as JSON
$response = [
    'total_withdrawals_usd' => number_format($total_withdrawals_usd, 2),
    'total_deposits_usd' => number_format($total_deposits_usd, 2),
    'total_deposits' => $total_deposits,
    'total_withdrawals' => $total_withdrawals,
    'withdrawals' => $withdrawals,
    'deposits' => $deposits,
    'rows_per_page' => $rowsPerPage
];

header('Content-Type: application/json');
echo json_encode($response);
