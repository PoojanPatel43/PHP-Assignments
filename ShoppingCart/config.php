<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopingcart";

$con = mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
    die("sorry we failed to connect");
}

?>




