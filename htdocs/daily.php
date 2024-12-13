<?php
// Set the timezone to GMT+7 globally
date_default_timezone_set('Asia/Bangkok');  // This sets GMT+7 timezone

// Only start session if it isn't already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'includes/db.php';  // Database connection
$config = require 'config/config.php';  // Load your config file with claim settings

$successMessage = '';
$errorMessage = '';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}
$user_id = $_SESSION['user_id'];

// Prepare a query to fetch the username based on the user_id
$stmt = $pdo->prepare('SELECT username FROM users WHERE id = :user_id');
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Retrieve the username from the database result
    $username = htmlspecialchars($user['username']);
}

// Chatbox configuration
$secret = "1cKsFI7qogLAYbun";

// Assuming $user['username'] contains the logged-in user's username
$params = array(
    'boxid' => 953445,
    'boxtag' => '5KfazJ', 
    'nme' => $username,
    'lnk' => '',
    'pic' => 'https://faucetminehub.com/1485477097-avatar_78580.png'
);

$arr = array();
foreach ($params as $k => $v) {
    if (!$v) {
        continue;
    }
    $arr[] = $k.'='.urlencode($v);
}

$path = '/box/?'.implode('&', $arr);
$sig = urlencode(base64_encode(hash_hmac("sha256", $path, $secret, true)));
$url = 'https://www5.cbox.ws'.$path.'&sig='.$sig;

// Get last claim time for countdown
$stmt = $pdo->prepare("SELECT claim_time FROM daily_claims WHERE user_id = :user_id ORDER BY claim_time DESC LIMIT 1");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$last_claim_time = $stmt->fetchColumn();

$time_left = 0;
$claim_interval_seconds = 10 * 60;  // 10 minutes in seconds

if ($last_claim_time) {
    $last_claim_timestamp = strtotime($last_claim_time);
    $current_timestamp = time();
    $time_difference = $current_timestamp - $last_claim_timestamp;
    $time_left = max($claim_interval_seconds - $time_difference, 0);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the time interval has passed
    if ($time_left > 0) {
        $minutes_left = floor($time_left / 60);
        $seconds_left = $time_left % 60;
        $errorMessage = 'You need to wait ' . $minutes_left . ' minutes and ' . $seconds_left . ' seconds before claiming again.';
    } else {
        // Verify hCAPTCHA
        $hcaptcha_secret = 'ES_e0f0babb311f414b917fe4f7c46f8df9';
        $hcaptcha_response = $_POST['h-captcha-response'];
        $hcaptcha_url = 'https://hcaptcha.com/siteverify';

        $response = file_get_contents($hcaptcha_url . '?secret=' . $hcaptcha_secret . '&response=' . $hcaptcha_response);
        $response_keys = json_decode($response, true);

        if (!$response_keys['success']) {
            $errorMessage = 'Please complete the hCAPTCHA to proceed.';
        }

        if (empty($errorMessage)) {
            if (!isset($_POST['currency']) || empty($_POST['currency'])) {
                $errorMessage = 'No currency selected.';
            } else {
                $currency = strtolower($_POST['currency']);

                // Fetch the user information
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
                $stmt->execute(['user_id' => $_SESSION['user_id']]);
                $user = $stmt->fetch();

                if (!$user) {
                    $errorMessage = 'User not found.';
                } else {
                    // Validate the selected currency
                    $allowed_currencies = ['doge', 'trx', 'ltc', 'bnb', 'dash', 'ton'];

                    if (!in_array($currency, $allowed_currencies)) {
                        $errorMessage = 'Invalid currency selected.';
                    } else {
                        // Set USD claim amount and max claim limit from config
                        $usd_claim_amount = $config['daily_claim']['usd_amount'];  // Amount to claim in USD
                        $max_claims_per_day = $config['daily_claim']['max_claims_per_day'];  // Max claims per day

                        // Check if the user has already reached the claim limit in the last 24 hours
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM daily_claims WHERE user_id = :user_id AND claim_time >= CONVERT_TZ(NOW(), @@global.time_zone, '+07:00') - INTERVAL 1 DAY");
                        $stmt->execute(['user_id' => $_SESSION['user_id']]);
                        $claim_count = $stmt->fetchColumn();

                        if ($claim_count >= $max_claims_per_day) {
                            $errorMessage = 'You have reached the maximum number of claims allowed per day.';
                        } else {
                            // Proceed with the claim if all checks passed
                            processClaim($currency, $usd_claim_amount, $user, $pdo, $config, $successMessage, $errorMessage);
                            // Reset time_left for next claim
                            $time_left = $claim_interval_seconds;
                        }
                    }
                }
            }
        }
    }
}

