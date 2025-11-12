<?php
require 'vendor/autoload.php';

$mongoUri = getenv('MONGO_URI'); // from Render environment variables

if (!$mongoUri) {
    die("❌ MONGO_URI not set in environment variables.");
}

try {
    $client = new MongoDB\Client($mongoUri);
    $db = $client->selectDatabase('mydatabase'); // replace with your actual DB name
    $users = $db->selectCollection('users');     // 👈 this variable name is crucial
} catch (Exception $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
