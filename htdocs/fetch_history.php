<?php
// Set the timezone to GMT+7 globally
date_default_timezone_set('Asia/Bangkok');

// Only start session if it isn't already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'config/config.php'; // Load configuration settings
require 'includes/db.php';  // Database connection

header('Content-Type: application/json');

// Define the log file path
$log_file = 'debug.txt';  // Path to log file

// Logging function to write data to debug.txt
function log_to_file($message) {
    global $log_file;
    file_put_contents($log_file, date('[Y-m-d H:i:s] ') . $message . "\n", FILE_APPEND);
}

if (!isset($_SESSION['user_id'])) {
    log_to_file('Error: User not logged in');
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Fetch the last 10 bets from the current user's betting history
    $stmt = $pdo->prepare("SELECT bet_amount, bet_choice, currency, client_seed, server_seed, dice_roll, result, amount_change FROM betting_history WHERE user_id = :user_id ORDER BY id DESC LIMIT 10");
    $stmt->execute(['user_id' => $user_id]);
    $user_bets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Log the user bets for debugging
    log_to_file('User Bets: ' . print_r($user_bets, true));

    // Fetch the last 10 bets from all users
    $stmt = $pdo->prepare("SELECT bh.bet_amount, bh.bet_choice, bh.currency, bh.client_seed, bh.server_seed, bh.dice_roll, bh.result, bh.amount_change, u.username 
                           FROM betting_history bh 
                           JOIN users u ON bh.user_id = u.id 
                           ORDER BY bh.id DESC LIMIT 10");
    $stmt->execute();
    $all_bets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Log the all bets for debugging
    log_to_file('All Bets: ' . print_r($all_bets, true));

    echo json_encode([
        'user_bets' => $user_bets,
        'all_bets' => $all_bets
    ]);
} catch (PDOException $e) {
    log_to_file('Database error: ' . $e->getMessage());
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
