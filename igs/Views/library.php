<?php
include '../Controllers/library_control.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Library</title>
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
        <h1>LIBRARY</h1>
        <img src="./igslogo/" alt="">

        <p class="info">
            <?php
            echo $_SESSION['fullname'] . "'s Library";
            ?>
        </p>
    </div>
    <hr>
    <div class="wrapper">
    <h1>My Games</h1>
    <form method="POST" action= "../Controllers/library_control.php">
    <table>
        <tr>
        <th>Game</th>
        <th>Name</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
            $sql = "SELECT * FROM game WHERE id = $row[gameid]";
            $result2 = mysqli_query($conn, $sql);
            while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
        <tr>
        <td class="game-image">
            <img src="<?php echo '../assets/gameimage/' . $row2['image']; ?>" height="200" width="300">
        </td>
        <td class="game-name">
            <?php echo $row2['name']; ?>
        </td>
        <td>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </form>
        </td>
        <td>
            <a href="../Views/review.php?id=<?php echo $row2['id'];?>" class="reviewbtn">Review</a>
        </td>
        </tr>
        <?php
        }
        }
        ?>
    </table>
    </form>
    </div>
    <script>
    </script>
    <form method="POST">
    <footer class="logout">
        <div class="logout-bar">
            <button type="submit" name="logout" value="logout"><img src="../Assets/icon/logout.png" alt="">
        </div>
    </footer>
    </form>
</body>

</html>
