<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

  <form id="registerForm" action="../handlers/register_handler.php" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    <!-- Flash Messages -->
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

    <!-- Input Fields -->
    <input type="text" name="username" placeholder="Username" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <input type="email" name="email" placeholder="Email" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <input type="password" name="password" placeholder="Password" required minlength="6"
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <!-- Submit Button -->
    <button type="submit"
            id="registerBtn"
            class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition flex items-center justify-center gap-2">
      <span class="btn-text">Register</span>
      <svg id="spinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8
