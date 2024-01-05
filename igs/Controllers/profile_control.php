<?php
session_start();
if(!isset($_SESSION['id'])) 
{
        header('location: ../Views/login.php');
}
else{
    if(isset($_POST['logout']))
{
    session_destroy();
    header('location: ../Views/login.php');
}
}
include '../Models/profile_model.php';

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
if (isset($_POST['update'])) {
    header('Location: ../Views/update_profile.php');
}
if (isset($_POST['support'])) {
    header('Location: ../Views/support.php');
}

?>