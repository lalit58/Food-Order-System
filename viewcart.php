<?php include('partials-front/menu.php');?>

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
    <title>View Cart</title>
</head>

<body>

 <div class="cointainer sticky-top">
        <div class="row">
            <div class="text-center col-lg-12 text-center bg-dark rounded">
                <h1 class="text-warning ">My Cart </h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center">
                    <thead class="bg-danger  fs-5">
                        <th>Serial No.</th>
                        
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Update</th>
                        <th>Delete</th>
                    <thead>

                    <tbody>
                        <?php 
                        $ptotal = 0;
                        $total = 0;
                        $i=0;

                            if(isset($_SESSION['cart'])){
                                
                                
                                foreach($_SESSION['cart'] as $key => $value){

                                    
                                    $ptotal = $value['productPrice'] * $value['productQuantity'];
                                    $total += $value['productPrice'] * $value['productQuantity'];
                                    $i = $key+1;

                                    
                                   echo " 
                                   
                                   <form action='cart.php' method = 'POST' >
                                    
                                   <tr> 
                                        <td>$i</td>
                                        
                                        <td><input type='hidden' name='title' value='$value[productName]'> $value[productName]</td>
                                        <td><input type='hidden' name='food-price' value='$value[productPrice]'> &#8377; $value[productPrice]</td>
                                        <td> <input type='' name='quantity' value='$value[productQuantity]'> </td>
                                        <td> &#8377; $ptotal</td>
                                        <td><button name='update' class='btn btn-warning'>Update </button></td>
                                        <td><button name= 'remove' class=' btn btn-danger'>Delete  </button></td>
                                        <td><input type= 'hidden' name = 'item' value = '$value[productName]'> </td>
                                    </tr>
                                   
                                    
                                    
                                    ";
                                    
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class='col-lg-3'>
                <h3>TOTAL </h3>
                <h1 class=""> &#8377;<?php echo number_format($total,2) ?></h1>

            </div>
                            
                            <a href="<?php SITEURL; ?>c1.php" class="btn btn-success" name="checkout" >CheckOut</a>
                    <!-- <input type="submit" value='CheckOut' href="<?php SITEURL; ?>c1.php" class="btn btn-success" name="checkout" > -->
                
                <br>
                    <div class="">
                        <a href="<?php echo SITEURL; ?>" class="btn btn-primary">Continue shopping</a>
                    </div>
        </div>
    </div>
    </form>

    <?php include('partials-front/footer.php'); ?>
</body>

</html>