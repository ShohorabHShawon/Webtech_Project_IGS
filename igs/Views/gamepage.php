<?php
    include '../Controllers/gamepage_controler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Details</title>
    <link rel="stylesheet" type="text/css" href="../Content/gamepage.css">
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
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
<form method="POST">
<div class="banner">
    <?php
    $row = mysqli_fetch_assoc($result);
    ?>
    <ul>
         <li>
            <h1><?php echo $row['name']; ?></h1>
        </li>
         <li>
           <iframe src="<?php echo $row['trailer']; ?>" frameborder="0"></iframe>
        </li>
        <li>
            <h2>Price: <?php echo "$". $row['price']; ?></h2>
        </li>
        <li>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="addtocart"><img src="../Assets/icon/CART.png" alt=""></button>
            </form>
        </li>
        <li>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="addwishlist"><img src="../Assets/icon/wishlist.png" alt=""></button>
        </form>
        </li>
        <li>
            <h2><?php echo "Game Name: " .$row['name']; ?></h2>
        </li>
        <li>
            <h2><?php echo "Publisher Name: " .$row['publisher']; ?></h2>
        </li>
        <li>
            <h3 class="details">Game Details</h3>
        </li>
        <li>
        <p> <?php echo $row['description']; ?></p>
        </li>
    </ul>
</div>
</form>
<hr>
<?php
    include '../Controllers/game_control.php';
?>
<form method="POST" class="review">
<div class="review">
    <h1 class="catagory">Reviews</h1>
    <?php
    include '../Controllers/review_show_control.php';
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
    <div class="border">
    <ul>
        <li>
            <h2 class="name"><?php echo $row['user_name']; ?></h2>
        </li>
        <li>
            <h class="rating"><?php echo $row['user_rating']. "/5"; ?></h>
        </li>
        <li>
            <p class="review"><?php echo $row['user_review']; ?></p>
        </li>
    </ul>
    </div>
    <?php
    }
    ?>
</div>
</form>
<form method="POST">
    <footer class="logout">
        <div class="logout-bar">
            <button type="submit" name="logout" value="logout"><img src="../Assets/icon/logout.png" alt="">
        </div>
    </footer>
</form>
</body>
</html>