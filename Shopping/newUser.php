<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>
    <div align = "center" >
    <div class="col-xs-2">
    <form action="regUser.php" method="post">
        Name: <br><input type="text" name="name"> <br><br>
        Customer ID: <br><input type="text" name="cust_id" ><br><br>
        DOB (DD-MM-YYYY): <br><input type="date" name="dob"><br><br>
        Mobile No.: <br><input type="text" name="mnob"><br><br>
        email: <br><input type="text" name="email"><br><br>
        Password: <br><input type="text" name="password"><br><br>
        <input type="submit" value="Register" class="btn btn-primary lg" ><br>
    </form>
    </div>
    </div>
</body>
</html>