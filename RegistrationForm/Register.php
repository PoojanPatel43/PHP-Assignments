<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form action="" method="post">
       <div>
        First Name: <input type="text" name="FirstName" required>
       </div>
        <br>
        <div>        
        Middle Name: <input type="text" name="MiddleName" required>
        </div>
        <br>
        <div>        
        Last Name: <input type="text" name="LastName" required>
        </div>
        <br>
        <div>
        Birth Date: <input type="date" name="BirthDate" required>
       </div>
       <br>
       <div>
        Class: <input type="text" name="class" required>
       </div>
      <br>
      <div>
        PRN: <input type="text" name="prn" required>
       </div>
      <br>
      <div>
        RollNo: <input type="number" name="rollno" required>
       </div>
      <br>
        <button>Submit</button>
        <p>Already a user? <a href="login.php"><b>Log in</b></a></p>
    </form>

</head>
<body>
    
</body>
</html>


<?php

session_start();

require_once "config.php";

$firstname = $middlename = $lastname = $birthdate = $class = $prn = $rollno = $username = $password = "";
$firstname_err = $middlename_err = $lastname_err = $birthdate_err = $class_err = $prn_err = $rollno_err = $username_err = $password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //Check if any field is empty
    if(empty(trim($_POST['FirstName'])))
    {
        $firstname_err = "FirstName cannot be blank";
    }
    else
    {
      $firstname = $_POST['FirstName'];
    }
    if(empty(trim($_POST['MiddleName'])))
    {
        $middlename_err = "FirstName cannot be blank";
    }
    else
    {
      $middlename = $_POST['MiddleName'];
    }
    if(empty(trim($_POST['LastName'])))
    {
        $lastname_err = "LastName cannot be blank";
    }
    else
    {
      $lastname = $_POST['LastName'];
    }
    if(empty(trim($_POST['BirthDate'])))
    {
        $birthdate_err = "FirstName cannot be blank";
    }
    else
    {
      $birthdate = $_POST['BirthDate'];
    }
    if(empty(trim($_POST['class'])))
    {
        $class_err = "FirstName cannot be blank";
    }
    else
    {
      $class = $_POST['class'];
    }
    if(empty(trim($_POST['prn'])))
    {
        $prn_err = "FirstName cannot be blank";
    }
    else
    {
      $prn = $_POST['prn'];
    }
    if(empty(trim($_POST['rollno'])))
    {
        $rollno_err = "FirstName cannot be blank";
    }
    else
    {
      $rollno = $_POST['rollno'];
    }

    echo "Hello";


    $username = "$firstname"."."."$lastname";
    $password = "$firstname"."."."$lastname";

    if(empty($firstname_err) && empty($lastname_err) && empty($middlename_err) && empty($birthdate_err) && empty($prn_err) && empty($rollno_err) && empty($class_err))
    {
      $param_firstname = $firstname;
      $param_middlename = $middlename;
      $param_lastname = $lastname;
      $param_birthdate = $birthdate;
      $param_class = $class;
      $param_PRN = $prn;
      $param_rollno = $rollno;
      $param_username = $username;
      $param_password = md5($password);
      $sql = "INSERT INTO `student` (`FirstName`, `MiddleName`, `LastName`, `BirthDate`, `Class`, `PRN`, `RollNo`, `Username`, `Password`) VALUES ('$param_firstname', '$param_middlename', '$param_lastname', '$param_birthdate', '$param_class', '$param_PRN', '$param_rollno', '$param_username', '$param_password');";
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
