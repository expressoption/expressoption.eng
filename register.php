<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$name || !$email || !$password) {
        die("⚠️ Please fill in all fields.");
    }

    // Check if user already exists
    $existingUser = $users->findOne(['email' => $email]); // 👈 $users must exist

    if ($existingUser) {
        die("⚠️ Email already registered. Try logging in.");
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $result = $users->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($result->getInsertedCount() === 1) {
        echo "✅ Registration successful! <a href='login.html'>Login now</a>";
    } else {
        echo "❌ Failed to register user.";
    }
}
?>
