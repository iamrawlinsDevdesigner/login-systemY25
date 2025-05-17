<?php
session_start();
require_once '../config/db.php';
require_once '../includes/functions.php';

$username = sanitizeInput($_POST['username']);
$email = sanitizeInput($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check for existing email
try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "A user with that email already exists.";
        header("Location: ../public/register.php");
        exit;
    }

    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    $_SESSION['success'] = "Registration successful! You can now log in.";
    header("Location: ../public/index.php");
    exit;

} catch (Exception $e) {
    $_SESSION['error'] = "An error occurred. Please try again.";
    header("Location: ../public/register.php");
    exit;
}
