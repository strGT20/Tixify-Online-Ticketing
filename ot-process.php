<?php
session_start();
include('header.php');
include('db-connect.php');

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['id_rute']) && isset($_GET['harga_tiket'])) {
    $id_rute = $_GET['id_rute'];
    $harga_tiket = $_GET['harga_tiket'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_SESSION['id_user']; 
        $berangkat = $_POST['tanggal_berangkat'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $biaya = $harga_tiket; // Gunakan harga tiket sebagai biaya

        // Query insert ke database
        $query = "INSERT INTO Riwayat_booking (id_user, id_bus, berangkat, asal, tujuan, biaya) 
                  VALUES ('$id_user', '$id_rute', '$berangkat', '$asal', '$tujuan', '$biaya')";

        if (mysqli_query($connect, $query)) {
            echo "Berhasil memesan tiket!";
            echo "<a href='booking_history.php'>Lihat Daftar Pesanan</a>";
        } else {
            echo "Gagal membuat pesanan: " . mysqli_error($connect);
        }
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Online Ticketing</title>
</head>
<body>
    <h1>Tolong isi data berikut</h1>
    <form action="" method="POST">
        <label for="asal">Asal</label>
        <input type="text" id="asal" name="asal" required><br><br>

        <label for="tujuan">Tujuan</label>
        <input type="text" id="tujuan" name="tujuan" required><br><br>

        <label for="tanggal_berangkat">Pilih tanggal keberangkatan</label>
        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat" required><br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>
</body>
</html>

<?php
    }
} else {
    echo "Data bus tidak ditemukan.";
}
?>
