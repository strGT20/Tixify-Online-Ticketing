<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Utama</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tixify</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Armada kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- <h1>Tixify</h1> -->
     <br>
    <h2>Booking tiket dan sewa bus Starluxe lebih mudah dengan Tixify!</h2>
    <br>
    
    <div class="container">
        <div class="card">
            <img src="images/jetbus_sdd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Ticketing</h5>
                    <p class="card-text">Pesan tiket bus untuk perjalanan antar kota dengan berbagai pilihan rute dan kelas bus.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="online-ticketing.php" class="btn_bus">Pesan Tiket</a>
                </div>
    </div>
    
    <div class="container">
        <div class="card">
            <img src="images/jetbus_mhd5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Online Rent Booking</h5>
                    <p class="card-text">Sewa bus secara online untuk berbagai kebutuhan perjalanan pribadi atau acara khusus.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="rental-bus.php" class="btn_bus">Sewa Bus</a>
                </div>
    </div>
    
        <div class="card" onclick="location.href='online-ticketing.php';">
            <h2>Online Ticketing</h2>
            <p></p>
            <a href="online-ticketing.php" class="btn_bus">Pesan Tiket</a>
        </div>

        <div class="card" onclick="location.href='rental-bus.php';">
            <h2>Online Rent Booking</h2>
            <p></p>
            
        </div>
    </div>
    
    <br><br>
    <form action="booking_history.php">
        <label for="history booking"></label>
        <input type="submit" value="Riwayat booking" class="btn_3">
    </form>
    <form action="logout.php" method="POST">
        <input type="submit" value="Logout" class="btn_3">
    </form>
</body>
</html>
