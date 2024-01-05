<?php
include '../Models/reg_model.php';
session_start();
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Password doesn't match";
    } elseif (empty($name) || empty($email) || empty($phone) || empty($password)) {
        echo "<script>alert('Please Fillup The Form')</script>";
    } else {
        $sql = "INSERT INTO `database1`(`Name`, `Email`, `Phone`, `Password`) VALUES ('$name','$email','$phone','$password')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Registration Successful')</script>";
    }
}

if (isset($_POST['login'])) {
    header('Location: login.php');
}
?>
