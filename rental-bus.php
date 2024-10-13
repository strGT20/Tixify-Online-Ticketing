<?php
session_start();
include('db-connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sewa Bus</title>
</head>
<body>
<h1>Sewa Bus</h1>

     <div class="container">
        <?php
        $result = mysqli_query($connect, "
        SELECT br.id_rental, b.no_reg_bus, b.kelas_layanan, b.kapasitas, br.harga_sewa
        FROM Bus_Rental br
        JOIN Bus b ON br.id_bus = b.id_bus");
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='card'>
            <h2>{$row['no_reg_bus']}</h2>
            <p>Kelas Bus: {$row['kelas_layanan']}</p>
            <p>Kapasitas: {$row['kapasitas']} orang</p>
            <p>Harga Sewa: Rp{$row['harga_sewa']}</p>
            <a href='rb-process.php? id_rental={$row['id_rental']}&harga_sewa={$row['harga_sewa']}' class='btn'>Sewa Bus</a>
        </div>";
        }
        ?>
    </div>
</body>
</html>