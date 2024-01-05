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
if (isset($_POST['addtocart'])) 
{
    $gameID = $_POST['id'];
    $isAlreadyInLibrary = false;
    $isAlreadyInCart = false;
    $sql = "SELECT `gameid` FROM `library` WHERE `userid`='" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) 
    {
        if ($row['gameid'] == $gameID) 
        {
            $isAlreadyInLibrary = true;
            break;
        }
    }
    if (!$isAlreadyInLibrary) 
    {
        $sql = "SELECT `gameid` FROM `cart` WHERE `userid`='" . $_SESSION['id'] . "' AND `gameid` = '" . $gameID . "'";
        $result = mysqli_query($conn, $sql);
        $isAlreadyInCart = mysqli_num_rows($result) > 0;
        if (!$isAlreadyInCart) 
        {
            $sql = "INSERT INTO `cart`(`userid`, `gameid`) VALUES ('" . $_SESSION['id'] . "','" . $gameID . "')";
            $result = mysqli_query($conn, $sql);
        }
        else 
        {
        echo "<script>alert('This game is already in your CART!')</script>";
        }
    } 
        else 
        {
            echo "<script>alert('You own this game!')</script>";
        }
    }
    
    if(isset($_POST['addwishlist']))
    {
        $gameID = $_POST['id'];
                
        $isAlreadyInLibrary = false;
        $isAlreadyInWishlist = false;
        
        $sql = "SELECT `gameid` FROM `library` WHERE `userid`='" . $_SESSION['id'] . "'";
        $result = mysqli_query($conn, $sql);
        
    while ($row = mysqli_fetch_assoc($result)) 
    {
        if ($row['gameid'] == $gameID) 
        {
            $isAlreadyInLibrary = true;
            break;
        }
    }
if (!$isAlreadyInLibrary)
{
    $sql = "SELECT `gameid` FROM `wishlist` WHERE `userid`='" . $_SESSION['id'] . "' AND `gameid` = '" . $gameID . "'";
    $result = mysqli_query($conn, $sql);
    $isAlreadyInWishlist = mysqli_num_rows($result) > 0;
        
    if (!$isAlreadyInWishlist)
    {
        $sql = "INSERT INTO `wishlist`(`userid`, `gameid`) VALUES ('" . $_SESSION['id'] . "','" . $gameID . "')";
        $result = mysqli_query($conn, $sql);
    }
    else
    {
        echo "<script>alert('This game is already in your WISHLIST!')</script>";
    }
    
    } 
    else
    {
        echo "<script>alert('You own this game!')</script>";
    }
}
?>