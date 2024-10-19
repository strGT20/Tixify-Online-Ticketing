<?php
session_start();
include('db-connect.php');
include ('header.php');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Sewa Bus</title>
</head>
<body>
    <h2>Sewa Bus</h2>
    <div class="container">
        <?php
        $result = mysqli_query($connect, "
        SELECT br.id_rental, b.no_reg_bus, b.kelas_layanan, b.kapasitas, br.harga_sewa, b.foto_armada
        FROM Bus_Rental br
        JOIN Bus b ON br.id_bus = b.id_bus");
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card mb-3' style='max-width: 1000px;'>
              <div class='row g-0'>
                  <div class='col-md-4'>
                      <img src={$row['foto_armada']} class='img-fluid rounded-start' alt='Bus Image'>
                  </div>
                  <div class='col-md-8'>
                      <div class='card-body'>
                          <h5 class='card-title'>Bus No: {$row['no_reg_bus']}</h5>
                          <p>{$row['kelas_layanan']}</p>
                          <p>Kapasitas : {$row['kapasitas']} orang</p>
                          <p>Harga Sewa : Rp.{$row['harga_sewa']}</p>
                          <a href='rb-process.php?id_rental={$row['id_rental']}&harga_sewa={$row['harga_sewa']}' class='btn'>Sewa Bus</a> 
                      </div>
                  </div>
              </div>
            </div>";
        }
        ?>
    </div>
</body>
</html>

<?php
include ('footer.php');
?>