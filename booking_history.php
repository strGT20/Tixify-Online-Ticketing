<?php
session_start();
include('db-connect.php');
include('header.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Riwayat Pemesanan</title>
</head>
<body>
    <h1>Riwayat Pemesanan</h1>
    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<h3>No Bus : {$row['no_reg_bus']}</h3>";
                echo "<p>Kelas Layanan : {$row['kelas_layanan']}</p>";
                
                
                if ($row['tipe_bus'] === 'reguler') {
                    echo "<p>{$row['asal']} - {$row['tujuan']}</p>";
                    echo "<p>Tanggal Keberangkatan :  {$row['berangkat']}</p>";
                } elseif ($row['tipe_bus'] === 'rental') {
                    echo "<p>Tanggal Mulai: {$row['berangkat']}</p>";
                    echo "<p>Tanggal Selesai: {$row['selesai']}</p>";
                    echo "<p>Penjemputan : {$row['asal']}</p>";
                    echo "<p>Tujuan : {$row['tujuan']}</p>";
                }
                echo "<p>Rp. {$row['biaya']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada riwayat pemesanan.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
include ('footer.php');
?>