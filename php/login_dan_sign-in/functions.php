<?php

$conn = mysqli_connect("localhost", "root", "", "haninin_store");

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nama FROM pengguna WHERE nama = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!')
             </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert data ke database
    mysqli_query($conn, "INSERT INTO pengguna VALUES ('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
