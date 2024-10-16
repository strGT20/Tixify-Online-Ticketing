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

<!-- Bagian Navigation Bar -->
<div class="navbar">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar">
  <a class="navbar-brand" href="#">
      <img src="images/Logo1.svg" alt="Bootstrap" width="60" height="30"> Tixify
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Pelayanan</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Armada kami</a></li>
        <li class="nav-item"><a class="nav-link" href="booking_history.php">Riwayat</a></li>
    </ul>
        <a class="btn btn-warning" id="login_btn" href="login.php">Login</a>
  </div> 
</nav>
</nav>
</div> 

    <!-- <h1>Tixify</h1> -->
     <br><br><br><br>
    <h2>Booking tiket dan sewa bus Starluxe lebih mudah dengan Tixify!</h2>
    
    <div class="container">
        <div class="card" onclick="location.href='online-ticketing.php';">
            <img src="images/jetbus_sdd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Ticketing</h5>
                    <p class="card-text">Pesan tiket bus untuk perjalanan antar kota dengan berbagai pilihan rute dan kelas bus.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="online-ticketing.php" class="btn_bus">Pesan Tiket</a>
                </div>
    </div>
    
    <!-- <div class="container"> -->
        <div class="card" onclick="location.href='rental-bus.php';">
            <img src="images/jetbus_mhd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Rent Booking</h5>
                    <p class="card-text">Sewa bus secara online untuk berbagai kebutuhan perjalanan pribadi atau acara khusus.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="rental-bus.php" class="btn_bus">Sewa Bus</a>
                </div>
    </div>
    </div>
</body>
</html>