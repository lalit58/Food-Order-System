<?php include('partials-front/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body class="login-body ">

    <div class="login ">
        <h1 class="text-center"><b>Login Here</b></h1>
    
        <!-- Login form starts here -->
        <form action="" method="POST" class="">
            <!-- <div class="imgcontainer">
                <img src="../images/avatar.png" alt="Avatar" class="avatar">
            </div> -->

            <?php 
        //  if(isset($_SESSION['login']))
        //  {
        //      echo $_SESSION['login']; //Displaying Session msg
        //      unset($_SESSION['login']); //Removing sesson msg
        //  }

         if(isset($_SESSION['usernotlogin']))
         {
             echo $_SESSION['usernotlogin']; //Displaying Session msg
             unset($_SESSION['usernotlogin']); //Removing sesson msg
         }

        ?>

            <div class="login-container">
                <label for="username"><b>Email:</b></label>
                <input type="text" name="email" placeholder="Email" class="login-lebel"><br><br>
                <label for="password"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Password" class="login-lebel"><br><br>
                
                <input type="submit" name="submit" value="Login" class="btn"><br><br>
            </div>
        </form>

        <!-- Login form Ends here -->
        
        <div class="">
            <p class="text-center login-footer"> <a href="register.php">Create New Account</a></p>
        </div>

    </div>
    
</body>
</html>
<?php include('partials-front/footer.php'); ?> 

<?php 
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        
        $password = $_POST['password'];


        // SQL to check to user and password is exit or not
        $sql = "select * from tbl_register where email='$email' ";

        $res= mysqli_query($conn, $sql); // Executeb the query

        $count= mysqli_num_rows($res);
        
            if($count)
            {
                $email_pass =mysqli_fetch_assoc($res);

                 $db_pass = $email_pass['password'];

                 $_SESSION['username'] = $email_pass['name'];
                 $_SESSION['userid']=$email_pass['userid'];
                 $_SESSION['mail']=$email_pass['email'];

                 $pass_decode = password_verify($password, $db_pass );
            
            if($pass_decode)
            {
                $_SESSION['userlogin'] = "<div class='success text-center'>Login Sucessfull.</div>";
                // $_SESSION['email'] = $email; // to check user login or not

                header('location:'.SITEURL);
            }
            else
            {
                $_SESSION['usernotlogin'] = "<div class='error text-center'> Password Incorect.</div>";
                header('location:'.SITEURL.'login.php');

            }
        }else{
            $_SESSION['usernotlogin'] = "<div class='error text-center'>Email Incorect.</div>";
            header('location:'.SITEURL.'login.php');
        }

    }


?>