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
if (isset($_POST['profile']))
{
    header('location: userprofile.php');
}
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);

$sql = "SELECT * FROM database1 WHERE id = $_SESSION[id]";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="body.css">
</head>
<body>
  <div class="wrapper">
    <h1>SUPPORT</h1>
<form method = "POST">
 <button type="submit" name="profile" value="submit" class="updateform">Profile</button>
   </form>
</div>
  
</body>
</html>