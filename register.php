
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
        <h1 class="text-center"><b>Create New Account</b></h1>
    
        <!-- Login form starts here -->
        <form action="" method="POST" class="">
            <!-- <div class="imgcontainer">
                <img src="../images/avatar.png" alt="Avatar" class="avatar">
            </div> -->

         <?php

         if(isset($_SESSION['regis']))
         {
             echo $_SESSION['regis']; //Displaying Session msg
             unset($_SESSION['regis']); //Removing sesson msg
          }
          ?>

        <!--   // if(isset($_SESSION['no-login-message']))
      //   {
           //  echo $_SESSION['no-login-message']; //Displaying Session msg
           //  unset($_SESSION['no-login-message']); //Removing sesson msg
        //  }

        ?>-->

            <div class="login-container">
                <label for="username"><b>Name:</b></label>
                <input type="text" name="name" placeholder="Enter Name" class="login-lebel" required><br><br>
                <label for="username"><b>Email:</b></label>
                <input type="text" name="email" placeholder="Enter Email" class="login-lebel" required><br><br>
                <label for="password"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Enter Password" class="login-lebel" required><br><br>
                <label for="username"><b>Mobile:</b></label>
                <input type="text" name="mobile" placeholder="Enter Mobile" class="login-lebel" required><br><br>
                <input type="submit" name="submit" value="Register" class="btn"><br><br>
            </div>
        </form>

        <!-- Login form Ends here -->
        
        <div class="">
            <p class="text-center login-footer"> <a href="login.php">Login Here</a></p>
        </div>

    </div>
    
</body>
</html>
<?php include('partials-front/footer.php'); ?>

<?php
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        
        $emailquery = "select * from tbl_register where email='$email' ";
        $query = mysqli_query($conn, $emailquery);
        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            $_SESSION['regis'] = "<div class='error text-center'>Email already exists.</div>";
            // $_SESSION['user'] = $username; // to check user login or not

            header('location:'.SITEURL.'register.php');
            // echo "email already exists";
        }else{
            $insertquery = "insert into tbl_register( name, email, password, mobile) values('$name', '$email','$pass', '$mobile' )";

            $iquery = mysqli_query($conn, $insertquery);

            if($iquery){
                ?>
                <script>
                    alert("Inserted Sucessfully");
                </script>
                
                <?php
            }
        }
        }
    

?>