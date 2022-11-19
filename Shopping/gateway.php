<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
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
    <div align = "left" margin = "20px" > <br><br>
        <form action="success.php" method="post">
            Card Number: <br>
            <input type="text" name="card" > <br><br>
            Expiry Date: <br>
            <input type="text" name="date"> <br><br>
            CVV: <br>
            <input type="text" name="cvv"> <br><br>
            Name: <br>
            <input type="text" name="name"> <br><br>
            <input type="submit" value="Pay Securely" name = "Pay" class = "btn btn-primary lg" ><br><br>
        </form>
    </div>
</body>
</html>