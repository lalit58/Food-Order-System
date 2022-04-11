<?php include('partials-front/menu.php'); ?>
<?php

if(mysqli_connect_error()){
    echo "<script>
    alert('Connot connect to database');
    window.location.href='mycart.php';
    </script>";
    exit();
}


if(isset($_SESSION['order'])) // Checking whether the session is set or not
        { ?>
<!--  echo $_SESSION['order']; //Displaying Session msg -->

<div class="container">
    <div class="">
        <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed
            Successfully.</h1>
    </div>
</div>
<br>

<h4 class="container"> Thank you for Ordering ! The ordering process is now complete.</h4>


<div class="container">

    <h3 class="container"> <strong>Your Order Number:</strong> <span
            style="color: blue;"><?php echo $_SESSION["order_id"]; ?></span> </h3>
</div>

<div class="container">
    <a href="index.php" class="btn btn-primary">Continue shopping</a>
</div>
<?php
// unset($_SESSION['order']); Removing sesson msg
}


?>