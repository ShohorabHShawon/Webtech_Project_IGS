<?php
session_start();
if(!isset($_SESSION['id'])) 
{
        header('location: login.php');
}
else{
    if(isset($_POST['logout']))
{
    session_destroy();
    header('location: login.php');
}
}
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="body.css">
</head>
<body>
    <div class="logo">
        <h1>PAYMENT</h1>
    </div>
<hr>

<div class="wrapper">
    
    <h1>Payment</h1>
    
    <p>
<?php
$sql = "SELECT * FROM cart WHERE userid = $_SESSION[id]";
$result = mysqli_query($conn, $sql);
$total = 0;
while($row=mysqli_fetch_assoc($result))
{
    $sql2 = "SELECT * FROM game WHERE id = $row[gameid]";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $total = $total + $row2['price'];
}
echo "Total Ammount is $".$total;
?>
<p/>
<form method = "POST">
    <input type="text" name="cardnumber" placeholder="Card Number"> <br>
    <input type="text" name="chname" placeholder="Card Holder Name"><br>
    <input type="text" name="expdate" placeholder="Exp Date"><br>
    <input type="text" name="cvv"  placeholder="CVV"><br>
    <button type="submit" name="pay">Pay</button> <br>
    <br>
    <button type="submit" name="cart">Cart</button>
    <button type="submit" name="Library">Library</button>
   </form>
</div>
<?php
if(isset($_POST['cart']))
{
    header('Location: cart.php');
}
if(isset($_POST['Library']))
{
    header('Location: wishlist.php');
}

if (isset($_POST['pay'])) {
    $cardnumber = $_POST['cardnumber'];
    $chname = $_POST['chname'];
    $expdate = $_POST['expdate'];
    $cvv = $_POST['cvv'];

    if (empty($cardnumber) || empty($chname) || empty($expdate) || empty($cvv)) {
        echo "<script>alert('Please Fill up all the fields')</script>";
    } else {
        $sql = "INSERT INTO `payment`(`cardnumber`, `chname`, `expdate`, `cvv`) VALUES ('$cardnumber','$chname','$expdate','$cvv')";
        mysqli_query($conn, $sql);

        $sql = "SELECT * FROM cart WHERE userid = $_SESSION[id]";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) 
        {
            $sql = "INSERT INTO `library`(`userid`, `gameid`) VALUES (".$_SESSION['id'].",".$row['gameid'].")";
            $result2 = mysqli_query($conn, $sql);

            $sql = "DELETE FROM cart WHERE userid = $_SESSION[id] AND gameid = ".$row['gameid'];
            mysqli_query($conn, $sql);

            $sql = "DELETE FROM wishlist WHERE userid = $_SESSION[id] AND gameid = ".$row['gameid'];
            mysqli_query($conn, $sql);
        }

        $sql = "DELETE FROM cart WHERE userid = $_SESSION[id]";
        mysqli_query($conn, $sql);
        echo "<script>alert('Payment Successful')</script>";
    }
}

?>
</body>
</html>