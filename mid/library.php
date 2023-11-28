<?php
session_start();
if(!isset($_SESSION['id'])) 
{
    header('location: login.php');
}
else{
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

$sql = "SELECT * FROM library WHERE userid = $_SESSION[id]";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="body.css">
    <link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>
        <menu class="menu-bar">
        <form action="" method="POST">
            <button type="submit" name="Store">Store</button>
            <button type="submit" name="Profile">Profile</button>
            <button type="submit" name="Library">Library</button>
            <button type="submit" name="wishlist">Wishlist</button>
            <button type="submit" name="cart">Cart</button> 
        </form>
    </menu>
    <br>
    <hr>
    <div class="logo">
        <h1>LIBRARY</h1>
        <img src="./igslogo/" alt="">
    
    <p>
    <?php
        echo $_SESSION['fullname']."'s Library";
    ?>
    </p>
    </div>
    <hr>
    <div class="wrapper">
        <h1>My Games</h1>
        <form method="POST"> 
            <table>
                <tr>
                    <th>Game</th>
                    <th>Name</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                    $sql = "SELECT * FROM game WHERE id = $row[gameid]";
                    $result2 = mysqli_query($conn, $sql);
                    while($row2=mysqli_fetch_assoc($result2))
                    {
                ?>
                <tr>
                    <td class="game-image">
                        <img src="<?php echo './igsimage/'.$row2['image']; ?>">
                    </td>
                    <td class="game-name">
                        <?php echo $row2['name']; ?>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                </tr>
                <?php
    }
    }
    ?>
    </table> 
    </form>
</div>

         <form method="POST">
                <footer>
                    <button type="submit" name="logout" value="logout">Logout</button>
                </footer>
        </form>
</body>
</html>