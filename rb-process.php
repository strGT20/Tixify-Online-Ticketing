<?php
session_start();
include('db-connect.php');

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id_rental']) && isset($_GET['harga_sewa'])) {
    $id_rental = $_GET['id_rental'];
    $harga_sewa = $_GET['harga_sewa'];

    $query_get_bus = "SELECT id_bus FROM Bus_Rental WHERE id_rental = '$id_rental'";
    $result_get_bus = mysqli_query($connect, $query_get_bus);
    $row_bus = mysqli_fetch_assoc($result_get_bus);
    $id_bus = $row_bus['id_bus'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_SESSION['id_user']; 
        $berangkat = $_POST['berangkat'];
        $selesai = $_POST['selesai'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];

        $datetime1 = new DateTime($berangkat);
        $datetime2 = new DateTime($selesai);
        $interval = $datetime1->diff($datetime2);
        $lama_sewa = $interval->days + 1;

        $biaya = $lama_sewa * $harga_sewa;

        $query = "INSERT INTO Riwayat_Booking (id_user, id_bus, berangkat, selesai, asal, tujuan, biaya) 
                  VALUES ('$id_user', '$id_bus', '$berangkat', '$selesai', '$asal', '$tujuan', '$biaya')";

        if (mysqli_query($connect, $query)) {
            echo "Pesanan berhasil dibuat!";
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
    <link rel="stylesheet" href="style.css">
    <title>Form Sewa Bus</title>
</head>
<body>
    <h1>Form Sewa Bus</h1>
    <form action="" method="POST">
        <label for="berangkat">Tanggal Mulai Sewa</label>
        <input type="date" id="berangkat" name="berangkat" required><br>

        <label for="selesai">Tanggal Selesai Sewa</label>
        <input type="date" id="selesai" name="selesai" required><br>

        <label for="asal">Titik Penjemputan</label>
        <input type="text" id="asal" name="asal" required><br>

        <label for="tujuan">Tujuan</label>
        <input type="text" id="tujuan" name="tujuan" required><br>

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
