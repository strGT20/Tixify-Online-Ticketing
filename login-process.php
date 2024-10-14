<?php
session_start();
include 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
             header("Location: index.php");
            exit;
        } else {
            echo "Kata sandi salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}

mysqli_close($connect);
?>