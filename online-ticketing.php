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
    <title>Online Ticketing</title>
</head>
<body>
<h1>Tiket Bus Tersedia</h1>
    <div class="container">
        <?php
        $result = mysqli_query($connect, "
        SELECT br.id_rute, br.rute, b.no_reg_bus, br.harga_tiket, b.kelas_layanan 
        FROM Bus_Reguler br
        JOIN Bus b ON br.id_bus = b.id_bus");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card'>
                <h2>{$row['no_reg_bus']}</h2>
                <p>{$row['rute']}</p>
                <p>{$row['kelas_layanan']}</p>
                <p>Rp{$row['harga_tiket']}</p>
                <a href='ot-process.php? id_rute={$row['id_rute']}&harga_tiket={$row['harga_tiket']}' 
                class='btn'>Pesan Tiket</a>
            </div>";
        }
        ?>
    </div>
</body>
</html>