<?php
include '../Controllers/review_control.php'; error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review</title>
    <link rel="stylesheet" type="text/css" href="../Content/review.css">
</head>
<body>
<h1 class="catagory">Review</h1>
<div class="wrapper">
    <form method="POST" class="form">
    <input type="text" name="game_id" value="<?php echo $_GET['id'];?>" hidden> <br>
    <input type="text" name="user_name" class="showname" value="<?php echo $_SESSION['fullname'];?>" readonly>
    <div class="rating">
    <input type="radio" name="user_rating" id="1" value="5"><label for="1"></label>
    <input type="radio" name="user_rating" id="2" value="4"><label for="2"></label>
    <input type="radio" name="user_rating" id="3" value="3"><label for="3"></label>
    <input type="radio" name="user_rating" id="4" value="2"><label for="4"></label>
    <input type="radio" name="user_rating" id="5" value="1"><label for="5"></label>
    </div>
    <textarea name="user_review" class="reviewarea" placeholder="Write your review here"></textarea><br>
    <button type="submit" name="rate" class="ratebtn">Rate</button>
        <button type="submit" name="library" class="librarybtn">Library</button>
    </form>
</div>
</body>
</html>