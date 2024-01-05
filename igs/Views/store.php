<?php
include '../Controllers/store_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IGS</title>
    <link rel="stylesheet" type="text/css" href="../Content/store.css">
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
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
<div class="dark-mode">
<img src="../Assets/icon/moon.png" alt="" id="dark">
</div>
<div class="logo">
    <img src="../Assets/igslogo/igs_logo.png" alt="">
</div>
    <div class="wrapper" method="POST">
    <form class="game-search">
        <div class="input-search">
            <input type="text" name="search" id="search" placeholder="Search games">
            <div id="search-item">
            </div>
        </div>
    </form>
        <form method="POST">
            <button type="submit" name="News" class="newsbtn">Game News</button>
            <button type="submit" name="Community" class="communitybtn">Community</button>
        </form>
    <div class="banner">
        <?php
        include '../Models/store_model.php';
            $row = mysqli_fetch_assoc($result);
        ?>
        <ul class="list">
        <a href=<?php echo "gamepage.php?id=".$row['id'] ?>>
            <img src="<?php echo '../assets/gameimage/' . $row['image']; ?>">
        </a>
        <a href=<?php echo "gamepage.php?id=".$row['id'] ?>>
            <h1><?php echo $row['name']; ?></h1>
        </a>
        <li>
            <h2><?php echo "$" . $row['price']; ?></h2>
        </li>  
        </ul>
        </div>
<hr>
        <h1 class="catagory">Popular Games</h1>
    <div class="game-list">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="game-item">
        <a href=<?php echo "gamepage.php?id=".$row['id'] ?> class="game-image">
                <img src="<?php echo '../assets/gameimage/' . $row['image']; ?>">
        </a>
        <a href=<?php echo "gamepage.php?id=".$row['id'] ?> class="game-name">
                <?php echo $row['name']; ?>
        </a>
        <div class="game-price">
            <?php echo "$" . $row['price']; ?>
        </div>
        <div class="game-addtocart">
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="addtocart"><img src="../Assets/icon/CART.png" alt=""></button>
            </form>
        </div>
        <div class="game-addtowishlist">
        <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="addwishlist"><img src="../Assets/icon/wishlist.png" alt=""></button>
        </form>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<form method="POST">
    <?php
    include '../Controllers/game_control.php';
    ?>
    <footer class="logout">
        <div class="logout-bar">
            <button type="submit" name="logout" value="logout"><img src="../Assets/icon/logout.png" alt="">
        </div>
    </footer>
</form>
<script src="../Javascript/dark-mode.js"></script>
<script src="../Javascript/script.js"></script>
</body>
</html>