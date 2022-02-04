<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br/></br/>

        <?php 
            $id=$_GET['id']; //get the ID od selected admin

            $sql="SELECT * FROM tbl_admin WHERE id=$id"; //create sql query to get details

            $res=mysqli_query($conn,$sql); //Execute the query

            // Check query is execute or not
            if($res==true)
            {
                $count = mysqli_num_rows($res); //Check data is availavle or not
                if($count==1) // check admin data available or not
                {
                    // echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name=$row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    header("location:".SITEURL.'admin/manage-admin.php'); //Redirect tro manage admin page
                }

            
            }
        
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>">
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<?php 
    // Check update button clicked or not
    if(isset($_POST['submit']))
    {
        // echo "Button Clicked";
        // Get all the values from form to update
        echo  $id = $_POST['id'];
        echo  $full_name = $_POST['full_name'];
        echo  $username = $_POST['username'];

    //    create sql query to update admin
    $sql= "UPDATE tbl_admin SET
    full_name= '$full_name',
    username= '$username' 
    WHERE id='$id'
    ";

    // Execute the query
    $res = mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else
    {
        $_SESSION['update'] = "<div class='error'>FAILED to Update Admin.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    }


?>





<?php include('partials/footer.php'); ?>