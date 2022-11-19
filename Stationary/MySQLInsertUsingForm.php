<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="MySQLInsertUsingForm.php" method="post">
        Supplier Code: <input type="number" name="s_code">
        <br>
        <br>
        Supplier Name: <input type="text" name="s_name">
        <br>
        <br>
        Material Category: <input type="text" name="category">
        <br>
        <br>
        Material Name: <input type="text" name="m_name">
        <br>
        <br>
        Registration Date: <input type="date" name="r_date">
        <br>
        <br>
        Valid Year: <input type="text" name="year">
        <br>
        <br>
        <button>Submit</button>
    </form>
    <form action="MySQLDisplay.php" method="post">
        <button>Display</button>
    </form>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Stationary";

$con = mysqli_connect($servername,$username,$password,$dbname);

$s_code = $_POST['s_code'];
$s_name = $_POST['s_name'];
$category = $_POST['category'];
$m_name = $_POST['m_name'];
$date = $_POST['r_date'];
$year = $_POST['year'];

$sql = "INSERT INTO `stationary_table` (`SupplierCode`, `SupplierName`, `MaterialCategory`, `MaterialName`, `RegisterdOn`, `ValidYear`) VALUES ('$s_code', '$s_name', '$category', '$m_name', '$date', '$year'); ";

$result = mysqli_query($con,$sql);

if($result)
{
    echo "Value Inserted<br>";
}

?>