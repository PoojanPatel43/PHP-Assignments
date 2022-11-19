<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
   

    <form action="" method="post">
       <div>
        Username: <input type="text" name="username" required>
       </div>
        <br>
        <div>        
        Password: <input type="password" name="password" required>
        </div>
        <br>
        <button name="submit">Login</button>
        <p>New user? <a href="Register.php"><b>Register</b></a></p>
      
    </form>
</head>
<body>
</body>
</html>



<?php

session_start();

//If user is already logged in
if(isset($_SESSION['Username']))
{
    header("location: mainpage.php");
    exit;
}

require_once "config.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `student` WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Username'] = $row['Username'];
        header("Location : mainpage.php");
    }
}

ini_set('display_errors', 1);

?>
