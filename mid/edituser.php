<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);

if( isset($_GET['edit']))
{
    $name = $_GET['edit'];
    $sql = "SELECT * FROM database1 WHERE Name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['ID'];
    $email = $row['Email'];
    $phone = $row['Phone'];
    $password = $row['Password'];
    echo"<form>
        <input type='text' name=id value='$id' placeholder='ID' hidden>
        <input type='text' name='name' value='$name' placeholder='Name'><br>
        <input type='text' name='email' value='$email' placeholder='Email'><br>
        <input type='number' name='phone' value='$phone' placeholder='Phone'><br>
        <input type='password' name='password' value='$password' placeholder='Password'><br>
        <button type='submit' name='update' value='$name'>Update</button>
    </form>";
}

if(isset($_GET['update']))
{
    $id=$_GET['id'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $password=$_GET['password'];
    $sql="UPDATE `database1` SET `Name`='$name',`Email`='$email',`Phone`='$phone',`Password`='$password' Where ID=$id";
    mysqli_query($conn, $sql);
    header('Location: admin.php');
}
?>
