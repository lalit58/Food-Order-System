<?php include('partials-front/menu.php'); ?>


<style>
    .text-center{
    text-align: center;
}
.main-content{
    background-color: #f1f2f6;
    padding: 3%;
}
    .wrapper{
    /* border: 1px solid black; */
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}
.tbl-full{
    width: 100%;
}
</style>
<!-- Order page -->
<div class="main-content">
    <div class="wrapper">
        <h1>Order History</h1>

        <br /></br />

        <table class="tbl-full text-center">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date & Time</th>
                    <th>Pay Mode</th>
                    <th>Orders</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $sq="SELECT * FROM `order_manager` WHERE email='{$_SESSION['mail']}'";
                $q=mysqli_query($conn,$sq);
                while($order_fetch=mysqli_fetch_assoc($q)){
                    echo "
                    <tr>
                        <td>$order_fetch[Order_id]</td>
                        <td>$order_fetch[Full_Name]</td>
                        <td>$order_fetch[Phone_No]</td>
                        <td>$order_fetch[email]</td>
                        <td>$order_fetch[Address]</td>
                        <td>$order_fetch[date_time]</td>
                        <td>$order_fetch[Pay_Mode]</td>
                        <td> 
                        <table class='tbl-full text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Food Name</th>
                                    <th class='col'>Price</th>
                                    <th class='col'>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                            $order_query="SELECT * FROM `user_orders` WHERE `Order_id`='$order_fetch[Order_id]'";
                            $order_result=mysqli_query($conn,$order_query);
                            while($order_fetch=mysqli_fetch_assoc($order_result)){
                                echo "
                                <tr>
                                    <td>$order_fetch[title]</td>
                                    <td>$order_fetch[foodprice]</td>
                                    <td>$order_fetch[quantity]</td>
                                </tr 
                             
                                "; 

                            }
                            echo "
                            </tbody>
                        </table>
                        </td>
                        </tr>
                        ";
                }
            
            ?>

            </tbody>
         </table>



    </div>
</div>

<?php
    
    // $sq="SELECT * FROM `order_manager` WHERE email='{$_SESSION['mail']}'";
    // $q=mysqli_query($conn,$sq);
    // $row=mysqli_fetch_assoc($q);
    // print_r($row); 
    // $order_query="SELECT * FROM `user_orders` WHERE `Order_id`='$row[Order_id]'";
    //                         $order_result=mysqli_query($conn,$order_query);
    //                         $order_fetch=mysqli_fetch_assoc($order_result);
    //                         print_r($order_fetch);
                            
                            // {
                            // echo "
                            // <tr>
                            //     <td>$order_fetch[title]</td>
                            //     <td>$order_fetch[foodprice]</td>
                            //     <td>$order_fetch[quantity]</td>
                            // </tr 
                         
                            // "; 
?>