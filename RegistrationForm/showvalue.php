<?php
session_start();

require_once "config.php";
$param_username = $_SESSION['Username'];

$sql = "SELECT * FROM `student`  WHERE Username='$param_username'";

$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if($num > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        // echo $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']." ".$row['BirthDate']." ".$row['Class']." ".$row['PRN']." ".$row['RollNo']." ".$row['Username'];
        // echo "<br>";
        echo "First Name:". $row['FirstName'];
        echo "<br>";
        echo "Middle Name:".$row['MiddleName'];
        echo "<br>";
        echo "Last Name:".$row['LastName'];
        echo "<br>";
        echo "Birth Date:".$row['BirthDate'];
        echo "<br>";
        echo "Class:".$row['Class'];
        echo "<br>";
        echo "PRN:".$row['PRN'];
        echo "<br>";
        echo "RollNo:".$row['RollNo'];
        echo "<br>";
        echo "Username:".$row['Username'];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php echo "<h3>Welcome ".$_SESSION['Username']."</h3>";?>
     <br> <a href="update.php">Update Info</a><br>
     <br>
    <a href="logout.php">Logout</a>
</body>
</html>