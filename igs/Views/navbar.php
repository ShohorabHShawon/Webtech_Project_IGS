<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
</head>
<body>
    <menu class="menu-bar">
        <form method="POST">
            <button type="submit" name="Store"><img src="../Assets/icon/shops.png" alt=""></button>
            <button type="submit" name="Profile"><img src="../Assets/icon/user.png" alt=""></button>
            <button type="submit" name="Library"><img src="../Assets/icon/library.png" alt=""></button>
            <button type="submit" name="Wishlist"><img src="../Assets/icon/wishlist.png" alt="">
                <div class="wishcount">
            <?php
            $sql = "SELECT * FROM wishlist WHERE userid = $_SESSION[id]";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            echo $count;
            ?>
                </div>
            </button>

            <button type="submit" name="cart" value="cart""><img src="../Assets/icon/CART.png" alt="">
                <div class="cartcount">
            <?php
            $sql = "SELECT * FROM cart WHERE userid = $_SESSION[id]";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            echo $count;
            ?>
                </div>
           </button>
        </form>
    </menu>
</body>
</html>