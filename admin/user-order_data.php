<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>User Data</h1>

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
                $query="SELECT * FROM `order_manager` ";
                $user_result=mysqli_query($conn,$query);
                while($user_fetch=mysqli_fetch_assoc($user_result)){
                    echo "
                    <tr>
                        <td>$user_fetch[Order_id]</td>
                        <td>$user_fetch[Full_Name]</td>
                        <td>$user_fetch[Phone_No]</td>
                        <td>$user_fetch[email]</td>
                        <td>$user_fetch[Address]</td>
                        <td>$user_fetch[date_time]</td>
                        <td>$user_fetch[Pay_Mode]</td>
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
                            $order_query="SELECT * FROM `user_orders` WHERE `Order_id`='$user_fetch[Order_id]'";
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
                        </table
                        </td>
                    </tr>
                    ";
                }

                ?>


            </tbody>

        </table>


    </div>
</div>