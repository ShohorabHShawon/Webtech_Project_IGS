<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) {
    header('location: ../Views/login.php');
} else {
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../Views/login.php');
    }
}
include '../Models/review_show_model.php';

?>