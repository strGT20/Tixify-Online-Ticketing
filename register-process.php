<?php
include 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['kata_sandi'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (nama, email, password) VALUES ('$nama', '$email', '$password')";

    if (mysqli_query($connect, $sql)) {
        echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else { 
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
