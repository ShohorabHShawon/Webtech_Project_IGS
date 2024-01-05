<?php
include '../Controllers/community_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Community</title>
    <link rel="stylesheet" type="text/css" href="../Content/menu.css">
    <link rel="stylesheet" type="text/css" href="../Content/body.css">
    <link rel="stylesheet" type="text/css" href="../Content/store.css">
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
    <img src="../Assets/igslogo/igs_logo.png" alt="">
</div>
    <h1 class="catagory">Community</h1>
    <textarea name="" id="" cols="30" rows="10" class="wrapper"></textarea><br>
    <button type="submit" name="post" class="cartbtn">Post</button>
</body>
</html>