<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql = "SELECT * FROM review WHERE game_id = ".$_GET['id'];
$result= mysqli_query($conn, $sql);
?>