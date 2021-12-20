<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>

    <br><br>

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
            if(isset($_SESSION['no-category-found'])) // Checking whether the session is set or not
            {
                echo $_SESSION['no-category-found']; //Displaying Session msg
                unset($_SESSION['no-category-found']); //Removing sesson msg
            }
            if(isset($_SESSION['update'])) // Checking whether the session is set or not
            {
                echo $_SESSION['update']; //Displaying Session msg
                unset($_SESSION['update']); //Removing sesson msg
            }
            if(isset($_SESSION['upload'])) // Checking whether the session is set or not
            {
                echo $_SESSION['upload']; //Displaying Session msg
                unset($_SESSION['upload']); //Removing sesson msg
            }
            if(isset($_SESSION['failed-remove'])) // Checking whether the session is set or not
            {
                echo $_SESSION['failed-remove']; //Displaying Session msg
                unset($_SESSION['failed-remove']); //Removing sesson msg
            }


            
                
         ?>
         <br><br<br><br><br>

                <!-- Button to add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
                <br /><br />

               <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actins</th>
                    </tr>
                    <?php 
                        $sql= "SELECT * FROM tbl_category"; //Get all catagory from db
                        $res =mysqli_query($conn,$sql); //execute
                        $sn=1;    // create table seriel no variavle
                        $count = mysqli_num_rows($res); //count rows

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id =$row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php 
                                            // check img name avaivle
                                            if($image_name!="")
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="70px" >
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
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php ?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php ?id=<?php echo $id; ?> & image_name=<?php  echo $image_name?>"  class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>
                                <?php

                            }

                        }
                        else
                        {
                            ?>

                            <tr>           <!--  Don't have data ,display msg inside table  -->
                                <td colspan="6"><div class="error">No-Category</div></td>
                            </tr>

                            <?php
                        }
                    
                    
                    ?>

                    

                    
               </table>

    </div>
    
</div>

<?php include('partials/footer.php') ?>