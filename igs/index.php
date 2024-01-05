<?php
include_once('./Controllers/index_control.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./Content/index.css">
    <link rel="stylesheet" type="text/css" href="./Content/menu.css">
</head>
<body>
    <menu class="menu-bar">
        <form method="POST">
            <button type="submit" name="Store"><img src="./Assets/icon/shops.png" alt=""></button>
            <button type="submit" name="Profile"><img src="./Assets/icon/user.png" alt=""></button>
            <button type="submit" name="Library"><img src="./Assets/icon/library.png" alt=""></button>
            <button type="submit" name="wishlist"><img src="./Assets/icon/wishlist.png" alt=""></button>
            <button type="submit" name="cart" value="cart""><img src="./Assets/icon/CART.png" alt=""></button>
        </form>
    </menu>
  <div class="logo">
    <img src="./Assets/igslogo/igs_logo.png" alt="">
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

        <a href="./Views/login.php">
            <img src="./Assets/gameimage/fifa24.jpeg">
        </a>
        <a href=>
            <h1>EA FC 2024</h1>
        </a>
        <li>
            <h2>$45</h2>
        </li>
        
        </ul>
        </div>

        <div class="game-item">
        <a href= class="game-image">
                <img src="">
        </a>
        <a href= class="game-name">
               
        </a>
        <div class="game-price">
        </div>
        <div class="game-addtocart">
            <form action="" method="POST">
            <input type="hidden" name="id" ">
            <button type="submit" name="addtocart"><img src="./Assets/icon/CART.png" alt=""></button>
            </form>
        </div>
        <div class="game-addtowishlist">
        <form action="" method="POST">
        <input type="hidden" name="id" ">
        <button type="submit" name="addwishlist"><img src="./Assets/icon/wishlist.png" alt=""></button>
        </form>
        </div>
        </div>

    </div>
</div>
    
</body>
</html>