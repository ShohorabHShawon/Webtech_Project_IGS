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
include '../Models/cart_model.php';

if (!isset($_SESSION['id'])) {
    header('location: ../Views/login.php');
} else {
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../Views/login.php');
    }
}

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

if (isset($_POST['buy'])) {
    header('Location: payment.php');
}

if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM cart WHERE id='$id'";
    mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM cart WHERE userid = $_SESSION[id]";
$result = mysqli_query($conn, $sql);
?>
