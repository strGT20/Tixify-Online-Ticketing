<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Starluxe</title>
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
    </form>

<h2>Sudah punya akun?</h2>    
    <form action="login.php">
        <input type="submit" value="Login disini" class="btn">
    </form> 
</body>
</html>