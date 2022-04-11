<?php include('partials-front/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <?php
 if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
 {
if($_SESSION['username']) { ?>
    

            <br>
            <div class="container">

                <a href="mycart.php"><button class="btn btn-primary"><span
                            class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
                <a href="PaytmAPI/pgRedirect.php"><span class="btn success">Pay Online</span></a>
                <a href="purchase.php"><button class="btn warning"> Cash On Delivery</button></a>
            </div>

            <?php }
else
{
    header('location: login.php');
}
 }
?>

</body>

</html>