<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql= "SELECT * FROM `news`";
$result= mysqli_query($conn, $sql);
?>