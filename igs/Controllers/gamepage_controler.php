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
include '../Models/gamepage_model.php';

if(isset($_POST['Profile']))
{
    header('Location: ../Views/profile.php');
}
if(isset($_POST['Store']))
{
    header('Location: ../Views/store.php');
}
if(isset($_POST['Library']))
{
    header('Location: ../Views/library.php');
}
if(isset($_POST['cart']))
{
    header('Location: ../Views/cart.php');
}
if(isset($_POST['Wishlist']))
{
    header('Location: ../Views/wishlist.php');
}
if(isset($_POST['News']))
{
    header('Location: ../Views/news.php');
}

?>