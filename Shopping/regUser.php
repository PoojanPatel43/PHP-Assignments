<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
    <br><br>
    <div align = "left" margin = "20px"  >
        <?php
            include ( "database.php" );
            $name = $_POST['name'];
            $dob = $_POST['dob']; $mnob = $_POST['mnob']; $email = $_POST['email'];
            $password = $_POST['password'];
            $cust_id = $_POST['cust_id'];
            $sql = "INSERT INTO CUSTOMER ( CUST_NAME, CUST_ID, DOB, MOBILENO, EMAIL, PASS ) 
            VALUES ('$name', '$cust_id', '$dob', '$mnob', '$email', '$password');";
            if ( $conct->query( $sql ) === true ) {
                echo "Registered Successfully<br>";
            } else {
                echo "Registration Unsuccessfull<br>";
            }
        ?>
        <form action="login.php">
            <input type="submit" value="Login" class = "btn btn-primary lg" ><br>
        </form>
    </div>
</body>
</html>