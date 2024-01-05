<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql= "SELECT * FROM `game`";
$result= mysqli_query($conn, $sql);
?>