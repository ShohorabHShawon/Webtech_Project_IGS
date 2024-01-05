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
include '../Models/update_model.php';

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    if (empty($name) || empty($email) || empty($phone) || empty($pass)) {
        echo "<script>alert('Please Fill up all the fields')</script>";
    } else {
        $sql = "UPDATE `database1` SET `Name`='$name', `Email`='$email', `Phone`='$phone', `Password`='$pass' WHERE id = $_SESSION[id]";
        mysqli_query($conn, $sql);
        echo "<script>alert('Update Successful'); window.location.href='../Views/profile.php';</script>";
        exit();
    }
}
if (isset($_POST['profile'])) {
    header('location: ../Views/profile.php');
}
?>
