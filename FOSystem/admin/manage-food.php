<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1>

    <br><br>

                <!-- Button to add Admin -->
                <a href=" <?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
                <br /><br />
                <?php

                    if(isset($_SESSION['add'])) // Checking whether the session is set or not
                    {
                        echo $_SESSION['add']; //Displaying Session msg
                        unset($_SESSION['add']); //Removing sesson msg
                    }
                    if(isset($_SESSION['remove'])) // Checking whether the session is set or not
                    {
                        echo $_SESSION['remove']; //Displaying Session msg
                        unset($_SESSION['remove']); //Removing sesson msg
                    }
                    if(isset($_SESSION['delete'])) // Checking whether the session is set or not
                    {
                        echo $_SESSION['delete']; //Displaying Session msg
                        unset($_SESSION['delete']); //Removing sesson msg
                    }
                    
                    if(isset($_SESSION['upload'])) // Checking whether the session is set or not
                    {
                        echo $_SESSION['upload']; //Displaying Session msg
                        unset($_SESSION['upload']); //Removing sesson msg
                    }
                    if(isset($_SESSION['update'])) // Checking whether the session is set or not
                    {
                        echo $_SESSION['update']; //Displaying Session msg
                        unset($_SESSION['update']); //Removing sesson msg
                    }


                ?>
                    <br><br>
               <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price(INR)</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>

                    </tr>
                    <?php
                        $sql = "SELECT * FROM tbl_food";

                        $res=mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        $sn=1; //Create seriel number vale

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id= $row['id'];
                                $title=$row['title'];
                                $price =$row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?> </td>
                                    <td>
                                    <?php 
                                            // check img name avaivle
                                            if($image_name!="")
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width="70px" >
                                                <?php
                                            }
                                            else
                                            {
                                                echo "<div class='error'>Image Not added. </div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-food.php ?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-food.php ?id=<?php echo $id; ?> & image_name=<?php  echo $image_name?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='7' class='error'> Food not Added Yet. </td></tr>";
                        }
                

                    ?>
                    

                    
               </table>

    </div>
    
</div>

<?php include('partials/footer.php') ?>