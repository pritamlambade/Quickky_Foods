<?php
    if(!isset($_SESSION['user']))// if user session is not set
    {
        // user is not logged in
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please Login To Access Admin Panel.</div>";

        header('location:'.SITEURL.'admin/login.php');
    }
?>