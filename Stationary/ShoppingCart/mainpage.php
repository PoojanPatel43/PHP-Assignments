<?php
session_start();

if(!isset($_SESSION['Username']))
{
    header("Location : login.php");
}

if(isset($_POST['ADD']))
{
    // print_r($_POST['product_id']);
    if(isset($_SESSION['cart']))
    {
        $item_id = array_column($_SESSION['cart'],"product_id");
        print_r($item_id);
        print_r($_SESSION['cart']);

        if(!in_array($_POST['product_id'],$item_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array('product_id'=>$_POST['product_id']);

            $_SESSION["cart"][$count] = $item_array;

        }
        else
        {
            echo '<script> alert("ITEM ALREADY ADDED!")</script>';
            echo '<script>window.location = "mainpage.php"</script>';

        }
    }
    else
    {

    $item = array('product_id'=>$_POST['product_id']);
    $_SESSION['cart'][0] = $item;
    print_r($_SESSION['cart']);

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

<?php
// session_start();
include ( "config.php" );
$email = $_SESSION['Username'];
$sql = "SELECT * FROM cart WHERE Email = '$email'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row['FirstName'];
        $lname = $row['LastName'];
    }
}    
echo "<h3>Welcome: <b>$name $lname</b></h3><br><br>Products Available <br><br>";
?>

<form action="cart.php" method="post">
    <!-- <div>
        Phone: <input type="number" name="phone">
        <button name="ADD">ADD TO CART</button>
        <input type="hidden" name="product_id" value="1">
    </div> -->
        <input type="checkbox" name="products[]" value = "Wafers  Rs 30" id = "1"> &emsp; Wafers &emsp; 
        Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
        <input type="checkbox" name="products[]" value = "Chocolate Rs 5" id = "2" > &emsp; Chocolate &emsp;
        Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
        <input type="checkbox" name="products[]" value = "Real Juice  Rs 35" id = "3" > &emsp; Real Juice &emsp;
        Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
        <input type="checkbox" name="products[]" value = "Kurkure  Rs 10" id = "4" > &emsp; Kurkure &emsp;
        Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
        <input type="checkbox" name="products[]" value = "Cake Rs 300" id = "5" > &emsp; Cake &emsp;
        Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
        <button>Submit</button>
</form>


<!-- <a href="logout.php">Logout</a> -->
</body>
</html>