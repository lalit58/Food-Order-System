<?php include('partials-front/menu.php'); ?>








    <?php
// session_destroy();


//  $id = $_POST['id'];
 
//  $image_name = $_POST['image_name'];
 $product_name = $_POST['title'];
 $product_price =$_POST['food-price'];
 $product_quantity = $_POST['quantity'];

    if(isset($_POST['add_to_cart'])){

   

        // $check_product = array_column($_SESSION['cart'], 'productName');
        // if(in_array($product_name, $check_product)){
        // echo " 
        //     <script> alert('Product already added');
        //     window.location.href = 'index.php';
        //     </script>
        // ";

        // }else{

        $_SESSION['cart'][] = array('id' => $id, 'productName' => $product_name, 
        'productPrice'=> $product_price, 'productQuantity' => $product_quantity);
        // print_r($_SESSION['cart']);
        header("location:viewcart.php");
            // }

    }
    


    // remove item

    if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['productName'] === $_POST['item']){
                unset($_SESSION['cart'] [$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location:viewcart.php');
            }
        }
    }

    // update product
    if(isset($_POST['update'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['productName'] === $_POST['item']){
                $_SESSION['cart'][$key] = array( 'productName' => $product_name, 
                'productPrice'=> $product_price, 'productQuantity' => $product_quantity);
                // print_r($_SESSION['cart']);
                header("location:viewcart.php");
                }
                
            }
        }
    

?>

   