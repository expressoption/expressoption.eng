<?php
require 'vendor/autoload.php';

// Get connection string from Render environment variable
$mongoUri = getenv('MONGO_URI');

if (!$mongoUri) {
    die("❌ MONGO_URI not set in environment variables.");
}

try {
    // Connect to MongoDB Atlas
    $client = new MongoDB\Client($mongoUri);
    $db = $client->selectDatabase('mydatabase'); // change name if needed
    $collection = $db->selectCollection('users');
} catch (Exception $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