function processClaim($currency, $usd_claim_amount, $user, $pdo, $config, &$successMessage, &$errorMessage) {
    // Fetch the latest crypto rate for the selected currency
    $currency_mapping = [
        'btc' => 'bitcoin',
        'eth' => 'ethereum',
        'doge' => 'dogecoin',
        'ltc' => 'litecoin',
        'trx' => 'tron',
        'bnb' => 'binancecoin',
        'dash' => 'dash',
        'ton' => 'the-open-network',
    ];

    if (!isset($currency_mapping[$currency])) {
        $errorMessage = 'Invalid currency mapping.';
    } else {
        $stmt_rate = $pdo->prepare("SELECT rate_usd FROM crypto_rates WHERE crypto_name = :currency");
        $stmt_rate->execute(['currency' => $currency_mapping[$currency]]);
        $rate_usd = $stmt_rate->fetchColumn();

        if (!$rate_usd) {
            $errorMessage = 'Failed to fetch the rate for the selected currency.';
        } else {
            // Calculate how much currency the user will get based on the USD claim amount
            $amount_to_add = $usd_claim_amount / $rate_usd;

            // Update user's balance for the selected currency
            $currency_column = $currency . '_balance';
            $stmt = $pdo->prepare("UPDATE users SET {$currency_column} = {$currency_column} + :amount WHERE id = :user_id");
            $stmt->execute(['amount' => $amount_to_add, 'user_id' => $_SESSION['user_id']]);

            // Record the claim in the daily_claims table
            $stmt = $pdo->prepare("INSERT INTO daily_claims (user_id, currency, amount, claim_time) VALUES (:user_id, :currency, :amount, CONVERT_TZ(NOW(), @@global.time_zone, '+07:00'))");
            $stmt->execute(['user_id' => $_SESSION['user_id'], 'currency' => $currency, 'amount' => $amount_to_add]);

            // Check if the user has a referrer and give 2% to the referrer
            if (!empty($user['referrer_id'])) {
                $referrer_id = $user['referrer_id'];
                $referral_bonus = $amount_to_add * 0.02; // Calculate 2% of the claimed amount

                // Update referrer's balance
                $stmt = $pdo->prepare("UPDATE users SET {$currency_column} = {$currency_column} + :referral_bonus WHERE id = :referrer_id");
                $stmt->execute(['referral_bonus' => $referral_bonus, 'referrer_id' => $referrer_id]);

                // Record the referral earnings in a separate table (optional)
                $stmt = $pdo->prepare("INSERT INTO referral_earnings (referrer_id, referred_user_id, amount, currency, bonus, earned_at) 
                                       VALUES (:referrer_id, :referred_user_id, :amount, :currency, :bonus, CONVERT_TZ(NOW(), @@global.time_zone, '+07:00'))");
                $stmt->execute([
                    'referrer_id' => $referrer_id,
                    'referred_user_id' => $_SESSION['user_id'],
                    'amount' => $amount_to_add,
                    'currency' => $currency,
                    'bonus' => $referral_bonus
                ]);
            }

            // Update user experience by 1
            $stmt = $pdo->prepare("UPDATE users SET exp = exp + 1 WHERE id = :user_id");
            $stmt->execute(['user_id' => $_SESSION['user_id']]);

            // Check if the user has reached a new level
            $stmt = $pdo->prepare("SELECT level FROM user_levels WHERE experience_required <= (SELECT exp FROM users WHERE id = :user_id) ORDER BY level DESC LIMIT 1");
            $stmt->execute(['user_id' => $_SESSION['user_id']]);
            $new_level = $stmt->fetchColumn();

            // Update the user's level if necessary
            if ($new_level !== false) {
                $stmt = $pdo->prepare("UPDATE users SET level = :level WHERE id = :user_id");
                $stmt->execute(['level' => $new_level, 'user_id' => $_SESSION['user_id']]);
            }

            // Set success message
            $successMessage = 'Claim successful! You received ' . number_format($amount_to_add, 8) . ' ' . strtoupper($currency) . '. You can claim again in 10 minutes. Your EXP increased by 1.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Claim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5CCTVBRLDZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5CCTVBRLDZ');
</script>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    
    <div class="container bg-white p-4 rounded shadow" style="max-width: 600px;">
        <center><iframe id='banner_advert_wrapper_6281' src='https://api.fpadserver.com/banner?id=6281&size=250x250' width='250px' height='250px' frameborder='0'></iframe></center>
        <h1 class="text-center mb-4">Daily Claim</h1>
        <p class="text-center">Claim cryptocurrency rewards up to 50 times per day!</p>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger text-center">
                <?= htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="currency" class="form-label">Select Currency:</label>
                <select name="currency" id="currency" class="form-select" required>
                    <option value="">-- Select Currency --</option>
                    <option value="doge">Dogecoin (DOGE)</option>
                    <option value="trx">Tron (TRX)</option>
                    <option value="ltc">Litecoin (LTC)</option>
                    <option value="dash">Dashcoin (DASH)</option>
                    <option value="bnb">Binance Coin (BNB)</option>
                    <option value="ton">Toncoin (TON)</option>
                </select>
            </div>

            <div class="text-center mb-4">
                <div class="h-captcha" data-sitekey="29247292-a86e-44a2-9706-1c1c8c3cb1a0"></div>
            </div>

            <button type="submit" class="btn btn-success w-100">Claim</button>
        </form>

        <p id="countdown-timer" class="text-center fs-5 fw-bold mt-4">Time until next claim: 00:00</p>

        <div class="text-center mt-4">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
        <br>
        <center><iframe id='banner_advert_wrapper_6282' src='https://api.fpadserver.com/banner?id=6282&size=250x250' width='250px' height='250px' frameborder='0'></iframe></center>
    </div>

    <!-- Chat Container -->
    <div id="chat-container" class="position-fixed bottom-0 end-0" style="width: 300px; height: 400px;">
        <div id="chat-toggle" class="text-white bg-primary text-center p-2">Hide Chat</div>
        <iframe id="chat-iframe" src="<?= $url ?>" style="width: 100%; height: calc(100% - 40px); border: none;"></iframe>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <script>
        var chatToggle = document.getElementById('chat-toggle');
        var chatContainer = document.getElementById('chat-container');

        chatToggle.addEventListener('click', function() {
            if (chatContainer.style.height === "40px") {
                chatContainer.style.height = "400px";
                chatToggle.innerHTML = "Hide Chat";
            } else {
                chatContainer.style.height = "40px";
                chatToggle.innerHTML = "Show Chat";
            }
        });

        var timeLeft = <?= $time_left ?>;
        var countdownTimer = document.getElementById('countdown-timer');

        function updateCountdown() {
            if (timeLeft <= 0) {
                countdownTimer.textContent = "Time until next claim: 00:00";
            } else {
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;
                countdownTimer.textContent = "Time until next claim: " + (minutes < 10 ? '0' : '') + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
                timeLeft--;
            }
        }

        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
