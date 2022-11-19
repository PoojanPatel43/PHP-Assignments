<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<style>
    div {
        margin-left: 40px;
    }
</style>
<body>
    <div>
        <form action="logout.php" method="post">
            <?php
                session_start();
                $amount = 0;
                $qty = 0;
                include ( "config.php" );
                $email = $_SESSION['Username'];
                $sql = "SELECT * FROM Cart WHERE Email = '$email'";
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
                echo "<h3><b>$name $lname</b>'s Cart</h3> <br><br>";
                $products = $_POST['products'];
                $quantity = $_POST['quantity'];
                $price = array( 30, 5, 35, 10, 300 );
                $newPrice = array();
                if( empty( $products )) {
                    echo( "Your cart is empty" );
                } else {
                    $count = count( $products );
                    $qcount = count ( $quantity );
                    $size = 0; $z = 0;
                    for ( $k = 0 ; $k < $qcount ; $k++ ) {
                        if ( $quantity[$k] != 0 ) {
                            $newPrice[$z] = $price[$k];
                            $z = $z + 1;
                        }
                    }
                    for ( $i = 0 ; $i < $qcount ; $i++ ) {
                        if ( $quantity[$i] != 0 ) {
                            $quantity[$size++] = $quantity[$i];
                        }
                    }
                    while ( $size < $qcount ) {
                        $quantity[$size++] = 0;
                    }
                    for ( $i = 0 ; $i < $count ; $i++ ) {
                        echo "", $products[$i], " &emsp; ", $quantity[$i], "x<br>";
                        $amount = $amount + ( $quantity[$i]*$newPrice[$i] );
                    }
                    $gst = $amount * 0.18;
                    $total = $gst + $amount;
                    echo "<h3>Total Amount: <b>Rs. $amount</b><br>GST 18%: <b>Rs. $gst</b><br>Payable Amount: <b>Rs. $total</b></h3><br><br>";
                }
            ?>
           <button>Pay</button>
        </form>
    </div>
</body>
</html>