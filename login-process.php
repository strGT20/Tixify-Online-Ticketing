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
            $_SESSION['is_admin'] = $row['is_admin']; // Menyimpan status admin ke dalam sesi

            if ($row['is_admin']) {
                // Jika pengguna adalah admin, arahkan ke dashboard admin
                header("Location: admin-dashboard.php");
            } else {
                // Jika pengguna bukan admin, arahkan ke halaman utama
                header("Location: index.php");
            }
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
