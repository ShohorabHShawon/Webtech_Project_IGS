<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql= "select * from database1";
$result= mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="login-reg.css">
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
    <input type="password" name="confirm password" placeholder="Confirm Password"><br>
    </div>
    <button type="submit" name="reg" value="submit" class="button">Sign Up</button>
    <div class="reg-link">
    <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</form>
</div>
<?php
if(isset($_POST['reg']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password!= $_POST['confirm_password'])
    {
       echo "Password doesn't match";
    }
    else if(empty($name) || empty($email) || empty($phone) || empty($password))
    {
        echo "<script>alert('Please Fillup The Form')</script>";
    }
    else
    {
        $sql="INSERT INTO `database1`(`Name`, `Email`, `Phone`, `Password`) VALUES ('$name','$email','$phone','$password')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Regestration Successful')</script>";
    }
}
?>

<?php
if(isset($_POST['login']))
{
    header('Location: login.php');
}
?>

</form>

</body>
</html>