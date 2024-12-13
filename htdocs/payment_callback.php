<?php
require 'includes/db.php';
$config = require 'config/config.php'; // Load the config file

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Step 1: Get the payment token from FaucetPay
$token = $_POST['token'] ?? null;

// Check if token is present
if (!$token) {
    die('Invalid token or no token provided.');
}

// Step 2: Use the token to retrieve payment information from FaucetPay
$payment_info = file_get_contents("https://faucetpay.io/merchant/get-payment/" . $token);
$payment_info = json_decode($payment_info, true);

// Step 3: Validate the token status and merchant
$token_status = $payment_info['valid'];
$merchant_username = $payment_info['merchant_username'];  // From FaucetPay
$amount1 = $payment_info['amount1'];  // Amount the user paid
$currency1 = $payment_info['currency1'];  // Currency the user deposited
$custom_id = $payment_info['custom'];  // The user ID or custom identifier you set
$transaction_id = $payment_info['transaction_id'] ?? null;  // Unique transaction ID from FaucetPay

// Fetch your merchant username from config.php
$my_username = $config['faucetpay']['username'];  // Your FaucetPay merchant username from config

// Debug output for verification purposes
file_put_contents('callback_log.txt', print_r($payment_info, true), FILE_APPEND);

// Step 4: Check if the payment is valid and matches your details
if ($my_username == $merchant_username && $token_status == true) {
    
    // Step 5: Check if this transaction has already been processed
    $stmt = $pdo->prepare("SELECT * FROM deposit_requests WHERE transaction_id = :transaction_id");
    $stmt->execute(['transaction_id' => $transaction_id]);
    $existing_transaction = $stmt->fetch();

    if ($existing_transaction) {
        die('This transaction has already been processed.');
    }

    // Step 6: Insert the deposit request as a completed entry
    $stmt = $pdo->prepare("INSERT INTO deposit_requests (user_id, amount, currency, status, transaction_id, completed_at) 
                           VALUES (:user_id, :amount, :currency, 'completed', :transaction_id, NOW())");
    $stmt->execute([
        'user_id' => $custom_id,
        'amount' => $amount1,
        'currency' => strtoupper($currency1),
        'transaction_id' => $transaction_id
    ]);

    // Step 7: Update the user's balance based on the currency
    switch ($currency1) {
        case 'BTC':
            $stmt = $pdo->prepare("UPDATE users SET btc_balance = btc_balance + :amount WHERE id = :user_id");
            break;
        case 'ETH':
            $stmt = $pdo->prepare("UPDATE users SET eth_balance = eth_balance + :amount WHERE id = :user_id");
            break;
        case 'DOGE':
            $stmt = $pdo->prepare("UPDATE users SET doge_balance = doge_balance + :amount WHERE id = :user_id");
            break;
        case 'LTC':
            $stmt = $pdo->prepare("UPDATE users SET ltc_balance = ltc_balance + :amount WHERE id = :user_id");
            break;
        case 'BCH':
            $stmt = $pdo->prepare("UPDATE users SET bch_balance = bch_balance + :amount WHERE id = :user_id");
            break;
        case 'DASH':
            $stmt = $pdo->prepare("UPDATE users SET dash_balance = dash_balance + :amount WHERE id = :user_id");
            break;
        case 'DGB':
            $stmt = $pdo->prepare("UPDATE users SET dgb_balance = dgb_balance + :amount WHERE id = :user_id");
            break;
        case 'TRX':
            $stmt = $pdo->prepare("UPDATE users SET trx_balance = trx_balance + :amount WHERE id = :user_id");
            break;
        case 'USDT':
            $stmt = $pdo->prepare("UPDATE users SET usdt_balance = usdt_balance + :amount WHERE id = :user_id");
            break;
        case 'FEY':
            $stmt = $pdo->prepare("UPDATE users SET fey_balance = fey_balance + :amount WHERE id = :user_id");
            break;
        case 'ZEC':
            $stmt = $pdo->prepare("UPDATE users SET zec_balance = zec_balance + :amount WHERE id = :user_id");
            break;
        case 'BNB':
            $stmt = $pdo->prepare("UPDATE users SET bnb_balance = bnb_balance + :amount WHERE id = :user_id");
            break;
        case 'SOL':
            $stmt = $pdo->prepare("UPDATE users SET sol_balance = sol_balance + :amount WHERE id = :user_id");
            break;
        case 'XRP':
            $stmt = $pdo->prepare("UPDATE users SET xrp_balance = xrp_balance + :amount WHERE id = :user_id");
            break;
        case 'MATIC':
            $stmt = $pdo->prepare("UPDATE users SET matic_balance = matic_balance + :amount WHERE id = :user_id");
            break;
        case 'ADA':
            $stmt = $pdo->prepare("UPDATE users SET ada_balance = ada_balance + :amount WHERE id = :user_id");
            break;
        case 'TON':
            $stmt = $pdo->prepare("UPDATE users SET ton_balance = ton_balance + :amount WHERE id = :user_id");
            break;
        case 'XLM':
            $stmt = $pdo->prepare("UPDATE users SET xlm_balance = xlm_balance + :amount WHERE id = :user_id");
            break;
        case 'USDC':
            $stmt = $pdo->prepare("UPDATE users SET usdc_balance = usdc_balance + :amount WHERE id = :user_id");
            break;
        case 'XMR':
            $stmt = $pdo->prepare("UPDATE users SET xmr_balance = xmr_balance + :amount WHERE id = :user_id");
            break;
        case 'TARA':
            $stmt = $pdo->prepare("UPDATE users SET tara_balance = tara_balance + :amount WHERE id = :user_id");
            break;
        default:
            die('Unsupported currency.');
    }

    // Execute the balance update
    $stmt->execute(['amount' => $amount1, 'user_id' => $custom_id]);

    // Step 8: Check if the user has a referrer and give 2% to the referrer
    $stmt = $pdo->prepare("SELECT referrer_id FROM users WHERE id = :user_id");
    $stmt->execute(['user_id' => $custom_id]);
    $referrer_id = $stmt->fetchColumn();

    if ($referrer_id) {
        // Calculate 2% referral bonus
        $referral_bonus = $amount1 * 0.02;

        // Add referral bonus to the referrer's balance in the same currency
        $stmt = $pdo->prepare("UPDATE users SET {$currency1}_balance = {$currency1}_balance + :referral_bonus WHERE id = :referrer_id");
        $stmt->execute([
            'referral_bonus' => $referral_bonus,
            'referrer_id' => $referrer_id
        ]);

        // Log referral earnings into the referral_earnings table
        $stmt = $pdo->prepare("INSERT INTO referral_earnings (referrer_id, referred_user_id, amount, currency, bonus) 
                               VALUES (:referrer_id, :referred_user_id, :amount, :currency, :bonus)");
        $stmt->execute([
            'referrer_id' => $referrer_id,
            'referred_user_id' => $custom_id,
            'amount' => $amount1,
            'currency' => strtoupper($currency1),
            'bonus' => $referral_bonus
        ]);

        // Log referral activity (optional)
        file_put_contents('referral_log.txt', "Referrer ID: $referrer_id received $referral_bonus $currency1 for referring User ID: $custom_id\n", FILE_APPEND);
    }

    echo "Deposit confirmed, balance updated, and referral bonus applied!";
} else {
    echo "Payment validation failed. Possible hacking attempt.";
}
?>
