<?php include('partials/menu.php')?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>

        <?php 
            if(isset($_SESSION['add'])) // Checking whether the session is set or not
            {
                echo $_SESSION['add']; //Displaying Session msg
                unset($_SESSION['add']); //Removing sesson msg
            }
                
         ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php')?>

<?php 
    // Process the value from form and save it in Database
    // Check wheather the submit button is clicked or not
    
    if(isset($_POST['submit']))
    {
        //Button clicked
        // echo "Button clicked";

        // 1.Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encripted with md5

        //2. SQL Query to save into database
        $sql = "INSERT INTo tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
       
        //3. Executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // 4. Check wheather (Query is executed)data is inserted or not and display appro. msg
        if($res==TRUE)
        {
            // echo "Data inserted";
            $_SESSION['add'] = "<div class='success'>Admin added Successfully.</div>";
            //Redirect page manage admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else{
            // echo "Data inserted FAILED";
            $_SESSION['add'] = "<div class='error'>FAILED to add Admin.</div>";
            //Redirect page add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }


    }
    

?>