<?php
session_start();
include 'db-connect.php';

$id_bus = $_GET['id'];

// Ambil data bus berdasarkan id
$query = "SELECT * FROM bus WHERE id_bus = '$id_bus'";
$result = mysqli_query($connect, $query);
$bus = mysqli_fetch_assoc($result);

if ($bus['tipe_bus'] == 'reguler') {
    $query_reguler = "SELECT * FROM bus_reguler WHERE id_bus = '$id_bus'";
    $result_reguler = mysqli_query($connect, $query_reguler);
    $detail_bus = mysqli_fetch_assoc($result_reguler);
} else if ($bus['tipe_bus'] == 'rental') {
    $query_rental = "SELECT * FROM bus_rental WHERE id_bus = '$id_bus'";
    $result_rental = mysqli_query($connect, $query_rental);
    $detail_bus = mysqli_fetch_assoc($result_rental);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update data umum
    $no_reg_bus = $_POST['no_reg_bus'];
    $kelas_layanan = $_POST['kelas_layanan'];
    $kapasitas = $_POST['kapasitas'];
    $tipe_bus = $bus['tipe_bus'];

    // Update tabel bus
    $update_bus = "UPDATE bus SET no_reg_bus = '$no_reg_bus', kelas_layanan = '$kelas_layanan', kapasitas = '$kapasitas' WHERE id_bus = '$id_bus'";
    mysqli_query($connect, $update_bus);

    // Update tabel spesifik berdasarkan tipe bus
    if ($tipe_bus == 'reguler') {
        $rute = $_POST['rute'];
        $harga_tiket = $_POST['harga_tiket'];
        $update_reguler = "UPDATE bus_reguler SET rute = '$rute', harga_tiket = '$harga_tiket' WHERE id_bus = '$id_bus'";
        mysqli_query($connect, $update_reguler);
    } else if ($tipe_bus == 'rental') {
        $harga_sewa = $_POST['harga_sewa'];
        $update_rental = "UPDATE bus_rental SET harga_sewa = '$harga_sewa' WHERE id_bus = '$id_bus'";
        mysqli_query($connect, $update_rental);
    }

    header('Location: admin-dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Detail Bus</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Detail Bus</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="no_reg_bus" class="form-label">Nomor Registrasi Bus</label>
                <input type="text" class="form-control" id="no_reg_bus" name="no_reg_bus" value="<?php echo $bus['no_reg_bus']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kelas_layanan" class="form-label">Kelas Layanan</label>
                <input type="text" class="form-control" id="kelas_layanan" name="kelas_layanan" value="<?php echo $bus['kelas_layanan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $bus['kapasitas']; ?>" required>
            </div>

            <?php if ($bus['tipe_bus'] == 'reguler') { ?>
                <div class="mb-3">
                    <label for="rute" class="form-label">Rute</label>
                    <input type="text" class="form-control" id="rute" name="rute" value="<?php echo $detail_bus['rute']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" step="0.01" value="<?php echo $detail_bus['harga_tiket']; ?>" required>
                </div>
            <?php } else if ($bus['tipe_bus'] == 'rental') { ?>
                <div class="mb-3">
                    <label for="harga_sewa" class="form-label">Harga Sewa</label>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" step="0.01" value="<?php echo $detail_bus['harga_sewa']; ?>" required>
                </div>
            <?php } ?>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($connect); ?>
