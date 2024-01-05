<?php
include '../Models/login_model.php';
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email) || empty($pass)) {
        echo "<script>alert('Please Fill Up The Fields')</script>";
    } else {
        $result = userLogin($email, $pass);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $name = $row['Name'];
            $_SESSION['id'] = $row["ID"];
            $_SESSION['fullname'] = $name;
            header('Location: store.php');
        } else {
            echo "<script>alert('Invalid Email or Password')</script>";
        }
        if ($email == $admin && $pass == $adminpass) {
            header('Location: admin.php');
        }
    }
    if ($email == $admin && $pass == $adminpass) {
        header('Location: admin.php');
    }
}
if (isset($_POST['reg'])) 
{
    header('Location: registration.php');
}
function userLogin($email, $pass) 
{
    global $conn;
    $sql = "SELECT * FROM database1 WHERE email='$email' AND password='$pass'";
    return mysqli_query($conn, $sql);
}
?>
