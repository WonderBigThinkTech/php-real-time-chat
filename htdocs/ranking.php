<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

// Check if the user is logged in, otherwise redirect to login
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

// Include necessary files
require 'includes/db.php';
require 'config/config.php';

// Mapping between currency codes and crypto_names in crypto_rates table
$crypto_rate_mapping = [
    'btc' => 'bitcoin',
    'eth' => 'ethereum',
    'doge' => 'dogecoin',
    'ltc' => 'litecoin',
    'bch' => 'bitcoin-cash',
    'dash' => 'dash',
    'dgb' => 'digibyte',
    'trx' => 'tron',
    'usdt' => 'tether',
    'fey' => 'feyorra',
    'zec' => 'zcash',
    'bnb' => 'binancecoin',
    'sol' => 'solana',
    'xrp' => 'ripple',
    'matic' => 'matic-network',
    'ada' => 'cardano',
    'ton' => 'the-open-network',
    'xlm' => 'stellar',
    'usdc' => 'usd-coin',
    'xmr' => 'monero',
    'tara' => 'taraxa'
];

// Helper to get the first day of the current month
$firstOfMonth = date('Y-m-01');

// Fetch total wagered amount in USD for the last 7 days (starting from the 1st of the month)
$wagersLast7Days = $pdo->prepare("
    SELECT u.username, SUM(bh.bet_amount * cr.rate_usd) AS total_wagered_usd
    FROM betting_history bh
    JOIN crypto_rates cr ON cr.crypto_name = :mapped_currency
    JOIN users u ON bh.user_id = u.id
    WHERE bh.created_at >= :first_of_month
    AND bh.currency = :currency
    GROUP BY bh.user_id
    ORDER BY total_wagered_usd DESC
    LIMIT 10
");

// Fetch total wagered amount in USD for the last 30 days (starting from the 1st of the month)
$wagersLast30Days = $pdo->prepare("
    SELECT u.username, SUM(bh.bet_amount * cr.rate_usd) AS total_wagered_usd
    FROM betting_history bh
    JOIN crypto_rates cr ON cr.crypto_name = :mapped_currency
    JOIN users u ON bh.user_id = u.id
    WHERE bh.created_at >= :first_of_month
    AND bh.currency = :currency
    GROUP BY bh.user_id
    ORDER BY total_wagered_usd DESC
    LIMIT 10
");

// Process wager data for both 7 days and 30 days
$topWagers7 = [];
$topWagers30 = [];

foreach ($crypto_rate_mapping as $currency_code => $crypto_name) {
    // 7 days
    $wagersLast7Days->execute([
        ':currency' => $currency_code,
        ':mapped_currency' => $crypto_name,
        ':first_of_month' => $firstOfMonth
    ]);
    $results7 = $wagersLast7Days->fetchAll(PDO::FETCH_ASSOC);
    $topWagers7 = array_merge($topWagers7, $results7);

    // 30 days
    $wagersLast30Days->execute([
        ':currency' => $currency_code,
        ':mapped_currency' => $crypto_name,
        ':first_of_month' => $firstOfMonth
    ]);
    $results30 = $wagersLast30Days->fetchAll(PDO::FETCH_ASSOC);
    $topWagers30 = array_merge($topWagers30, $results30);
}

// Sort and limit to top 10
usort($topWagers7, function ($a, $b) {
    return $b['total_wagered_usd'] - $a['total_wagered_usd'];
});
$topWagers7 = array_slice($topWagers7, 0, 10);

usort($topWagers30, function ($a, $b) {
    return $b['total_wagered_usd'] - $a['total_wagered_usd'];
});
$topWagers30 = array_slice($topWagers30, 0, 10);

// Fetch number of claims for the last 7 and 30 days (starting from the 1st of the month)
$claimsLast7Days = $pdo->prepare("
    SELECT u.username, COUNT(dc.id) AS total_claims
    FROM daily_claims dc
    JOIN users u ON dc.user_id = u.id
    WHERE dc.claim_time >= :first_of_month
    GROUP BY dc.user_id
    ORDER BY total_claims DESC
    LIMIT 10
");

$claimsLast7Days->execute([':first_of_month' => $firstOfMonth]);
$topClaims7 = $claimsLast7Days->fetchAll(PDO::FETCH_ASSOC);

$claimsLast30Days = $pdo->prepare("
    SELECT u.username, COUNT(dc.id) AS total_claims
    FROM daily_claims dc
    JOIN users u ON dc.user_id = u.id
    WHERE dc.claim_time >= :first_of_month
    GROUP BY dc.user_id
    ORDER BY total_claims DESC
    LIMIT 10
");

$claimsLast30Days->execute([':first_of_month' => $firstOfMonth]);
$topClaims30 = $claimsLast30Days->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table { font-size: 0.85rem; }
        .ranking-number { width: 40px; }
        .table-responsive { margin-bottom: 30px; }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Ranking - Total Wagered and Claims</h1>
<center><p>Every date 1, top 1 Wagered on Dice game will receive $100 USDT into their balance</p></center>
    <div class="row">
        <!-- Compact Table for Wagered (7 Days) -->
        <div class="col-md-6">
            <h3 class="text-center">Total Wagered (7 Days)</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="ranking-number">#</th>
                        <th>Username</th>
                        <th>Total Wagered (USD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($topWagers7 as $index => $wager): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($wager['username']); ?></td>
                            <td><?= number_format($wager['total_wagered_usd'], 8); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Compact Table for Wagered (30 Days) -->
        <div class="col-md-6">
            <h3 class="text-center">Total Wagered (30 Days)</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="ranking-number">#</th>
                        <th>Username</th>
                        <th>Total Wagered (USD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($topWagers30 as $index => $wager): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($wager['username']); ?></td>
                            <td><?= number_format($wager['total_wagered_usd'], 8); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Compact Table for Claimed (7 Days) -->
        <div class="col-md-6">
            <h3 class="text-center">Total Claims (7 Days)</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="ranking-number">#</th>
                        <th>Username</th>
                        <th>Total Claims</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($topClaims7 as $index => $claim): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                                                        <td><?= htmlspecialchars($claim['username']); ?></td>
                            <td><?= $claim['total_claims']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Compact Table for Claimed (30 Days) -->
        <div class="col-md-6">
            <h3 class="text-center">Total Claims (30 Days)</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="ranking-number">#</th>
                        <th>Username</th>
                        <th>Total Claims</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($topClaims30 as $index => $claim): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($claim['username']); ?></td>
                            <td><?= $claim['total_claims']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

