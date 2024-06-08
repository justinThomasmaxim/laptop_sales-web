<?php

session_start();

if (!isset($_SESSION["id_pengguna"])) {
    header("Location: login_dan_sign-in/login.php");
    exit;
}
