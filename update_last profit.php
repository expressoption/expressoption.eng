<?php
include 'db.php'; // this connects to your database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_POST['2'];      // the user number you typed
  $new_balance = $_POST[''];  // the money you typed

  $stmt = $pdo->prepare("UPDATE users SET balance = ? WHERE id = ?");
  $stmt->execute([$new_balance, $user_id]);

  echo "✅ Balance updated!";
}
?>
