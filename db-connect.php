<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'starluxetransport';

$connect = new mysqli($host, $user, $password, $database);

if (!$connect) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>