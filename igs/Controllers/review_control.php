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
include '../Models/review_model.php';

if(isset($_POST['rate']))
{
    $id = $_SESSION['id'];
    $game_id = $_POST['game_id'];
    $user_name = $_POST['user_name'];
    $user_rating = $_POST['user_rating'];
    $user_review = $_POST['user_review'];
    
    echo $user_rating.$user_review;
    if (empty($user_review)) {
        echo "<script>alert('Please write your review')</script>";
    }
    else{
        $sql = "INSERT INTO `review`(`game_id`, `user_name`, `user_rating`, `user_review`) VALUES ('$game_id','$user_name','$user_rating','$user_review')";
        mysqli_query($conn, $sql);
        header('Location: ../Views/library.php');
    }
}
if (isset($_POST['library'])) {
    header('Location: ../Views/library.php');
}
?>