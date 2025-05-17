<?php
session_start();
require_once '../includes/functions.php';
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen">
  <div class="max-w-2xl mx-auto mt-20 bg-white p-6 rounded shadow text-center">
    <h1 class="text-3xl font-bold mb-4">Welcome, <?= $_SESSION['username']; ?>!</h1>
    <p class="text-gray-700 mb-6">You are now logged in.</p>
    <a href="logout.php"
       class="inline-block bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">Logout</a>
  </div>
</body>

<!-- <?php session_start(); ?> -->
<?php if (isset($_SESSION['success'])): ?>
  <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-center">
    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
  </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
  <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-center">
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>


</html>
