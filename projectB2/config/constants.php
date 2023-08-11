<?php
    // start session 
    session_start();

    //Create constants to non repeating
    define('SITEURL', 'http://localhost/projectB2/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'projectb2');

    //3.Execute Query and save data in database
    $conn =  mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or  die(mysqli_error()); // Database connection 
    $db_select = mysqli_select_db($conn, DB_NAME) or  die(mysqli_error()); //selcting Database 

?>