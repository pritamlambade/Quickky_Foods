<?php  include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food. ">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description"  cols="30" rows="5" placeholder="Description of the Food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >

                            <?php
                                //to display category from database
                                //1. create sql query to get all active category from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);
                                //count rows to check whether we have category or not
                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>

                                        <option value="1"><?php  echo $id; ?> <?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found.</option>
                                    <?php
                                }

                                //2.display on dropopdown 
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            //submit button clicked or not
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                //1. get the data from form 
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                
                //radio button clicked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; //seting default value
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; //seting default value
                }

                //2. upload the image if selected
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    //image is selected or not and upload if only selected
                    if($image_name!="")
                    {
                        //A. rename the image
                        $ext = end(explode('.', $image_name));

                        //creat new name for image
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext;

                        //B. upload the image

                        //source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //destination path for the image to be upload
                        $dst = "../images/food/".$image_name;

                        //finaly upload the image
                        $upload = move_uploaded_file($src, $dst);

                        //image uploaded or not
                        if($upload==false)
                        {
                            //redirect to add food page with the messagw and stop the proccess
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = ""; //seting default value
                }

                //3.insert in to databade
                //creat a sql query to save or add food
                $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price ,
                    image_name = '$image_name',
                    category_id = $category ,
                    featured = '$featured',
                    active = '$active'
                ";
                //execute the query 
                $res2 = mysqli_query($conn, $sql2);
                //4. redirect with message to manage food page
                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                
            }
        ?>
    </div>
</div>


<?php  include('partials/footer.php');?>  