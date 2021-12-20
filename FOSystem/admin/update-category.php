<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
        
        if(isset($_GET['id']))
        {   
            $id = $_GET['id'];

            $sql="SELECT * FROM tbl_category WHERE id=$id"; //create sql query to get details

            $res=mysqli_query($conn,$sql); //Execute the query

            $count = mysqli_num_rows($res); //Check data is availavle or not

            if($count==1) // check admin data available or not
                {
                    $row=mysqli_fetch_assoc($res);
                    $title =$row['title'];
                    $current_image = $row['image_name'];
                    $featured =$row['featured'];
                    $active =$row['active'];
                }
                else
                {
                    $_SESSION['no-category-found']= "<div class='error'>Category Not Found. </div>";
                    header('location:'.SITEURL.'admin/manage-category.php'); //Redirct manage admin page with msg
                }
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-category.php'); //Redirct manage admin page with msg
        }
        
        
        ?>

        <!-- Update category start here -->
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php  echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                            if($current_image !="")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
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
                        <input type="file" name="image" >
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
                    <td colspan="">
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <!-- Update category Ends here -->

        <?php 
            if(isset($_POST['submit']))
            {
                $id =$_POST['id'];
                $title=$_POST['title'];
                $current_image=$_POST['current_image'];
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
                        $image_name ="Food_Category_".rand(000, 999).'.'.$ext; 

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        
                        $upload = move_uploaded_file($source_path, $destination_path);  //upload the image

                        // Check image upload or not
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>FAILED to Upload Image.</div>";
                            header("location:".SITEURL.'admin/manage-category.php');

                            die(); //stop process
                        }
                        // B. Remove the current image
                        if($current_image!="")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path); //image remove

                            //check img remove or not
                            if($remove==false) //if failed to remove img
                            {
                                $_SESSION['failed-remove']= "<div class='error'>FAILED to Remove Current Image</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');     // Redirect to manage Admin page
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
                

                //update db
                $sql2="UPDATE tbl_category SET 
                title = '$title',
                image_name = '$image_name',
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";

                $res2=mysqli_query($conn, $sql2); // Execute sql query 

                if($res2==true) //final check to update category
                {
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>FAILED to Update Category.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                
            }
        
        
        ?>
    </div>
</div>



<?php include("partials/footer.php");?> 