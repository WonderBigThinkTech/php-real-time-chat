<?php

// Define the secret key
$secret_key = 'madzxcc'; // Replace with your actual secret key

// Check if the secret key is provided in the request
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    exit('Unauthorized access');
}

// Define Cbox settings and bot credentials
$box = array('srv' => 5, 'id' => 953445, 'tag' => '5KfazJ'); // Replace with your actual Cbox settings
$bot = array('name' => 'Shower', 'token' => '0Z7iHVHpJrACdwqq', 'url' => ''); // Bot token

try {
    // Database connection (update with your database credentials)
    $pdo = new PDO('mysql:host=localhost;dbname=tyzejmym_faucet', 'tyzejmym_faucet', 'tyzejmym_faucet');
} catch (PDOException $e) {
    exit("Database connection failed.");
}

// Step 1: Select users who have sent at least 2 messages in the last 5 minutes, excluding "Shower" and "Owner"
$query = "
    SELECT username, COUNT(*) AS message_count
    FROM chat_messages
    WHERE created_at > NOW() - INTERVAL 5 MINUTE
    AND username NOT IN ('Shower', 'Owner', 'owner') -- Exclude Shower and Owner
    GROUP BY username
    HAVING message_count >= 2
    ORDER BY RAND()
    LIMIT 5
";
$selected_users = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

// If no users meet the criteria, exit the script
if (empty($selected_users)) {
    exit;
}

// Step 2: Update TRX balance for each selected user
foreach ($selected_users as $user) {
    $updateStmt = $pdo->prepare("UPDATE users SET trx_balance = trx_balance + 0.1 WHERE username = :username");
    $updateStmt->execute(['username' => $user['username']]);
}

// Step 3: Send a system message tagging the selected users
$usernames_list = implode(', ', array_column($selected_users, 'username'));
$system_message = "[color=#f00,#ff0][b]User: $usernames_list [/b] just received [b]0.1[/b] TRX from Shower! Every 15 minutes 5 random active chatters will be selected![/color]";

// Use the cbox_post function to send the message
cbox_post($system_message, $bot, $box);

// Cbox API function to post a message
function cbox_post($msg, $user, $box) {
    $srv = $box['srv'];
    $boxid = $box['id'];
    $boxtag = $box['tag'];

    $host = "www$srv.cbox.ws";
    $path = "/box/?boxid=$boxid&boxtag=$boxtag&sec=submit";
    $port = 80;
    $timeout = 30;

    $post = array(
        'nme' => $user['name'],  // Bot name
        'key' => $user['token'],  // Bot token
        'eml' => $user['url'],    // Optional bot URL
        'pst' => $msg,            // The message content
        'aj'  => '1'              // Ajax request
    );

    $req = '';
    foreach ($post as $k => $v) {
        $req .= "$k=" . urlencode($v) . "&";
    }
    $req = substr($req, 0, -1);

    // Prepare headers for the POST request
    $hdr  = "POST $path HTTP/1.1\r\n";
    $hdr .= "Host: $host\r\n";
    $hdr .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $hdr .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    // Open socket connection to the Cbox server
    $fp = fsockopen($host, $port, $errno, $errstr, $timeout);

    if (!$fp) {
        return false;
    }

    // Send the request to Cbox
    fputs($fp, $hdr . $req);
    $res = '';
    while (!feof($fp)) {
        $res .= fgets($fp, 1024);
    }
    fclose($fp);

    // Check for a 200 OK response
    return strpos($res, "200 OK") !== false;
}
?>
