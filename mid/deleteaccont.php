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
if(isset($_POST['delete']))
{
    $sql = "DELETE FROM database1 WHERE id='$_SESSION[id]'";
    mysqli_query($conn, $sql);
    session_destroy();
    header('location: login.php');
}
    
if(isset($_POST['cancel']))
{
    header('location: userprofile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
<h1>Delete Account</h1>
<h2>Are you sure you want to delete your accont?</h2>

<form method = "POST">
    <button type="submit" name="delete">Delete</button>
    <button type="submit" name="cancel">Cancel</button>
   </form>

</body>
</html>