<?php  include('partials/menu.php');?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Chnage password</h1>
            <br><br>


            <?php 
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }
            ?>

            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name ="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="password" name ="confirm_password" placeholder="Confirm Password" >
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="change password" class="btn-secondary">
                    </td>
                </tr>
            </table>
            </form>
        </div>

    </div>

    <?php  
        //submit button is clicked or not ?
        if(isset($_POST['submit']))
        {
            //echo "clicked";

            //1. get the data from form
            $id=$_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //2. check whether the user with current id current passworld exists or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                //check whether thw data is available or nat 
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                     //user exist and passworld can be changed
                    //  echo "user found";
                    if($new_password==$confirm_password)
                    {
                        //update the password
                        // echo "password updated";
                        $sql2 = "UPDATE tbl_admin SET 
                            password='$new_password'
                            WHERE id=$id
                        ";

                        //execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==true)
                        {
                            //display source message
                             //redirect to manage adminwith success message 
                            $_SESSION['change-pwd']="<div class= 'success'> Password change successfully. </div>";
                            header('location:'.SITEURL.'admin/manage-admin.php'); 
                        }
                        else
                        {
                            //display error meaasgae
                             //redirect to manage adminwith error message 
                             $_SESSION['change-pwd']="<div class= 'error'> Faild to change Password. </div>";
                             header('location:'.SITEURL.'admin/manage-admin.php'); 
                        }
                    }
                    else
                    {
                        //redirect to manage adminwith error message 
                        $_SESSION['pwd-not-match']="<div class= 'error'> Password Did Not Match. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php'); 
                    }
                }
                else
                {
                    //user does not exist
                    $_SESSION['user-not-found']="<div class= 'error'>User Not Found. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            //3. check wether the new passworld and confirm passworld match or not 

            //4. change passworld if all above is true
        }
    ?>

<?php  include('partials/footer.php');?>   