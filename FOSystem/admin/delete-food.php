<?php
include('../config/constants.php'); // include constants.php  here

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if($image_name!="")
        {
            $path = "../images/food/".$image_name;
            $remove = unlink($path); //image remove

            if($remove==false) //if failed to remove img
            {
                $_SESSION['remove']= "<div class='error'>FAILED to Remove Food Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');     // Redirect to manage Admin page
                die();
            }
        }
        $sql = "DELETE FROM  tbl_food WHERE id=$id"; // create SQL query to delete admin
        $res = mysqli_query($conn,$sql); // execute the query

        if($res==true)
        {
            // echo "Admin Delete";
            $_SESSION['delete'] = "<div class='success'>Food Deleted Sucessfully</div>"; // create session variable to display msg
            header('location:'.SITEURL.'admin/manage-food.php');     // Redirect to manage Admin page 
        }
        else{
            // echo "FAILED to Delete Admin";
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food. Try Again </div>";
            header('location:'.SITEURL.'admin/manage-food.php'); //Redirct manage admin page with msg
        }


}
else
{
    header('location:'.SITEURL.'admin/manage-food.php'); //Redirct manage admin page with msg
}







?>