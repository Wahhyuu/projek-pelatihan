<?php
session_start();
require 'db/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$result = $conn->query("SELECT * FROM users WHERE username='$username'");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
    } else {
        echo "salah";
        $errorMessage = "Username atau password salah";
    }
}
