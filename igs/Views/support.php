<?php
    include '../Controllers/support_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Form</title>
    <link rel="stylesheet" type="text/css" href="../Content/support.css">
</head>
<body>
    <div class="wrapper">
    <h1>Contact Us</h1>
    <br>
    <form method="post">
        <div class="input-box">
        <input type="text" id="name" name="name" placeholder="Your Name" ><br>

        
        <input type="email" id="email" name="email" placeholder="Your Email" ><br>

        
        <textarea id="message" name="message" rows="4" placeholder="Your Message" ></textarea><br>
        </div>

        <button type="submit" class="button">Send</button>
        <button type="submit" name="profile" value="submit" class="button">Profile</button>
        <a class="emailbtn" href="mailto:shohorab.swn@gmail.com">Email</a>
    </form>

</body>
</html>
