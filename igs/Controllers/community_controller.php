<?php
session_start();
include '../Models/community_model.php';

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
if(isset($_POST['wishlist']))
{
    header('Location: ../Views/wishlist.php');
}
if(isset($_POST['News']))
{
    header('Location: ../Views/news.php');
}
if(isset($_POST['img']))
{
    header('Location: ../Views/gamepage.php');
}
?>