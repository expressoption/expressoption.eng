<?php
require 'db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $new_balance = $_POST['new_balance'] ?? null;

    if ($user_id === null || $new_balance === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing parameters']);
        exit;
    }

    $filter = ['_id' => toMongoId($user_id)];
    $update = ['$set' => ['balance' => (float)$new_balance]];
    $result = $users->updateOne($filter, $update);

    echo json_encode([
        'success' => $result->getModifiedCount() > 0 || $result->getMatchedCount() > 0
    ]);
}
?>
