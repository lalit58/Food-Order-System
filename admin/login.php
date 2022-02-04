<?php include('../config/constants.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="login-body">

    <div class="login">
        <h1 class="text-center"><b>Administrator Login</b></h1>
    
        <!-- Login form starts here -->
        <form action="" method="POST" class="">
            <div class="imgcontainer">
                <img src="../images/avatar.png" alt="Avatar" class="avatar">
            </div>

            <?php 
         if(isset($_SESSION['login']))
         {
             echo $_SESSION['login']; //Displaying Session msg
             unset($_SESSION['login']); //Removing sesson msg
         }

         if(isset($_SESSION['no-login-message']))
         {
             echo $_SESSION['no-login-message']; //Displaying Session msg
             unset($_SESSION['no-login-message']); //Removing sesson msg
         }

        ?>

            <div class="login-container">
                <label for="username"><b>Username:</b></label>
                <input type="text" name="username" placeholder="Enter Username" class="login-lebel"><br><br>
                <label for="password"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Enter Password" class="login-lebel"><br><br>
                <input type="submit" name="submit" value="Login" class="btn"><br><br>
            </div>
        </form>

        <!-- Login form Ends here -->

        <div class="">
            <p class="text-center login-footer"> Created By - <a href="">Lalit Soren</a></p>
        </div>

    </div>
    
</body>
</html>
<?php 
    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);


        // SQL to check to user and password is exit or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res= mysqli_query($conn,$sql); // Executeb the query

        $count= mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success text-center'>Login Sucessfull.</div>";
            $_SESSION['user'] = $username; // to check user login or not

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username And Password Did Not Match.</div>";
            header('location:'.SITEURL.'admin/login.php');

        }



    }


?>