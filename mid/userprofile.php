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
if (isset($_POST['support']))
{
    header('location: support.php');
}
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['Store']))
{
    header('Location: store.php');
}
if(isset($_POST['Library']))
{
    header('Location: library.php');
}
if(isset($_POST['Profile']))
{
    header('Location: userprofile.php');
}
if(isset($_POST['cart']))
{
    header('Location: cart.php');
}
if(isset($_POST['wishlist']))
{
    header('Location: wishlist.php');
}
$sql = "SELECT * FROM database1 WHERE id = $_SESSION[id]";
$result = mysqli_query($conn, $sql);

if(isset($_POST['update']))
{
    header('location: updateprofile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="body.css">
</head>
<body>
        <menu class="menu-bar">
        <form  method="POST">
            <button type="submit" name="Store" value="Store" id="storebtn">Store</button>
            <button type="submit" name="Profile" value="Profile" id="profilebtn">Profile</button>
            <button type="submit" name="Library" value="Library" id="librarybtn">Library</button>
            <button type="submit" name="wishlist" value="wishlist" id="wishlistbtn">Wishlist</button>
            <button type="submit" name="cart" value="cart" id="cartbtn">Cart</button> 
        </form>
    </menu>
    <br>
    <hr>
        <div class="logo">
        <h1>PROFILE</h1>
        <img src="./igslogo/" alt="">
    
    <p>
    <?php
    $row = mysqli_fetch_assoc($result);
        echo $row['Name'];
        echo "<br>";
        echo $row['Email'];
    ?>
    </p>
        <form method = "POST">
        <button type="submit" name="update" value="submit">Update</button>
    </form>
    </div>
    <hr>

    <hr>
    <div class="wrapper">
    <h1>My Profile</h1>
    <table>
        <tr>
            <th>Game</th>
            <th>Count</th>
        </tr>
        <tr>
            <td class="total-game">Games Owned</td>
            <td class="total-game">
                <?php
                $sql = "SELECT * FROM library WHERE userid = $_SESSION[id]";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
                ?>
            </td>
        </tr>
    <tr>
        <td class="total-wish">Game In Wishlist</td>
        <td class="total-wish">
            <?php
                $sql = "SELECT * FROM wishlist WHERE userid = $_SESSION[id]";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
            ?>
        </td>
    </tr>
    <tr>
        <td class="total-cart">Game In Cart</td>
        <td class="total-cart">
            <?php
                $sql = "SELECT * FROM cart WHERE userid = $_SESSION[id]";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
            ?>
        </td>
    </tr>
    </table>
    </div>
    <hr>
    <form action="" method="POST">
        <footer>
            <button type="submit" name="logout" value="logout">Logout</button>
            <button type="submit" name="support" value="support">Support</button>
        </footer> 
</body>
</html>