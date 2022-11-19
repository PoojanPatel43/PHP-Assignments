<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Stationary";

$con = mysqli_connect($servername,$username,$password);

if($con)
{
    echo "Connection was successful <br>";
}
else
{
    echo "Connection was not successful <br>";
}
$sql = "CREATE DATABASE IF NOT EXISTS `Stationary`";

$result = mysqli_query($con,$sql);

if($result)
{
    echo "Database created <br>";
}
else
{
    echo "Database is not created";
}


mysqli_close($con);

$con = mysqli_connect($servername,$username,$password,$dbname);


$sql = "CREATE TABLE IF NOT EXISTS `stationary_table` ( `SupplierCode` INT(5) NOT NULL , `SupplierName` VARCHAR(12) NOT NULL ,  `MaterialCategory` VARCHAR(255) NOT NULL ,`MaterialName` VARCHAR(20) NOT NULL ,`RegisterdOn` DATE NOT NULL  ,`ValidYear` INT(10) NOT NULL,    PRIMARY KEY  (`SupplierCode`));";

$result = mysqli_query($con,$sql);

if($result)
{
    echo "Table created <br>";
}
else
{
    echo "Table is not created".mysqli_error($con);
}





?>