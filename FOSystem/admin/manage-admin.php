<?php include('partials/menu.php') ?>

    <!-- Main section starts here -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session msg
                        unset($_SESSION['add']); //Removing sesson msg
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //Displaying Session msg
                        unset($_SESSION['delete']); //Removing sesson msg
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //Displaying Session msg
                        unset($_SESSION['update']); //Removing sesson msg
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; //Displaying Session msg
                        unset($_SESSION['user-not-found']); //Removing sesson msg
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match']; //Displaying Session msg
                        unset($_SESSION['pwd-not-match']); //Removing sesson msg
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd']; //Displaying Session msg
                        unset($_SESSION['change-pwd']); //Removing sesson msg
                    }
                
                ?>
                <br/><br/>
                <!-- Button to add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br /><br />

               <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php 
                        //Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        // Execute the query
                        $res = mysqli_query($conn, $sql);
                        
                        //Check whether the query is executed or not
                        if($res==TRUE)
                        {
                            //Count rows to checks whether we have data in db or not
                            $count = mysqli_num_rows($res); //Funtion to get all the rows from db

                            $sn=1; //create a variable assign the value

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the value in our table
                                    ?>
                                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $full_name ?></td>
                                        <td><?php echo $username ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password </a>
                                            <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                // We do't have data to display
                            }
                        } 
                    
                    
                    ?>

               </table>
            </div>
        </div>
    <!-- Main section Ends here -->

    <?php include('partials/footer.php') ?>