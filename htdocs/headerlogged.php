<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

// Check if the user is logged in, otherwise redirect to login
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

// Define $user_id from the session at the start
$user_id = $_SESSION['user_id'];

// Include necessary files
require 'includes/db.php';
require 'config/config.php'; // Ensure config file is loaded
require 'includes/functions.php';

// Fetch user details and balances (including username and level)
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user data is available
if (!$user) {
    die('User not found.');
}

// Retrieve the username and level from the fetched user data
$username = htmlspecialchars($user['username']); // Safely handle the username for display
$level = $user['level']; // Fetch the user's current level

// Other variable initializations
$email = $user['email']; // Fetch the user's email for further processing
$base_url = $config['app']['url'];
$base_name = $config['app']['name'];
$base_author = $config['app']['author'];
$base_description = $config['app']['description'];
$last_active = $user['last_active'];
$formatted_date = date("d M, Y", strtotime($last_active));

// Create referral link
$referral_link = $base_url . "/register?ref=" . urlencode($user['id']);  // Assuming you use 'id' for referral code

// Include rates.php to get the total USD balance
$total_usd_balance = include 'rates.php';  // This will return the total balance from rates.php

// Fetch the number of joined users
$stmt_joined = $pdo->prepare("SELECT COUNT(*) as total_joined FROM users WHERE referrer_id = :user_id");
$stmt_joined->execute(['user_id' => $user_id]);
$joined_data = $stmt_joined->fetch(PDO::FETCH_ASSOC);
$total_joined = $joined_data['total_joined'] ?? 0;

// Step 1: Get all referred users' IDs (users where referrer_id = logged-in user id)
$referred_stmt = $pdo->prepare("SELECT id FROM users WHERE referrer_id = :user_id");
$referred_stmt->execute(['user_id' => $user_id]);
$referred_user_ids = $referred_stmt->fetchAll(PDO::FETCH_COLUMN);

// Check if there are referred users
if (empty($referred_user_ids)) {
    $total_referral_earnings = 0;
} else {
    // Step 2: Count the total number of transactions (rows) in referral_earnings for referred users
    $in_query = implode(',', array_fill(0, count($referred_user_ids), '?'));  // Prepare the placeholder for the IN query

    $stmt = $pdo->prepare("SELECT COUNT(*) as total_referral_earnings FROM referral_earnings WHERE referred_user_id IN ($in_query)");
    $stmt->execute($referred_user_ids);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get the total referral earnings count
    $total_referral_earnings = $result['total_referral_earnings'] ?? 0;
}

// Set the user's theme (default to light if not set)
$theme = isset($user['theme']) ? $user['theme'] : 'light';

?>



<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo $base_url; ?>">
    <meta charset="utf-8">
    <meta name="author" content="<?php echo $base_author; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $base_description; ?>">
    <meta name="keywords" content="FaucetPay, crypto faucet, cryptocurrency staking, earn Bitcoin, earn Ethereum, free crypto faucet, passive income, FaucetMineHub, daily faucet claims, staking rewards">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>FaucetPay Staking Platform | <?php echo $base_name; ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/dashlite.css">
    <link id="skin-default" rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/theme.css">
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5CCTVBRLDZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5CCTVBRLDZ');
</script>
</head>

<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="dashboard" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/FMH_LOGO_01.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <span class="nio-version">Crypto</span>
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-widget d-none d-xl-block">
                                <div class="user-account-info between-center">
                                    <div class="user-account-main">
                                        <h6 class="overline-title-alt">Available Balance</h6>
                                        <div class="user-balance"><?php echo number_format($total_usd_balance, 4); ?> <small class="currency currency-btc">USD</small></div>
                                    </div>
                                </div>
                                <div class="user-account-actions">
                                    <ul class="g-3">
                                        <li><a href="deposit" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                                        <li><a href="withdraw" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .nk-sidebar-widget -->
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu">
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Help</h6>
                                        <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                            <span class="nk-menu-text">How it's Works?</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="docs/chat.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Chat</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="docs/daily.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Daily</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="docs/staking.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Staking</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="docs/deposit.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Deposit</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="docs/withdraw.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Withdraw</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="docs/referrals.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Referrals</span></a>
                                            </li>
                                        </ul><!-- .nk-menu-sub -->
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Games</h6>
                                        <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                                            <span class="nk-menu-text">Dice</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="dice_trx" target="_blank" class="nk-menu-link"><span class="nk-menu-text">Tron</span></a>
                                            </li>
                                        </ul><!-- .nk-menu-sub -->
                                    </li><!-- .nk-menu-item -->
                                    </li>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Menu</h6>
                                    </li>
                                    </li><li class="nk-menu-item">
                                        <a href="ranking" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-hot"></em></span>
                                            <span class="nk-menu-text">Ranking</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="dashboard" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="daily" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-fill"></em></span>
                                            <span class="nk-menu-text">Daily Coin</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="staking" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                            <span class="nk-menu-text">Stake Now</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="active_stakes" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                            <span class="nk-menu-text">Active Staking</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="calculator" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-calc"></em></span>
                                            <span class="nk-menu-text">Calculator</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="swap" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                            <span class="nk-menu-text">Swap</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="history" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-history"></em></span>
                                            <span class="nk-menu-text">History</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="referral_earnings" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-network"></em></span>
                                            <span class="nk-menu-text">Referrals</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="profile" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                            <span class="nk-menu-text">Profile</span>
                                        </a>
                                    </li><li class="nk-menu-item">
                                        <a href="statistic" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                            <span class="nk-menu-text">Global Statistic</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Follow Us</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="https://t.me/faucetminehub" target="_blank" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-telegram"></em></span>
                                            <span class="nk-menu-text">Telegram</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="https://discord.gg/h5XQuq3wPN" target="_blank" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-sign-steem"></em></span>
                                            <span class="nk-menu-text">Join Discord</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="https://www.trustpilot.com/review/faucetminehub.com?utm_medium=trustbox&utm_source=TrustBoxReviewCollector" target="_blank" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-telegram"></em></span>
                                            <span class="nk-menu-text">Trust Pilot</span>
                                        </a>
                                    </li>
                                </ul><!-- .nk-menu -->
                            </div><!-- .nk-sidebar-menu -->
                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-body -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="dashboard" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/FMH_LOGO_01.png" srcset="./images/FMH_LOGO_01.png" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/FMH_LOGO_01.png" srcset="./images/FMH_LOGO_01.png" alt="logo-dark">
                                    <span class="nio-version">Crypto</span>
                                </a>
                            </div>
<div class="nk-header-news d-none d-xl-block">
    <div class="nk-news-list">
        <a class="nk-news-item">
            <div class="nk-news-icon">
                <em class="icon ni ni-card-view"></em>
            </div>
            <p id="server-time">Server Time : Loading...</p>
        </a>
    </div>
</div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status user-status-verified">Online</div>
                                                    <div class="user-name dropdown-indicator"><?php echo htmlspecialchars($user['username']); ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span><?php echo htmlspecialchars(substr($user['username'], 0, 2)); ?></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php echo strtoupper(htmlspecialchars($user['username'])); ?></span>
                                                        <span class="sub-text"><?php echo htmlspecialchars($user['email']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner user-account-info">
                                                <h6 class="overline-title-alt">FaucetMineHub Wallet</h6>
                                                <div class="user-balance"><?php echo number_format($total_usd_balance, 2); ?> <small class="currency currency-btc">USD</small></div>
                                                <a href="withdraw" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->