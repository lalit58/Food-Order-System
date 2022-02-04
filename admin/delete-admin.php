<?php 
    include('../config/constants.php'); // include constants.php  here

    // 1. get the ID of admin to be deleted

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id"; // create SQL query to delete admin

    $res = mysqli_query($conn,$sql); // execute the query

    if($res==true)
    {
        // echo "Admin Delete";
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Sucessfully</div>"; // create session variable to display msg
        header('location:'.SITEURL.'admin/manage-admin.php');     // Redirect to manage Admin page 
    }
    else{
        // echo "FAILED to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Deleted Admin. Try Again </div>";
        header('location:'.SITEURL.'admin/manage-admin.php'); //Redirct manage admin page with msg
    }
    


?>