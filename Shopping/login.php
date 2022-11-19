<?php 
    include( "database.php" );
    session_start();
    if ( isset( $_SESSION['userID'] ) ) { header( "location: homepage.php" ); exit; }
    if ( isset( $_POST['submit'] )) {
        $userID = $_POST['userID'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM CUSTOMER WHERE EMAIL='$userID' AND PASS='$password'";
        $result = $conct->query( $sql );
        if ( $result ) {
            if ( $result->num_rows > 0 ) {
                while ( $rows = $result->fetch_assoc() ) {
                    $_SESSION['userID'] = $rows['EMAIL'];
                    $cookie_name = "username";
                    $cookie_value = $rows['CUST_NAME'];
                    $cookie_time = time()+60*60*60*60*60*24*2;
                    setcookie( $cookie_name, $cookie_value, $cookie_time );
                    header( "location: homepage.php" );
                }
            }
        }
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div align="center" style = "margin-left: 10px">
        <form action="" method="post">
            Login:<br>
            <input type="text" name="userID" ><br><br>
            Password:<br>
            <input type="password" name="password"><br><br>
            <button name = "submit" class = "btn btn-primary lg" >Login</button>
        </form>
            New User? 
            <a href = "newUser.php">Sign UP</a>
        </div>
    </div>
</body>
</html>