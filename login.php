<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header("Location: index.php");
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
    <title>Login</title>
</head>
<body>
<h4>Silakan login terlebih dahulu</h4>
    <form action="login-process.php" method="post">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required><br>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <br>
<h4>Belum punya akun?</h4>
<br>    
        <div class="container" id="login">
            <div class="button-container">
                <a href="register.php" class="btn-auth">Register</a>
            </div>
        </div>    
</body>
</html>