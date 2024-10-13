<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Utama</title>
</head>
<body>
    <h1>Tixify</h1>
    <h2>Booking tiket dan sewa bus Starluxe lebih mudah dengan Tixify!</h2>
    <br>
    <div class="card-container">    
        <div class="card" onclick="location.href='online-ticketing.php';">
            <h2>Pemesanan Tiket Bus</h2>
            <p>Pesan tiket bus untuk perjalanan antar kota dengan berbagai pilihan rute dan kelas bus.</p>
            <a href="online-ticketing.php" class="btn">Pesan Tiket</a>
        </div>
    </div>

    <br><br>
    <div class="card-container">
    <div class="card" onclick="location.href='rental-bus.php';">
            <h2>Sewa Bus</h2>
            <p>Sewa bus secara online untuk berbagai kebutuhan perjalanan pribadi atau acara khusus.</p>
            <a href="rental-bus.php" class="btn">Sewa Bus</a>
        </div>
    </div>
    
    <br><br>
    <form action="booking_history.php">
        <label for="history booking"></label>
        <input type="submit" value="Riwayat booking">
    </form>
    <form action="logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
