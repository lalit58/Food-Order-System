<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Food</h1>

        <br><br>

        <?php

            if(isset($_GET['id']))
            {
                $id= $_GET['id'];

                $sql2="SELECT * FROM tbl_food WHERE id=$id";

                $res2=mysqli_query($conn ,$sql2);

                $count =mysqli_num_rows($res2);

                if($count==1)
                {
                    $row2=mysqli_fetch_assoc($res2);
                    
                    $title=$row2['title'];
                    $description=$row2['description'];
                    $price=$row2['price'];
                    $current_image=$row2['image_name'];
                    $current_category=$row2['category_id'];
                    $featured =$row2['featured'];
                    $active =$row2['active'];  
                }
                else
                {
                    $_SESSION['no-food-found']= "<div class='error'>Food Not Found. </div>";
                    header('location:'.SITEURL.'admin/manage-food.php'); //Redirct manage admin page with msg
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-food.php'); //Redirct manage admin page with msg
            }


        ?>

    
         <!-- Update Food form starts here -->

        <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php  echo $title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" rows="5" cols="50"> <?php  echo $description; ?> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>                     
                            <input type="number" name="price" value="<?php  echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image:</td>
                        <td>
                            <?php
                                if($current_image !="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="100px">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='error'>Image not available</div>";
                                }
                            
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>New Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">
                                <!-- display category from db -->
                            <?php 
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                $res= mysqli_query($conn, $sql);

                                $count =mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $category_title=$row['title'];
                                        $category_id=$row['id'];
                                        
                                        ?>
                                           <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>;
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        echo "<option value='0'>Category Not Avialable.</option>";     
                                    <?php                               
                                }

                                // Display on drop down
                            ?>
                            </select>
                        </td>
                    </tr>

                    
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>

                    <tr>
                        <td colspan="">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>
            <!-- Add Food form ends here -->

            <?php
                if(isset($_POST['submit']))
                {
                    $id =$_POST['id'];
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $current_image=$_POST['current_image'];
                    $category=$_POST['category'];
                    $featured=$_POST['featured'];
                    $active=$_POST['active'];
            

                    //updating new image if selected
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name !="")
                    {
                        // A.Upload image
                        // Auto rename image
                        // get the extension of image
                        $ext =end(explode('.',$image_name));
                        // rename the image
                        $image_name ="Food-Food-".rand(0000, 9999).'.'.$ext; 

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/food/".$image_name;
                        
                        $upload = move_uploaded_file($source_path, $destination_path);  //upload the image

                        // Check image upload or not
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>FAILED to Upload Image.</div>";
                            header("location:".SITEURL.'admin/manage-food.php');

                            die(); //stop process
                        }
                        // B. Remove the current image
                        if($current_image!="")
                        {
                            $remove_path = "../images/food/".$current_image;
                            $remove = unlink($remove_path); //image remove

                            //check img remove or not
                            if($remove==false) //if failed to remove img
                            {
                                $_SESSION['failed-remove']= "<div class='error'>FAILED to Remove Current Image</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');     // Redirect to manage Admin page
                                die();
                            }
                        }
                        
                    }

                    else
                    {
                        $image_name =$current_image;
                    }
                    
                }
                else
                {
                    $image_name =$current_image;
                }

                // SQl query

                $sql3="UPDATE tbl_food SET
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name= '$image_name',
                    category_id ='$category',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id
                ";

                $res3=mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Food Update Successfully.</div>";    
                    header("location:".SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>FAILED to Update Food.</div>";    
                    header("location:".SITEURL.'admin/manage-food.php');
                }
            }
            
        ?>

    </div>
</div>


<?php include("partials/footer.php");?>