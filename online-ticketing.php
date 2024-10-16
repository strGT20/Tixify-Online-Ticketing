<?php
session_start();
include('db-connect.php');
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

<div class="navbar">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar">
  <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Armada kami</a></li>
        <li class="nav-item"><a class="nav-link" href="booking_history.php">History</a></li>
    </ul>
        <a class="btn btn-warning" href="login.php">Login</a>
  </div> 
</nav>
</nav>
</div> 

<br><br><br><br>
<h1>Tiket Bus Tersedia</h1>

<div class="container">
    <?php
    $result = mysqli_query($connect, "
    SELECT br.id_rute, br.rute, b.no_reg_bus, br.harga_tiket, b.kelas_layanan, b.foto_armada 
    FROM Bus_Reguler br
    JOIN Bus b ON br.id_bus = b.id_bus");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='card mb-3' style='max-width: 1000px;'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <img src='images/jetbus_dc5.jpg' class='img-fluid rounded-start' alt='Bus Image'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'>Bus No: {$row['no_reg_bus']}</h5>
                        <p class='card-text'>{$row['foto_armada']}</p>
                        <p class='card-text'>Rute: {$row['rute']}</p>
                        <p class='card-text'>Kelas Layanan: {$row['kelas_layanan']}</p>
                        <p class='card-text'>Harga Tiket: Rp{$row['harga_tiket']}</p>
                        <a href='ot-process.php?id_rute={$row['id_rute']}&harga_tiket={$row['harga_tiket']}' class='btn btn-primary'>Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
</div>
</body>
</html>