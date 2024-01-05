<?php
include '../Controllers/payment_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="../Content/body.css">
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
            $totalAmount = getTotalAmount($conn, $_SESSION['id']);
            echo "Total Amount is $" . $totalAmount;
            ?>
        </p>
        <form method="POST">
            <input type="text" name="cardnumber" placeholder="Card Number"> <br>
            <input type="text" name="chname" placeholder="Card Holder Name"><br>
            <input type="text" name="expdate" placeholder="Exp Date"><br>
            <input type="text" name="cvv" placeholder="CVV"><br>
            <button type="submit" name="pay" class="paybtn">Pay</button> <br>
            <br>
            <button type="submit" name="cart" class="cartbtn">Cart</button>
            <button type="submit" name="Library" class="librarybtn">Library</button>
        </form>
    </div>
</body>
</html>
