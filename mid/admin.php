<?php
$servername="localhost";
$username="root";
$password="";
$dbname="igs_database";
$conn= new mysqli($servername,$username,$password,$dbname);

if(isset($_GET['add_user']))
{
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];

    if(empty($name) || empty($email) || empty($phone) || empty($password))
    {
        echo "Please fill up all fields";
    }
    else
    {
        $sql="INSERT INTO `database1`(`Name`, `Email`, `Phone`, `Password`) VALUES ('$name','$email','$phone','$password')";
        mysqli_query($conn, $sql);
        echo "Successfully Added";
    }
}

if (isset($_GET['del'])) {
    $name = $_GET['del'];
    $sql = "DELETE FROM database1 WHERE Name='$name'";
    mysqli_query($conn, $sql);
}

$sql= "SELECT * FROM database1";
$result= mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <hr>
    <h1>Users</h1>
<form method="GET">
     <table border="1">
     	<tr>
     		<th>Name</th>
     		<th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Delete</th>
     		<th>Edit</th>
            
     	</tr>
        <?php while($row=mysqli_fetch_assoc($result)){ ?>
     	<tr>
     		<td><?php echo $row["Name"] ; ?></td>
     		<td><?php echo $row["Email"] ; ?></td>
            <td><?php echo $row["Phone"] ; ?></td>
            <td><?php echo $row["Password"] ; ?></td>
     		<td><button type="Submit" name="del" value="<?php echo $row["Name"] ; ?>"> Delete </button></td>
            <td><button type="Submit" name="edit" value="<?php echo $row["Name"] ; ?>"> Edit </button></td>
     	</tr>
        <?php } ?>
     </table>
    </form>
        <hr>
        <h1>Add User</h1>

    <form>
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="number" name="phone" placeholder="Phone"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="add_user" value="submit">Add User</button>

    </form>
    
    <hr>

    <form action="" method="POST">
        <button type="submit" name="logout" value="logout">Logout</button>
    </form>
    <?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('Location: login.php');
    }


    if(isset($_GET['edit']))
    {
       header('Location: edituser.php?edit='.$_GET['edit']);
    }
    ?>

</body>
</html>