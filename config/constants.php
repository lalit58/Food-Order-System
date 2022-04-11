<?php
ob_start();
     
     //Start sesson
     session_start();


    // Create constants to store non repeating values

    define('SITEURL', 'http://localhost/FOSystem/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-oder');
    

     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(); // Database connection
     $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // selecting databse

?>