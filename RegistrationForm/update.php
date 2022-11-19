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

$firstname = $middlename = $lastname = $birthdate = "";
$firstname_err = $middlename_err = $lastname_err = $birthdate_err = "";

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
        $birthdate_err = "Birthdate cannot be blank";
    }
    else
    {
      $birthdate = $_POST['BirthDate'];
    }
    
    // echo "Hello";


    // $username = "$firstname"."."."$lastname";
    // $password = "$firstname"."."."$lastname";

    if(empty($firstname_err) && empty($lastname_err) && empty($middlename_err) && empty($birthdate_err))
    {
      $param_firstname = $firstname;
      $param_middlename = $middlename;
      $param_lastname = $lastname;
      $param_birthdate = $birthdate;
    //   $param_class = $class;
    //   $param_PRN = $prn;
    //   $param_rollno = $rollno;
      $param_username = $_SESSION['Username'];
    //   $param_password = md5($password);
      $sql = "UPDATE student SET FirstName='$param_firstname',MiddleName='$param_middlename',LastName='$param_lastname',BirthDate='$param_birthdate' WHERE Username='$param_username'";
      $stmt = mysqli_query($con,$sql);
      echo "Hello";
      if($stmt)
      {
        header("location:mainpage.php");

      }
      else{
        echo "Something went wrong".mysqli_error($con);
      }

      }
        // mysqli_stmt_close();

}

mysqli_close($con);












?>
