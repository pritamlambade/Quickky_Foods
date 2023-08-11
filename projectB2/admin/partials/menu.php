
<?php 
    include('../config/constants.php');  
    include('login-check.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickyy Foods - Home page</title>
     <!-- Link our CSS file -->
     <link rel="stylesheet" href="admin1.css">
        <style>

            table {

            font-family: arial, sans-serif;

            border-collapse: collapse;

            width: 100%;

            }


            td, th {

            border: 1px solid black;

            text-align: left;

            padding: 8px;

            }


            tr:nth-child(even) {

            background-color: #a4b0be;

            }

        </style>
</head>
<body>
    
    <!--Menu section starts--> 
    <div class="menu text-center" style = "background-color: black;" >
        <div class="wrapper">
        <img src="../images/logo2.jpg" alt="Restaurant Logo" class="admin-logo1" width = "80px" style="margin : auto; border-radius: 40px;">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin </a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
       
    </div>
    <!--Menu section ends--> 