<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Stationary";

$con = mysqli_connect($servername,$username,$password,$dbname);

$category = $_POST['m_category'];
$m_name = $_POST['m_name'];


$sql = "SELECT * FROM `stationary_table` WHERE `MaterialCategory` = '$category' AND `MaterialName` = '$m_name'";

$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if($num > 0)
{
    echo "<table><tr><th>SupplierCode</th><th>SupplierName</th><th>MaterialCategory</th><th>MaterialName</th><th>RegistrationDate</th><th>ValidYear</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr><td>".$row["SupplierCode"]."</td><td>".$row["SupplierName"]."</td><td>".$row["MaterialCategory"]."</td><td>".$row["MaterialName"]."</td><td>".$row["RegisterdOn"]."</td><td>".$row["ValidYear"]."</td></tr>";
    }
    echo "</table>";
       
}


?>