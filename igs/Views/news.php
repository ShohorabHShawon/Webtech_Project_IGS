<?php
include '../Controllers/news_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
    <link rel="stylesheet" type="text/css" href="../Content/news.css">
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
    <img src="../Assets/igslogo/igs_logo.png" alt="">
</div>
    <div class="wrapper" method="POST">
        <h1 class="catagory">Latest News</h1>
        <div class="news-list">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <ul class="news-item">
        <li class="publisher_name">
            <?php echo "@" . $row['publisher_name']; ?>
        </li>
        <li class="game_news">
            <p class=""><?php echo "# ". $row['news']; ?></p>
        </li>
        </ul>
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
</body>
</html>