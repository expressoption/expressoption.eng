<?php
require 'db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $last_profit = $_POST['last_profit'] ?? null;

    if ($user_id === null || $last_profit === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing parameters']);
        exit;
    }

    $filter = ['_id' => toMongoId($user_id)];
    $update = ['$set' => [
        'last_profit' => (float)$last_profit,
        'last_profit_at' => new MongoDB\BSON\UTCDateTime()
    ]];
    $res = $users->updateOne($filter, $update);

    echo json_encode([
        'success' => $res->getModifiedCount() > 0 || $res->getMatchedCount() > 0
    ]);
}
?>
