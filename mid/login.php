<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$admin= "admin@gmail.com";
$adminpass= "admin";
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
    <link rel="stylesheet" type="text/css" href="login-reg.css">
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
            <a href="forgotpass.php">Forgot Password?</a>
        </div>
            <button type="submit" name="login" value="Login" class="button">Login</button><br>
            <div class="reg-link">
            <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
            </div>
    </form>
    </div>
    
    <?php
    $sql= "select * from database1";
    $result= mysqli_query($conn, $sql);

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $sql= "select * from database1 where email='$email' and password='$pass'";
        $result= mysqli_query($conn, $sql);
        if(empty($email) || empty($pass))
        {
            echo "<script>alert('Please Fill Up The Fields')</script>";
        }
        else if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_assoc($result);
            $id=$row['id'];
            $name=$row['Name'];
            $_SESSION['id']=$row["ID"];
            $_SESSION['fullname']=$name;
            header('Location: store.php');
        }
        else
        {
            echo "<script>alert('Invalid Email or Password')</script>";
        }
    }
    if(isset($_POST['reg']))
    {
        header('Location: registration.php');
    }

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        if($email==$admin && $pass==$adminpass)
        {
            header('Location: admin.php');
        } 
    }
    ?>
</body>
</html>