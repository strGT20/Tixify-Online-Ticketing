<?php
session_start();
include('db-connect.php');

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$query = "
    SELECT rb.id_booking, b.no_reg_bus, b.kelas_layanan, rb.berangkat, rb.selesai, rb.asal, rb.tujuan, rb.biaya, b.tipe_bus
    FROM riwayat_booking rb
    JOIN bus b ON rb.id_bus = b.id_bus
    WHERE rb.id_user = '$id_user'
    ORDER BY rb.berangkat DESC
";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Riwayat Pemesanan</title>
    <style>
        /* Tambahkan styling untuk card */
        .container {
            display: flex;
            flex-wrap: wrap;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 8px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0;
        }
        .card p {
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <h1>Riwayat Pemesanan</h1>
    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<h3>No Bus: {$row['no_reg_bus']}</h3>";
                echo "<p>Kelas: {$row['kelas_layanan']}</p>";
                echo "<p>Biaya: Rp{$row['biaya']}</p>";
                
                if ($row['tipe_bus'] === 'reguler') {
                    echo "<p>Rute: {$row['asal']} - {$row['tujuan']}</p>";
                    echo "<p>Berangkat: {$row['berangkat']}</p>";
                } elseif ($row['tipe_bus'] === 'rental') {
                    echo "<p>Tanggal Mulai: {$row['berangkat']}</p>";
                    echo "<p>Tanggal Selesai: {$row['selesai']}</p>";
                    echo "<p>Penjemputan: {$row['asal']}</p>";
                    echo "<p>Tujuan: {$row['tujuan']}</p>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada riwayat pemesanan.</p>";
        }
        ?>
    </div>
</body>
</html>
