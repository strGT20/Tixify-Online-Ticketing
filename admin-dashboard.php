<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}
include 'db-connect.php';

// Ambil data bus dari database
$query = "SELECT * FROM bus";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
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

<!-- Navbar khusus admin -->
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
        <li class="nav-item"><a class="nav-link" aria-current="page" href="admin-dashboard.php">Manajemen armada</a></li>
    </ul>
        <a class="btn btn-warning" id="login_btn" href="logout.php">Logout</a>
  </div> 
</nav>
</nav>
</div> 
     <br><br><br>
</body>
</html>

    <br>
    <h1>Daftar Bus</h1>
<div class="flexbox">
    <div class="add-container" id="add">
        <div class="add-button">
        <a href="add-bus.php" id="btn-add">Tambah Bus Baru</a>
    </div>        
</div>    
    
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class='card mb-3' style='max-width: 1000px;'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <img src="<?php echo $row['foto_armada']; ?>" class='img-fluid rounded-start' alt='Bus Image'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                    <h5 class="card-title"><?php echo $row['no_reg_bus']; ?></h5>
                    <a href="detail-bus.php?id=<?php echo $row['id_bus']; ?>" class="btn">Detail</a>
                    <a href="delete-bus.php?id=<?php echo $row['id_bus']; ?>" class="btn">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
</div>
</body>
</html>
<?php 
include ('footer.php'); 
mysqli_close($connect); ?>
