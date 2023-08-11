<?php
    //include constant.php file here
    include('../config/constants.php');

    //1. get the id of admin to be deleted
     $id = $_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query 
    $res = mysqli_query($conn, $sql);

    //check whether the query  is executed successfully or not
    if($res==true)
    {
        //query executed successfully and admin deleted
        // echo"admin deleted";
        $_SESSION['delete'] = "<div class='success'> Admin Delete Successfully. </div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        // echo "failed to delete admin";
        $_SESSION['delete'] = "<div class='error'> Failed to Delete Admin, Try Again Later.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. redirect to manage admin page with message(success/error)

?>