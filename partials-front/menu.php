<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order System</title>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--LINK FOR CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>

    <?php
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    ?>


    <!--Navbar section starts here-->
    <section class="navbar" id="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title=" Logo">
                    <img src="images/logo.png" alt="resturant Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <i class="fas fa-home"></i>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>

                    <li>
                        <i class="fas fa-shopping-cart"></i>

                        <a href="<?php echo SITEURL; ?>mycart.php">Cart(<?php echo $count ?>)</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) { ?>
                    <li><i class="fas fa-user-shield"></i>
                        <select name="user-menu-dropdown" id="user-menu-dropdown" onchange="location = this.value;">
                            <option class="user-menu-dropdown-list" value="User"> 
                                <?php echo "Hello, " . $_SESSION['username']; ?>
                            </option>
                            <option class="user-menu-dropdown-list" value="Order_History.php">
                                <a href="Order_History.php">Order History </a>
                            </option>
                            <option class="user-menu-dropdown-list" value="logout.php">
                                <a href="logout.php">Logout</a>
                            </option>
                        </select>
                    </li>

                    <?php
                            } else {
                                ?>
                        <li>
                            <i class="fas fa-sign-out-alt"></i>
                            <a href="<?php echo SITEURL; ?>login.php">Login</a>
                        <?php } ?>
                        </li>



                    <?php
                    if (isset($_SESSION['username'])) { ?>
                        <!-- <li style="font-size: 20px; border:none;" classs="logout-nav">

                            <i class="fas fa-user-shield"></i>
                            <?php echo "Hello, " . $_SESSION['username']; ?>

                        </li>
                        <li>
                            <a href="Order_History.php">Order History </a>
                        </li>

                        <li>
                             <i class="fas fa-sign-out-alt"></i> -->

                            <!-- <a href="logout.php">Logout</a>
                        </li>
                        </li>
                        </li> <?php
                            // } else {
                                ?>
                        <li>
                            <i class="fas fa-sign-out-alt"></i>
                            <a href="<?php echo SITEURL; ?>login.php">Login</a>
                        <?php } ?>
                        </li> 
                        <!-- > -->
                        <!-- <img src="images/avatar.png" alt="profile_img"> -->

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>

    </section>
    <div class=" down-nav text-center ">
        <span>
            <a href="<?php echo SITEURL; ?>categories.php">CATEGORIES</a>
        </span>
        <span>
            <a href="<?php echo SITEURL; ?>foods.php">FOODS MENU</a>
        </span>
    </div>