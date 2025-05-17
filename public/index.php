<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

  <form id="loginForm" action="../handlers/login_handler.php" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

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

    <input type="email" name="email" placeholder="Email" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <input type="password" name="password" placeholder="Password" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <button type="submit"
            id="loginBtn"
            class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition flex items-center justify-center gap-2">
      <span class="btn-text">Login</span>
      <svg id="spinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z">
        </path>
      </svg>
    </button>

    <p class="mt-4 text-center text-sm">No account?
      <a href="register.php" class="text-blue-600 hover:underline">Register</a>
    </p>
  </form>

  <script>
    const form = document.getElementById('loginForm');
    const button = document.getElementById('loginBtn');
    const text = button.querySelector('.btn-text');
    const spinner = document.getElementById('spinner');

    form.addEventListener('submit', function () {
      button.disabled = true;
      spinner.classList.remove('hidden');
      text.textContent = 'Logging in...';
      button.classList.add('opacity-70', 'cursor-not-allowed');
    });
  </script>
</body>
</html>
