<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
              alert('Sign In Berhasil')
              location.href='login.php'
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/sign.css">
  <title>Sign In</title>
</head>
<body>
  <img src="./assets/login-bg.png" class="bg-image">
  <div class="login-container">
    <div class="heading-wrap">
      <p class="login-head">Sign In</p>
    </div>
    <form class="form" action="" method="post">
      <input type="username" name="username" class="username-form" id="username">
      <label class="username-placeholder" for="username">Username</label>
      <input type="email" name="email" class="email-form" id="email">
      <label class="email-placeholder" for="email">Email</label>
      <input type="password" name="password" class="pw-form" id="pw">
      <label class="pw-placeholder" for="pw">Password</label>

      <div class="btn-wrap">
        <button class="login-btn" id="btn" type="submit" name="register">
          Sign In
        </button>
        <a href="login.php">Log In</a>
      </div>
    </form>
  </div>
  <script src="script/script.js"></script>
</body>
</html>
