<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Silakan login terlebih dahulu</h2>
    <form action="login-process.php" method="post">
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" required><br>
        
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>