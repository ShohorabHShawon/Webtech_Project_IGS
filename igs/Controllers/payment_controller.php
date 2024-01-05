<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ../Views/login.php');
    exit();
} else {
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../Views/login.php');
        exit();
    }
}
include '../Models/wishlist_model.php';
include '../Models/payment_model.php';

if (isset($_POST['cart'])) {
    header('Location: ../Views/cart.php');
    exit();
}
if (isset($_POST['Library'])) {
    header('Location: ../Views/library.php');
    exit();
}

if (isset($_POST['pay'])) {
    $cardnumber = $_POST['cardnumber'];
    $chname = $_POST['chname'];
    $expdate = $_POST['expdate'];
    $cvv = $_POST['cvv'];

    if (empty($cardnumber) || empty($chname) || empty($expdate) || empty($cvv)) {
        echo "<script>alert('Please Fill up all the fields')</script>";
    } else {
        processPayment($conn, $_SESSION['id'], $cardnumber, $chname, $expdate, $cvv);
        echo "<script>alert('Payment Successful')</script>";
    }
}
?>
