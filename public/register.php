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

    <!-- Inputs -->
    <input type="text" name="username" placeholder="Username" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <input type="email" name="email" placeholder="Email" required
           class="w-full mb-4 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <input type="password" id="password" name="password" placeholder="Password" required
           class="w-full mb-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">

    <!-- Password Strength Display -->
    <div id="passwordFeedback" class="text-sm mb-4"></div>

    <!-- Button -->
    <button type="submit"
            id="registerBtn"
            class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition flex items-center justify-center gap-2">
      <span class="btn-text">Register</span>
      <svg id="spinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z">
        </path>
      </svg>
    </button>

    <p class="mt-4 text-center text-sm">Already have an account?
      <a href="index.php" class="text-blue-600 hover:underline">Login</a>
    </p>
  </form>

  <!-- Scripts -->
  <script>
    const form = document.getElementById('registerForm');
    const button = document.getElementById('registerBtn');
    const text = button.querySelector('.btn-text');
    const spinner = document.getElementById('spinner');
    const passwordInput = document.getElementById('password');
    const feedback = document.getElementById('passwordFeedback');

    form.addEventListener('submit', function () {
      button.disabled = true;
      spinner.classList.remove('hidden');
      text.textContent = 'Registering...';
      button.classList.add('opacity-70', 'cursor-not-allowed');
    });

    passwordInput.addEventListener('input', () => {
      const val = passwordInput.value;
      let strength = '';
      let color = '';

      if (val.length < 6) {
        strength = 'Too short (min 6 characters)';
        color = 'text-red-600';
      } else {
        const hasUpper = /[A-Z]/.test(val);
        const hasLower = /[a-z]/.test(val);
        const hasNumber = /\d/.test(val);
        const hasSpecial = /[^A-Za-z0-9]/.test(val);
        const strengthScore = [hasUpper, hasLower, hasNumber, hasSpecial].filter(Boolean).length;

        switch (strengthScore) {
          case 1:
          case 2:
            strength = 'Weak password';
            color = 'text-yellow-600';
            break;
          case 3:
            strength = 'Medium strength';
            color = 'text-blue-600';
            break;
          case 4:
            strength = 'Strong password';
            color = 'text-green-600';
            break;
        }
      }

      feedback.textContent = strength;
      feedback.className = `${color} text-sm mb-4`;
    });
  </script>

</body>
</html>
