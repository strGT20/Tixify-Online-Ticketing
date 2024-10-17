<?php
session_start();
include 'db-connect.php';

// Cek apakah tipe bus sudah dipilih
$tipe_bus = isset($_POST['tipe_bus']) ? $_POST['tipe_bus'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    // Bagian untuk insert ke tabel Bus
    $no_reg_bus = $_POST['no_reg_bus'];
    $kelas_layanan = $_POST['kelas_layanan'];
    $kapasitas = $_POST['kapasitas'];
    
    // Bagian tambahan berdasarkan tipe bus
    $rute = $tipe_bus == 'reguler' ? $_POST['rute'] : null;
    $harga_tiket = $tipe_bus == 'reguler' ? $_POST['harga-tiket'] : null;
    $harga_sewa = $tipe_bus == 'rental' ? $_POST['harga-sewa'] : null;

    // Upload gambar
    $directory = "images/";
    $foto_armada = $directory . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $foto_armada);

    // Masukkan data ke tabel bus
    $query_bus = "INSERT INTO `bus` (`id_bus`, `no_reg_bus`, `tipe_bus`, `kelas_layanan`, `kapasitas`, `foto_armada`)
                  VALUES (NULL, '$no_reg_bus', '$tipe_bus', '$kelas_layanan', '$kapasitas', '$foto_armada')";
    mysqli_query($connect, $query_bus);
    
    // Ambil id bus yang baru saja dimasukkan
    $id_bus = mysqli_insert_id($connect);
    
    // Masukkan ke tabel bus_reguler atau bus_rental sesuai tipe
    if ($tipe_bus == 'reguler') {
        $query_reguler = "INSERT INTO bus_reguler (id_bus, rute, harga_tiket) 
                          VALUES ('$id_bus', '$rute', '$harga_tiket')";
        mysqli_query($connect, $query_reguler);
    } else if($tipe_bus == 'rental'){
        $query_rental = "INSERT INTO bus_rental (id_bus, harga_sewa) 
                         VALUES ('$id_bus', '$harga_sewa')";
        mysqli_query($connect, $query_rental);
    } else {
        echo "Tipe bus tidak valid";
    }

    // Redirect ke halaman admin-dashboard.php
    header("Location: admin-dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Bus</title>
</head>
<body>
<div class="container mt-5">
    <h1>Tambah Bus Baru</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Dropdown Tipe Bus untuk pilih "reguler" atau "rental" -->
        <div class="mb-3">
            <label for="tipe_bus" class="form-label">Tipe Bus</label>
            <select class="form-control" id="tipe_bus" name="tipe_bus" required onchange="this.form.submit()">
                <option value="">Pilih Tipe</option>
                <option value="reguler" <?php if($tipe_bus == 'reguler') echo 'selected'; ?>>Reguler</option>
                <option value="rental" <?php if($tipe_bus == 'rental') echo 'selected'; ?>>Rental</option>
            </select>
        </div>

        <!-- Bagian input umum -->
        <div class="mb-3">
            <label for="no_reg_bus" class="form-label">Nomor Registrasi Bus</label>
            <input type="text" class="form-control" id="no_reg_bus" name="no_reg_bus" required>
        </div>
        <div class="mb-3">
            <label for="kelas_layanan" class="form-label">Kelas Layanan</label>
            <select class="form-control" id="kelas_layanan" name="kelas_layanan" required>
            <option value="Executive">Executive</option>
                <option value="Super Executive">Super Executive</option>
                <option value="Executive Double Decker">Executive Double Decker</option>
                <option value="Super Executive Double Decker">Super Executive Double Decker</option>
                <option value="Private Suite">Private Suite</option>
                <option value="First Class">First Class</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto Armada</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <?php if ($tipe_bus == 'reguler'): ?>
            <!-- Field tambahan untuk bus Reguler -->
            <div class="mb-3">
                <label for="rute" class="form-label">Rute (Reguler)</label>
                <input type="text" class="form-control" id="rute" name="rute" required>
            </div>
            <div class="mb-3">
                <label for="harga-tiket" class="form-label">Harga Tiket (Reguler)</label>
                <input type="number" class="form-control" id="harga-tiket" name="harga-tiket" step="0.01" required>
            </div>
        <?php elseif ($tipe_bus == 'rental'): ?>
            <!-- Field tambahan untuk bus Rental -->
            <div class="mb-3">
                <label for="harga-sewa" class="form-label">Harga Sewa (Rental)</label>
                <input type="number" class="form-control" id="harga-sewa" name="harga-sewa" step="0.01" required>
            </div>
        <?php endif; ?>
        
        <?php if ($tipe_bus): ?>
            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
        <?php endif; ?>
    </form>
</div>
</body>
</html>

<?php 
include ('footer.php');
mysqli_close($connect); 
?>
