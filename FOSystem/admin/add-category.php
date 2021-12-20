<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        

        <?php 
            if(isset($_SESSION['add'])) // Checking whether the session is set or not
            {
                echo $_SESSION['add']; //Displaying Session msg
                unset($_SESSION['add']); //Removing sesson msg
            }

            if(isset($_SESSION['upload'])) // Checking whether the session is set or not
            {
                echo $_SESSION['upload']; //Displaying Session msg
                unset($_SESSION['upload']); //Removing sesson msg
            }
                
         ?>
         <br><br><br>

        <!-- Add categoery form starts here-->

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Add Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>

                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <!-- Add categoery form Ends here-->

        <?php 
            if(isset($_POST['submit']))
            {
                // Get the value from category from 
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];

                }
                else
                {
                    $featured= "No";
                }
                if(isset($_POST['active']))
                {
                    $active= $_POST['active'];
                }
                else
                {
                    $active= "No";
                }
                // Check image is selected or not
                // print_r($_FILES['image']);

                // die();
                if(isset($_FILES['image']['name']))
                {
                    //To upload we need source and destination path
                    $image_name = $_FILES['image']['name'];

                        if($image_name !="")
                        {

                        // Auto rename image
                        // get the extension of image
                        $ext =end(explode('.',$image_name));
                        // rename the imagw
                        $image_name ="Food_Category_".rand(000, 999).'.'.$ext; 


                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        
                        $upload = move_uploaded_file($source_path, $destination_path);  //upload the image

                        // Check image upload or not
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>FAILED to Upload Image.</div>";
                            header("location:".SITEURL.'admin/add-category.php');

                            die(); //stop process
                        }
                    }

                }
                else
                {
                    $image_name="";  //dont

                }


                // insert category into database
                $sql= "INSERT INTO tbl_category SET
                    title='$title',
                    image_name= '$image_name',
                    featured='$featured',
                    active='$active'
                ";

                // Execute the query & save the database

                $res=mysqli_query($conn,$sql);

                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";    
                    header("location:".SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>FAILED to Add Category.</div>";    
                    header("location:".SITEURL.'admin/manage-category.php');
                }
            }
        ?>

    </div>
</div>



<?php include("partials/footer.php");?>