<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    div {
        margin-left: 40px;
    }
</style>
<body>
    <div align = "left" margin = "20px" >
        <form action="gateway.php" method="post">
            <?php
                session_start();
                $amount = 0;
                $qty = 0;
                include ( "database.php" );
                $email = $_SESSION['userID'];
                $sql = "SELECT * FROM CUSTOMER WHERE EMAIL = '$email'";
                $result = $conct->query( $sql );
                if( $result ) {
                    if ( $result->num_rows > 0 ) {
                    while ( $rows = $result->fetch_assoc() ) {
                            $name = $rows['CUST_NAME'];
                        }
                    }
                }
                echo "<h3><b>$name</b>'s Cart</h3> <br><br>";
                $products = $_POST['products'];
                $quantity = $_POST['quantity'];
                $price = array( 30, 7, 35, 5, 20 );
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
                    $gst = $amount * 0.12;
                    $total = $gst + $amount;
                    echo "<h3>Total Amount: <b>Rs. $amount</b><br>GST 12%: <b>Rs. $gst</b><br>Payable Amount: <b>Rs. $total</b></h3><br><br>";
                }
            ?>
            <input type="submit" value="Pay" class = "btn btn-primary lg" >
        </form>
    </div>
</body>
</html>