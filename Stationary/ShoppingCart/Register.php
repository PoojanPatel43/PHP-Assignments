<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        First Name: <input type="text" name="c_firstname" required>
        <br>
        <br>
        Last Name: <input type="text" name="c_lastname" required>
        <br>
        <br>
        Email: <input type="text" name="email" required>
        <br>
        <br>
        Mobile No: <input type="text" name="number" required>
        <br>
        <br>
        <button>Submit</button>
        <p>existing customer? <a href="login.php"><b>Login</b></a></p>
    </form>
</body>
</html>


<?php

session_start();

require_once "config.php";

$c_firstname =$c_lastname = $email = $mobileno ="";
$c_firstname_err =$c_lastname_err = $email_err =$mobileno_err= "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //Check if any field is empty
    if(empty(trim($_POST['c_firstname'])))
    {
        $c_firstname_err = "Name cannot be blank";
    }
    else
    {
      $c_firstname = $_POST['c_firstname'];
    }
    if(empty(trim($_POST['c_lastname'])))
    {
        $c_lastname_err = "Name cannot be blank";
    }
    else
    {
      $c_lastname = $_POST['c_lastname'];
    }
    if(empty(trim($_POST['email'])))
    {
        $email_err = "email cannot be blank";
    }
    else
    {
      $email = $_POST['email'];
    }
    if(empty(trim($_POST['number'])))
    {
        $mobileno_err = "mobileno cannot be blank";
    }
    else
    {
      $mobileno = $_POST['number'];
    }
    
    echo "Hello";

    $password = "$mobileno"."."."$c_lastname";

    if(empty($c_firstname_err) && empty($c_lastname_err) && empty($email_err) && empty($mobileno_err))
    {
      $param_cfirstname = $c_firstname;
      $param_clastname = $c_lastname;
      $param_email = $email;
      $param_number = $mobileno;
      $param_password = md5($password);
      $sql = "INSERT INTO `cart` (`FirstName`, `LastName`, `Email`, `MobileNo`, `Password`) VALUES ('$param_cfirstname', '$param_clastname', '$param_email', '$param_number', '$param_password');";
      $stmt = mysqli_query($con,$sql);
      echo "Hello";
      if($stmt)
      {
        header("location:login.php");

      }
      else{
        echo "Something went wrong".mysqli_error($con);
      }

      }
        // mysqli_stmt_close();

}

mysqli_close($con);












?>