<?php
include_once '../Controllers/update_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="../Content/body.css">
</head>
<body>
<h1>UPDATE</h1>
<div class="wrapper">
    <h1>Update Profile</h1>
    <form method="POST">
        <?php $row = mysqli_fetch_assoc($result) ?>
        <input type="text" name="name" value='<?php echo $row["Name"]; ?>' placeholder="Name"> <br>
        <input type="email" name="email" value='<?php echo $row["Email"]; ?>' placeholder="Email"><br>
        <input type="text" name="phone" value='<?php echo $row["Phone"]; ?>' placeholder="Phone"><br>
        <input type="password" name="pass" value='<?php echo $row["Password"]; ?>' placeholder="Password"><br>
        <button type="submit" name="update" value="submit" class="updatebtn">Update</button>
        <button type="submit" name="profile" value="submit" class="profilebtn">Profile</button>
    </form>
</div>
</body>
</html>
