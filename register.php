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
<h4>Belum punya akun?</h4>
<h5>Daftar disini</h5>
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


<h4>Sudah punya akun?</h4>
    <div class="container" id="login">
        <div class="button-container">
            <a href="login.php" class="btn-auth">Login</a>
        </div>
    </div>
</div>    
</body>
</html>