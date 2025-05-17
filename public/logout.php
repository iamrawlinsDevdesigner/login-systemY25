<?php
session_start();
session_destroy();
session_start();
$_SESSION['success'] = "You’ve successfully logged out.";
header("Location: index.php");
exit;

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

