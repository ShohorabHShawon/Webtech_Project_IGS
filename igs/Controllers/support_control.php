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
if (isset($_POST['profile'])) {
    header('location: ../Views/profile.php');
}
?>
