<?php
include '../Controllers/wishlist_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
    <link rel="stylesheet" type="text/css" href="../Content/body.css">
</head>
<body>
    <menu class="menu-bar">
        <form method="POST">
            <button type="submit" name="Store"><img src="../Assets/icon/shops.png" alt=""></button>
            <button type="submit" name="Profile"><img src="../Assets/icon/user.png" alt=""></button>
            <button type="submit" name="Library"><img src="../Assets/icon/library.png" alt=""></button>
            <button type="submit" name="wishlist"><img src="../Assets/icon/wishlist.png" alt=""></button>
            <button type="submit" name="cart" value="cart""><img src="../Assets/icon/CART.png" alt=""></button>
        </form>
    </menu>
    <br>
    <hr>
        <div class="logo">
        <h1>WISHLIST</h1>
        <img src="./igslogo/" alt="">
    
    <p class="info"> 
    <?php
        echo $_SESSION['fullname']."'s Wishlist";
    ?>
    </p>
    </div>
    <hr>
    <div class="wrapper">
<h1>My Wishlist</h1>
<form method="POST">
<table>
    <tr>
        <th>Game</th>
        <th>Name</th>
        <th>Price</th>
        <th>Cart</th>
        <th>Remove</th>
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
            <img src="<?php echo '../assets/gameimage/' . $row2['image']; ?>" height="200" width="300">
        </td>
        <td class="game-name">
            <?php echo $row2['name']; ?>
        </td>
        <td class="game-price">
            <?php echo "$".$row2['price']; ?>
        </td>
        <td class="game-addtocart">
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
            <button type="submit" name="addtocart">Cart</button>
            </form>
        </td>
        <td class="game-remove">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
            <button type="submit" name="remove">Remove</button>
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
    <footer class="logout">
        <div class="logout-bar">
            <button type="submit" name="logout" value="logout"><img src="../Assets/icon/logout.png" alt="">
        </div>
    </footer> 
    </form>

</body>
</html>