<?php
include '../Controllers/profile_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
    <link rel="stylesheet" type="text/css" href="../Content/profile.css">
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
<div class="logo">
    <h1>PROFILE</h1>
    <img src="./igslogo/" alt="">
</div>
<div class="dp">
    <img src="../Assets/icon/user.png" alt="">
</div>
<h4 class="info">
    <?php
    echo $_SESSION['fullname'];
    ?>
    </h4>
    <form method = "POST">
        <button type="submit" name="update" value="submit" class="updatebtn">Update</button>
    </form>
    </div>
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

    <Form method="POST">
        <div>
            <button type="submit" name="support" value="support" class="supportbtn">Support</button>
        </div>
    </Form>
    <form action="" method="POST">
    <footer class="logout">
        <div class="logout-bar">
            <button type="submit" name="logout" value="logout"><img src="../Assets/icon/logout.png" alt="">
        </div>
    </footer>
    </form> 
</body>
</html>