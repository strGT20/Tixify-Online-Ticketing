<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Starluxe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Belum punya akun?</h2>
<h3>Daftar disini</h3>
    <form action="register-process.php" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="username" name="nama">

        <br><br>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>
        
        <br><br>
        
        <label for="kata_sandi">Kata Sandi</label>
        <input type="password" id="kata_sandi" name="kata_sandi" required>
        
        <br><br>
        
        <input type="submit" value="Daftar">
    </form><br><br>


<h2>Sudah punya akun?</h2>
    <div class="container" id="login">
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-primary" type="button" id="btn-login" href="login.php">Login</a>
        </div>
    </div>
    
</body>
</html>