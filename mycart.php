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
    <title>View Cart</title>

    <style>
        
    </style>
</head>

<body>

    <div class="cointainer sticky-top">
        <div class="row">
            <div class="text-center col-lg-12 text-center bg-dark rounded">
                <h1 class="text-warning bg-light">My Cart </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around ">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <table class="table table-bordered ">
                    <thead class="bg-danger text-center  fs-5">
                        <th class="text-center">Serial No.</th>

                        <th class="text-center">Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                        <!-- <th class="text-center">Update</th> -->
                        <!-- <td><button name='update' class='btn btn-warning'>Update </button></td> -->
                        <!-- <th class="text-center">Delete</th> -->
                        <thead>

                        <tbody class="text-center">
                            <?php 
                        // $ptotal = 0;
                        // $total = 0;
                        $i=0;

                            if(isset($_SESSION['cart'])){
                                
                                
                                foreach($_SESSION['cart'] as $key => $value){

                                    // print_r($value);
                                    // $ptotal = $value['foodprice'] * $value['quantity'];
                                    
                                    // $total += $value['foodprice'] * $value['quantity'];
                                    $i = $key+1;

                                    
                                   echo " 
                                   
                                   
                                    
                                   <tr> 
                                        <td>$i</td>
                                        
                                        <td> $value[title]</td>
                                        <td><input type= 'hidden' class='iprice' value = '$value[foodprice]'> &#8377; $value[foodprice]</td>
                                        <td> 
                                        <form action='manage_cart.php' method='POST'>
                                            <input class='text-center iquantity' onchange='this.form.submit();' type='number' name='Mod_Quantity' 
                                            value='$value[quantity]' min='1' max='10'> </td>
                                            <input type= 'hidden' name = 'title' value = '$value[title]'>
                                        </form>
                                        <td class='itotal'> </td>
                                        
                                        <td>
                                        <form action='manage_cart.php' method='POST'>
                                            <button name= 'Remove_Item' class=' btn btn-danger'>Remove  </button></td>
                                            <input type= 'hidden' name = 'title' value = '$value[title]'>
                                            </form>
                                    </tr>
                                   
                                    
                                    
                                    ";
                                    
                                }
                            }
                        ?>
                        </tbody>
                </table>
            </div>
            <div class='col-lg-4'>
                <div class='border bg-light rounded p-4'>
                    <h3>Grand Total: </h3>

                    <h4 class="text-right" name="price" id='gtotal'><span> &#8377;</span> </h4>
                    <!-- <br> -->

                    <?php 
                        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                        {
                    
                    

                    ?>

            <form action='purchase.php' method='POST'>
            <!-- <form action='PaytmAPI/pgRedirect.php' method='POST'> -->
                    
                    <input type="hidden" name="Order_id" class="form-group" 
						value="<?php echo "ORDS" . rand(10000,99999999)?>">
                        <input type="hidden" name="price" id='gettotal' value="" required> </input>
                        <!-- value="<?php echo  "ORDS" . rand(10000,99999999)?>" -->
                    <div class="form-group">
                        <label >Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label >Phone Number</label>
                        <input type="number" name="phone_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Adrress</label>
                        <textarea type="text" name="address" class="form-control"></textarea >
                        
                    </div> 
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cash On Dalivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" value="Online_Pay" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Pay Online
                            </label>
                        </div>
                        <br>
                        <Button class="btn btn-primary btn-block" name="purchase">CheckOut</Button>
                        <input type= 'hidden' name = 'title' value = '$value[title]'> 
                    </form>
                    <?php } ?>
                </div>
            </div>

            <!-- <a href="<?php SITEURL; ?>c1.php" class="btn btn-success" name="checkout" >CheckOut</a> -->
            <!-- <input type="submit" value='CheckOut' href="<?php SITEURL; ?>c1.php" class="btn btn-success" name="checkout" > -->

            <!-- <br>
                    <div class="">
                        <a href="<?php echo SITEURL; ?>" class="btn btn-primary">Continue shopping</a>
                    </div> -->
        </div>
    </div>


    <?php include('partials-front/footer.php'); ?>

<script>

    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal= document.getElementById('gtotal');

    function subTotal()
    {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {

            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
        document.getElementById("gettotal").value = gtotal.innerText;
    }

    subTotal();
</script>


</body>

</html>