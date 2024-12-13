<?php
// Database connection (update with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=tyzejmym_faucet', 'tyzejmym_faucet', 'tyzejmym_faucet');

// Get the POST data from Cbox webhook
$input = @file_get_contents("php://input");
$messages = json_decode($input, true);  // Decodes the JSON array of messages

if (is_array($messages)) {
    foreach ($messages as $message) {
        // Ensure this is a valid message type
        if (isset($message['type']) && $message['type'] === 'message') {
            $username = $message['name'];
            $text = $message['text'];
            $time = date('Y-m-d H:i:s', $message['time']);  // Convert Unix time to SQL datetime format

            // Insert message into the database
            $stmt = $pdo->prepare("INSERT INTO chat_messages (username, message, created_at) VALUES (:username, :message, :created_at)");
            $stmt->execute([
                'username' => $username,
                'message' => $text,
                'created_at' => $time
            ]);
        }
    }
}

// Return HTTP 200 OK to Cbox to acknowledge successful receipt
http_response_code(200);
echo "OK";
?>