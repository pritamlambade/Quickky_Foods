<?php  
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        // echo "Process To Delete";
        //1. get id and image nAME
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2.REMOVE THE IMAGE IF AVELABLE
        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed To Remove Image File.</div>";

                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
        }

        //3.delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);
        //4.redirect to manage food with sesion message

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed To Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        
    }
    else
    {
        // echo "redirect";
        $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>  