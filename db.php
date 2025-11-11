<?php
require 'vendor/autoload.php';

$mongoUri = getenv('MONGO_URI');

try {
    $client = new MongoDB\Client($mongoUri);
    $db = $client->selectDatabase('mydatabase'); // name your DB
    $collection = $db->selectCollection('users');
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
