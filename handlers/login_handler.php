<?php
session_start();
require_once '../config/db.php';
require_once '../includes/functions.php';

$email = sanitizeInput($_POST['email']);
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['success'] = "Login successful. Welcome back!";
    header("Location: ../public/dashboard.php");
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: ../public/index.php");
}
