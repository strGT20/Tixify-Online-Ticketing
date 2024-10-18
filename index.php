<?php
include 'header.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">    
    <link rel="icon" href="images/Logo1.svg" type="image/svg+xml">
    <title>Tixify : Official Site</title>
</head>
<body>

    <h3>Pesan tiket dan sewa bus Starluxe lebih mudah dengan Tixify!</h3>    
    <div class="container">
        <div class="card" onclick="location.href='online-ticketing.php';">
            <img src="images/jetbus_sdd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Ticketing</h5>
                    <p class="card-text">Pesan tiket bus untuk perjalanan antar kota dengan berbagai pilihan rute dan kelas bus.</p>
                    <p class="card-text"><small class="text-muted">Lihat daftar tiket selengkapnya</small></p>
                    <div class="button-container">
                        <a href="online-ticketing.php" class="btn-bus">Pesan Tiket</a>
                    </div>
                </div>
    </div>
    
    <!-- <div class="container"> -->
        <div class="card" onclick="location.href='rental-bus.php';">
            <img src="images/jetbus_mhd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Reservation</h5>
                    <p class="card-text">Sewa bus secara online untuk berbagai kebutuhan perjalanan pribadi atau acara khusus.</p>
                    <p class="card-text"><small class="text-muted">Lihat daftar bus selengkapnya</small></p>
                    <div class="button-container">
                        <a href="rental-bus.php" class="btn-bus">Sewa Bus</a>
                    </div>
                </div>
    </div>
    </div>
</body>
</html>

<?php
include ('footer.php');
?>