<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igs_database";
$conn = new mysqli($servername, $username, $password, $dbname);

function getTotalAmount($conn, $userId) {
    $sql = "SELECT * FROM cart WHERE userid = $userId";
    $result = mysqli_query($conn, $sql);
    $total = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $sql2 = "SELECT * FROM game WHERE id = {$row['gameid']}";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $total += $row2['price'];
    }
    return $total;
}
function processPayment($conn, $userId, $cardnumber, $chname, $expdate, $cvv) {
    $sql = "INSERT INTO `payment`(`cardnumber`, `chname`, `expdate`, `cvv`) VALUES ('$cardnumber','$chname','$expdate','$cvv')";
    mysqli_query($conn, $sql);
    $sql = "SELECT * FROM cart WHERE userid = $userId";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) 
    {

    $sql = "INSERT INTO `library`(`userid`, `gameid`) VALUES ($userId, {$row['gameid']})";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM cart WHERE userid = $userId AND gameid = {$row['gameid']}";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM wishlist WHERE userid = $userId AND gameid = {$row['gameid']}";
    mysqli_query($conn, $sql);

    }
    $sql = "DELETE FROM cart WHERE userid = $userId";
    mysqli_query($conn, $sql);
}
?>
