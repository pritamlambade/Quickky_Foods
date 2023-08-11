<?php
    include('../config/constants.php');
    //check wether the id and image_value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // echo "get value ";
        $id = $_GET['id'];
        $image_name = $_GET['image_name']; 

        //remove the physical image file if availabel
        if($image_name != "")
        {
            //image is available . so remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if faild to remove image then add an errormessage and stop the procees
            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to Remove category image</div>";

                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }

        //delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed To Delete Category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>