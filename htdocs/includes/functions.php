<?php
// includes/functions.php
require 'db.php';
require 'faucetpay_api.php';

/**
 * Deposit funds to the user's account based on the cryptocurrency.
 *
 * @param int $user_id The ID of the user.
 * @param float $amount The amount to deposit.
 * @param string $currency The cryptocurrency (e.g., 'btc', 'eth').
 */
function deposit_funds($user_id, $amount, $currency) {
    global $pdo;

    // Determine which balance column to update based on the currency
    $currency_column = $currency . '_balance'; // e.g., 'btc_balance', 'eth_balance'

    // Update the user's balance for the selected currency
    $stmt = $pdo->prepare("UPDATE users SET $currency_column = $currency_column + :amount WHERE id = :user_id");
    $stmt->execute(['amount' => $amount, 'user_id' => $user_id]);
}

function withdraw_funds($user_email, $user_id, $amount, $currency) {
    global $pdo;

    // Get the user's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Check if email is valid
    if (empty($user_email)) {
        echo "Invalid user email.";
        return false;
    }

    // List of supported currencies
    $supported_currencies = [
        'btc', 'eth', 'doge', 'ltc', 'bch', 'dash', 'dgb', 'trx', 'usdt', 'fey', 
        'zec', 'bnb', 'sol', 'xrp', 'matic', 'ada', 'ton', 'xlm', 'usdc', 'xmr', 'tara'
    ];

    // Ensure the currency is supported
    if (!in_array(strtolower($currency), $supported_currencies)) {
        echo "Unsupported currency: " . strtoupper($currency);
        return false;
    }

    // Determine which balance column to check and update based on the currency
    $currency_column = $currency . '_balance'; // e.g., 'btc_balance', 'eth_balance'

    // Fetch the user's balance for the selected currency
    $stmt = $pdo->prepare("SELECT $currency_column, email FROM users WHERE email = :email");
    $stmt->execute(['email' => $user_email]);
    $user = $stmt->fetch();

    // Check if the user exists
    if (!$user) {
        echo "User not found with email: $user_email.";
        return false;
    }

    // Check if the user has enough balance for the withdrawal
    if ($user[$currency_column] >= $amount) {
        // Convert the amount to satoshis (or equivalent for other coins)
        $amount_after_fee = $amount * 0.98;
        $amount_in_satoshis = $amount_after_fee * 100000000;  // Adjust this conversion for non-BTC currencies if needed

        // Log the withdrawal request as "pending"
        $stmt = $pdo->prepare("INSERT INTO withdraw_requests (user_id, amount, currency, ip_address, status, created_at) 
                               VALUES (:user_id, :amount, :currency, :ip_address, 'pending', NOW())");
        $stmt->execute([
            'user_id' => $user_id, 
            'amount' => $amount, 
            'currency' => strtoupper($currency),
            'ip_address' => $ip_address
        ]);
        $withdraw_request_id = $pdo->lastInsertId();  // Get the inserted withdrawal request ID

        // Call the FaucetPay API to process the withdrawal
        $response = faucetpay_api_request('send', [
            'api_key' => 'YOUR_API_KEY',  // Replace with your actual API key
            'to' => $user_email,  // The user's registered email
            'amount' => $amount_in_satoshis,
            'currency' => strtoupper($currency), // Currency in uppercase, e.g., 'BTC', 'ETH', 'DOGE'
            'ip_address' => $ip_address  // Send the IP address for anti-fraud checks
        ]);

        // Check if the API request was successful
        if ($response['status'] == 200) {
            // Only deduct the withdrawn amount **AFTER** the API confirms success
            $stmt = $pdo->prepare("UPDATE users SET $currency_column = $currency_column - :amount WHERE email = :email");
            $stmt->execute(['amount' => $amount, 'email' => $user_email]);

            // Update the withdrawal request as "completed" and store payout_user_hash
            $stmt = $pdo->prepare("UPDATE withdraw_requests SET status = 'completed', payout_user_hash = :payout_user_hash, completed_at = NOW() WHERE id = :id");
            $stmt->execute([
                'payout_user_hash' => $response['payout_user_hash'],  // Store the payout_user_hash
                'id' => $withdraw_request_id
            ]);

            echo "Withdraw successful!";
            return true; // Withdrawal successful
        } else {
            // Update the withdrawal request as "failed"
            $stmt = $pdo->prepare("UPDATE withdraw_requests SET status = 'failed', completed_at = NOW() WHERE id = :id");
            $stmt->execute(['id' => $withdraw_request_id]);

            echo "Withdrawal failed: " . $response['message'];
            return false; // Withdrawal failed
        }
    } else {
        echo "Insufficient balance for withdrawal.";
        return false; // User does not have enough balance
    }
}




