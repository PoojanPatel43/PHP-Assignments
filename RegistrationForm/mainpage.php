<?php

session_start();

if(!isset($_SESSION['Username']))
{
    header("Location : login.php");
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
     <a href="showvalue.php">Show Details</a>
     <br>
    <a href="logout.php">Logout</a>
</body>
</html>