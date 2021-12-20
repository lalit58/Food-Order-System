<?php
    include('../config/constants.php'); // include constants.php  here

    // 1. get the ID of category to be deleted

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name!="")
        {
            $path = "../images/category/".$image_name;
            $remove = unlink($path); //image remove

            if($remove==false) //if failed to remove img
            {
                $_SESSION['remove']= "<div class='error'>FAILED to Remove Category Image</div>";
                header('location:'.SITEURL.'admin/manage-category.php');     // Redirect to manage Admin page
                die();
            }
        }
        $sql = "DELETE FROM  tbl_category WHERE id=$id"; // create SQL query to delete admin
        $res = mysqli_query($conn,$sql); // execute the query

        if($res==true)
        {
            // echo "Admin Delete";
            $_SESSION['delete'] = "<div class='success'>Category Deleted Sucessfully</div>"; // create session variable to display msg
            header('location:'.SITEURL.'admin/manage-category.php');     // Redirect to manage Admin page 
        }
        else{
            // echo "FAILED to Delete Admin";
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category. Try Again </div>";
            header('location:'.SITEURL.'admin/manage-category.php'); //Redirct manage admin page with msg
        }

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php'); //Redirct manage admin page with msg 
    }
 
 ?>