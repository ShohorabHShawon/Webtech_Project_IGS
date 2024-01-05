<?php
    include_once '../Controllers/login_control.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../Content/login-reg.css">
</head>
<body>
    <div class="wrapper">
    <form method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pass" placeholder="Password"><br>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" checked="checked" name="remember">Remember me</label>
            <a href="mailto:shohorab.swn@gmail.com">Forgot Password?</a>
        </div>
            <button type="submit" name="login" value="Login" class="button">Login</button><br>
        <div class="reg-link">
            <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
        </div>
     </form>
    </div>
</body>
</html>
