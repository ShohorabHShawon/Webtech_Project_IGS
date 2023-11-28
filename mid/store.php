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
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql= "SELECT * FROM `game`";
$result= mysqli_query($conn, $sql);
}
if(isset($_POST['Profile']))
{
    header('Location: userprofile.php');
}
if(isset($_POST['Store']))
{
    header('Location: store.php');
}
if(isset($_POST['Library']))
{
    header('Location: library.php');
}
if(isset($_POST['cart']))
{
    header('Location: cart.php');
}
if(isset($_POST['wishlist']))
{
    header('Location: wishlist.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IGS</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="body.css">
</head>
<body>
        <menu class="menu-bar">
        <form method="POST">
            <button type="submit" name="Store">Store</button>
            <button type="submit" name="Profile">Profile</button>
            <button type="submit" name="Library">Library</button>
            <button type="submit" name="wishlist">Wishlist</button>
            <button type="submit" name="cart" value="cart" id="cartbtn">Cart</button> 
        </form>
    </menu>
<br>
    <div class="logo">
        <h1>IGS</h1>
        <img src="./igslogo/" alt="">
    </div>
    <div class="wrapper">
        <form>
            <input type="text" name="search" placeholder="Search games"><br>
            <button type="submit" name="search" class="search-btn">Search</button>
        </form>
        <h1>Popular Games</h1>
        <table>
            <tr>
                <th>Game</th>
                <th>Name</th>
                <th>Price</th>
                <th>Cart</th>
                <th>Wish</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($result))
            {
            ?>
            <tr>
                <td class="game-image">
                    <img src="<?php echo './igsimage/'.$row['image']; ?>">
                </td>
                <td class="game-name">
                    <?php echo $row['name']; ?>
                </td>
                <td class="game-price">
                    <?php echo "$".$row['price']; ?>
                </td>
                <td class="game-addtocart">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="addtocart">Cart</button>
                    </form>
                </td>
                <td class="game-addtowishlist">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="addwishlist">Wishlist</button>
                    </form>
                </td>
            </tr>
            <?php
            }
            ?>
            </table>
        </div>
        <form method="POST">
            <?php
            if (isset($_POST['addtocart'])) 
            {
                $gameID = $_POST['id'];
                
                $isAlreadyInLibrary = false;
                $isAlreadyInCart = false;

                $sql = "SELECT `gameid` FROM `library` WHERE `userid`='" . $_SESSION['id'] . "'";
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    if ($row['gameid'] == $gameID) 
                    {
                        $isAlreadyInLibrary = true;
                        break;
                    }
                }
                if (!$isAlreadyInLibrary) 
                {
                    $sql = "SELECT `gameid` FROM `cart` WHERE `userid`='" . $_SESSION['id'] . "' AND `gameid` = '" . $gameID . "'";
                    $result = mysqli_query($conn, $sql);
                    $isAlreadyInCart = mysqli_num_rows($result) > 0;
                    
                    if (!$isAlreadyInCart) 
                    {
                        $sql = "INSERT INTO `cart`(`userid`, `gameid`) VALUES ('" . $_SESSION['id'] . "','" . $gameID . "')";
                        $result = mysqli_query($conn, $sql);
                    }
                    else 
                    {
                        echo "<script>alert('This game is already in your CART!')</script>";
                    }
    
                } 
                else 
                {
                    echo "<script>alert('You own this game!')</script>";
                }
            }
            
            if(isset($_POST['addwishlist']))
            {
                $gameID = $_POST['id'];
                
                $isAlreadyInLibrary = false;
                $isAlreadyInWishlist = false;

                $sql = "SELECT `gameid` FROM `library` WHERE `userid`='" . $_SESSION['id'] . "'";
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    if ($row['gameid'] == $gameID) 
                    {
                        $isAlreadyInLibrary = true;
                        break;
                    }
                }
                if (!$isAlreadyInLibrary) 
                {
                    $sql = "SELECT `gameid` FROM `wishlist` WHERE `userid`='" . $_SESSION['id'] . "' AND `gameid` = '" . $gameID . "'";
                    $result = mysqli_query($conn, $sql);
                    $isAlreadyInWishlist = mysqli_num_rows($result) > 0;
                    
                    if (!$isAlreadyInWishlist) 
                    {
                        $sql = "INSERT INTO `wishlist`(`userid`, `gameid`) VALUES ('" . $_SESSION['id'] . "','" . $gameID . "')";
                        $result = mysqli_query($conn, $sql);
                    }
                    else 
                    {
                        echo "<script>alert('This game is already in your WISHLIST!')</script>";
                    }
    
                } 
                else 
                {
                    echo "<script>alert('You own this game!')</script>";
                }
            }
            ?>
            </form>
            <br>
        <form method="POST">
                <footer>
                    <button type="submit" name="logout" value="logout">Logout</button>
                </footer>
        </form>
</body>
</html>