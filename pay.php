<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    heloo
</body>
</html> -->


<?php include('partials-front/menu.php'); ?>
<?php

if(mysqli_connect_error()){
    echo "<script>
    alert('Connot connect to database');
    window.location.href='mycart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{   
    
 if(isset($_POST['purchase']))
    {
        if($_SESSION['username']) {
            $sq="SELECT * FROM `tbl_register` WHERE email='{$_POST['email']}'";
            $q=mysqli_query($conn,$sq);
          // $r=mysqli_num_rows($q);die();
            if(mysqli_num_rows($q)<1){
                echo "<script>
                alert('registered email only');
            window.location.href='mycart.php';
                </script>";
            }
            else{
            $query1 ="INSERT INTO `order_manager`( `Order_id`,`Full_Name`, `Phone_No`, `email`, `Address`, `Pay_Mode`) 
            VALUES ('$_POST[Order_id]','$_POST[full_name]','$_POST[phone_no]','$_POST[email]', '$_POST[address]','$_POST[pay_mode]')";
            if(mysqli_query($conn,$query1))
            {
                $Order_Id = mysqli_insert_id($conn);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $title =$values['title'];
                    $foodprice =$values['foodprice'];
                    $quantity = $values['quantity'];
                    // mysqli_stmt_execute($stmt);
                }
               $query2="INSERT INTO `user_orders`(`Order_Id`, `title`, `foodprice`, `quantity`) VALUES ('$_POST[Order_id]' , '$title' ,$foodprice,$quantity)";
                $stmt=mysqli_query($conn,$query2);
                if($stmt)
                {
                    $_SESSION['order'] = "<div class='success text-center'>Food Order Sucessful.</div>";
                     $_SESSION["order_id"]=$_POST['Order_id']; 
                    // header("location:pay.php");die();
                    $_SESSION["price"]=$_POST['price'];
                    // header("location:".SITEURL);
                    if($_POST['pay_mode']=="Online_Pay"){
                        header("location:PaytmAPI/pgRedirect.php");
                    }else{
                    header("location:order-success.php");
                    unset($_SESSION['cart']);}
                }
                else
                {
                    echo "<script>
                    alert('SQL Query Prepare Error');
                    window.location.href='mycart.php';
                    </script>";

                }
            }
        
            else
            {
                echo "<script>
                alert('SQL Error');
            window.location.href='mycart.php';
                </script>";
            }
        }
        } else {
            header('location: login.php');
        }
        
    }

}

?> 