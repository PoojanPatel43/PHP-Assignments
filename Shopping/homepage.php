<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
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
        <form action="">
            <?php
                session_start();
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
                echo "<h3>Welcome: <b>$name </b></h3><br><br>Products Available <br><br>";
            ?>
        </form>
        <form action="cart.php" method="post">
            <input type="checkbox" name="products[]" value = "Sanitizers  Rs 30" id = "1"> &emsp; Sanitizers  Rs. 30 &emsp; 
            Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
            <input type="checkbox" name="products[]" value = "N-95 Mask  Rs 7" id = "2" > &emsp; N-95 Mask  Rs. 7 &emsp;
            Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
            <input type="checkbox" name="products[]" value = "Disinfectents  Rs 35" id = "3" > &emsp; Disinfectents  Rs. 35 &emsp;
            Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
            <input type="checkbox" name="products[]" value = "Cloth Mask  Rs 5" id = "4" > &emsp; Cloth Mask  Rs. 5 &emsp;
            Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
            <input type="checkbox" name="products[]" value = "Water Bottle 1 Ltrs Rs 20" id = "5" > &emsp; Water Bottles 1 Ltrs Rs. 20 &emsp;
            Quantity: <input type="number" name="quantity[]" value = "0" ><br><br>
            <input type="submit" value="View Cart" name = "cart" class = " btn btn-primary lg " ><br>
        </form>
    </div>
</body>
</html>