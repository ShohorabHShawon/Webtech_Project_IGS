<?php
session_start();
if(!isset($_SESSION['id'])) 
    {
        header('location: login.php');
    }
    else
    {
    if(isset($_POST['logout']))
    {
    session_destroy();
    header('location: login.php');
    }

    }
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);

if (isset($_POST['update'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    if (empty($name) || empty($email) || empty($phone) || empty($pass)) {
        echo "<script>alert('Please Fill up all the fields')</script>";
    } 
    else {
    
        $sql = "UPDATE `database1` SET `Name`='$name', `Email`='$email', `Phone`='$phone', `Password`='$pass' WHERE id = $_SESSION[id]";
        mysqli_query($conn, $sql);
        echo "<script>alert('Update Successful')</script>";
    }
}

$sql = "SELECT * FROM database1";
$result = mysqli_query($conn, $sql);

if (isset($_POST['profile'])) {
    header('location: userprofile.php');
}

$sql = "SELECT * FROM database1 WHERE id = $_SESSION[id]";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="body.css">
</head>
<body>
<h1>UPDATE</h1>
<div class="wrapper">
    <h1>Update Profile</h1>
<form method = "POST">
    <?php $row=mysqli_fetch_assoc($result) ?>
    <input type="text" name="name" value = '<?php echo $row["Name"] ; ?>' placeholder="Name"> <br>
	<input type="email" name="email" value = '<?php echo $row["Email"] ; ?>' placeholder="Email"><br>
    <input type="text" name="phone" value = '<?php echo $row["Phone"] ; ?>' placeholder="Phone"><br>
    <input type="password" name="pass" value = '<?php echo $row["Password"] ; ?>' placeholder="Password"><br>
    <button type="submit" name="update" value="submit" class="updateform">Update</button>
    <button type="submit" name="profile" value="submit" class="updateform">Profile</button>
   </form>
</div>
</body>
</html>