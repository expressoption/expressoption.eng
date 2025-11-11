<?php
require 'vendor/autoload.php'; // if using Composer

$mongoUri = getenv('MONGO_URI'); // Get URI from Render environment variable

try {
    $client = new MongoDB\Client($mongoUri);
    $db = $client->selectDatabase('mydatabase'); // change to your actual DB name
    echo "✅ Connected to MongoDB successfully!";
} catch (Exception $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
