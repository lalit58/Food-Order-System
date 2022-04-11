<?php include('partials-front/menu.php'); ?>
<?php

//  $_POST['title'];
//     $_POST['food-price'];
//   $_POST['quantity'];
// session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'title');

            if(in_array($_POST['title'],$myitems))
            {
                echo"<script>
                alert('Item Alreday Added');
                window.location.href='index.php';
                </script>";

            }
            else
            {
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('title' => $_POST['title'], 
                'foodprice'=> $_POST['foodprice'], 'quantity' => $_POST['quantity']);
                echo"<script>
                alert('Item  Added');
                window.location.href='index.php';
                </script>";
            }
        }
        else
        {
        $_SESSION['cart'][0]=array('title' => $_POST['title'], 
        'foodprice'=> $_POST['foodprice'], 'quantity' => $_POST['quantity']);
            echo"<script>
            alert('Item  Added');
            window.location.href='index.php';
            </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            // print_r($key);
            if($value['title'] == $_POST['title'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] =array_values($_SESSION['cart']);
                echo "
                <script>
                alert('Item Removed');
                window.location.href='mycart.php';
                </script>
                ";
            }
                
            
        }
    }
    if(isset($_POST['Mod_Quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            // print_r($key);
            if($value['title'] == $_POST['title'])
            {
                $_SESSION['cart'][$key]['quantity'] =$_POST['Mod_Quantity'];
                
            //    print_r($_SESSION['cart']);
               
                echo "
                <script>
                window.location.href='mycart.php';
                </script>
                ";
            }
                
            
        }
    }
}
?>