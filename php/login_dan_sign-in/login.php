<?php
session_start();

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["id_pengguna"] = $row['id_pengguna'];

            header("Location: ../index.php");
            exit;
        }

    }

    echo "<script>alert('Usename atau password salah!')</script>";
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
  <link rel="stylesheet" href="styles/login.css">
  <title>Login</title>
</head>
<body>
  <img src="./assets/login-bg.png" class="bg-image">
  <div class="login-container">
    <div class="heading-wrap">
      <p class="login-head">Login</p>
    </div>
    <form action="" method="post" class="form">
      <input type="username"  name="username" class="username-form" id="username">
      <label class="username-placeholder" for="username">Username</label>
      <input type="password" name="password" class="pw-form" id="pw">
      <label class="pw-placeholder" for="pw">Password</label>
      <div class="btn-wrap">
        <button class="login-btn" id="btn" type="submit" name="login">
          Login
        </button>
        <a href="sign.php">Sign In</a>
      </div>
    </form>
  </div>
  <script src="script/script.js"></script>
</body>
</html>
