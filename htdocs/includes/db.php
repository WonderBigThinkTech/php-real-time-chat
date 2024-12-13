<?php
// includes/db.php
$config = require '/config/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=tyzejmym_faucet","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}