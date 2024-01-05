<?php
    require_once '../Controllers/reg_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../Content/login-reg.css">
</head>
<body>
    <div class="wrapper-reg">
    <h1>Create Your Account</h1>
    <form method="POST">
        <div class="input-box">
            <input type="text" name="name" placeholder="Name"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="number" name="phone" placeholder="Phone"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
        </div>
            <button type="submit" name="reg" value="submit" class="button">Sign Up</button>
        <div class="reg-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
    </div>
</body>
</html>
