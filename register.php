<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$name || !$email || !$password) {
        die("⚠️ Please fill in all fields.");
    }

    // Check for valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid email address format.");
    }

    // Check password strength
    if (strlen($password) < 6) {
        die("⚠️ Password must be at least 6 characters long.");
    }

    // Check if user already exists
    $existingUser = $users->findOne(['email' => $email]);
    if ($existingUser) {
        die("⚠️ Email already registered. Try logging in.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user document
    $result = $users->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($result->getInsertedCount() === 1) {
        echo "✅ Registration successful! <a href='login.html'>Login now</a>";
    } else {
        echo "❌ Failed to register user. Please try again.";
    }
}
?>
