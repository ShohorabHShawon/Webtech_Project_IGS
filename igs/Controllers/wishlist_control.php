<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ../Views/login.php');
} else {
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../Views/login.php');
    }
}
include '../Models/wishlist_model.php';

if (isset($_POST['Store'])) {
    header('Location: ../Views/store.php');
}
if (isset($_POST['Library'])) {
    header('Location: ../Views/library.php');
}
if (isset($_POST['Profile'])) {
    header('Location: ../Views/profile.php');
}
if (isset($_POST['cart'])) {
    header('Location: ../Views/cart.php');
}
if (isset($_POST['wishlist'])) {
    header('Location: ../Views/wishlist.php');
}

if (isset($_POST['addtocart'])) {
    $gameID = $_POST['id'];
    
    $isAlreadyInLibrary = false;
    $isAlreadyInCart = false;

    $sql = "SELECT `gameid` FROM `library` WHERE `userid`='" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['gameid'] == $gameID) {
            $isAlreadyInLibrary = true;
            break;
        }
    }

    if (!$isAlreadyInLibrary) {
        $sql = "SELECT `gameid` FROM `cart` WHERE `userid`='" . $_SESSION['id'] . "' AND `gameid` = '" . $gameID . "'";
        $result = mysqli_query($conn, $sql);
        $isAlreadyInCart = mysqli_num_rows($result) > 0;

        if (!$isAlreadyInCart) {
            $sql = "INSERT INTO `cart`(`userid`, `gameid`) VALUES ('" . $_SESSION['id'] . "','" . $gameID . "')";
            $result = mysqli_query($conn, $sql);
        } else {
            echo "<script>alert('This game is already in your CART!')</script>";
        }
    } else {
        echo "<script>alert('You own this game!')</script>";
    }
}
if (isset($_POST['remove'])) {
    $gameID = $_POST['id'];
    $sql = "DELETE FROM `wishlist` WHERE `gameid` = '" . $gameID . "' AND `userid` = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM wishlist WHERE userid = $_SESSION[id]";
$result = mysqli_query($conn, $sql);
?>
