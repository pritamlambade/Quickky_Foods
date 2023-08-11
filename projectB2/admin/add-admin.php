<?php  include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br>
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>
            <tr>
                <td>username</td>
                <td>
                    <input type="text" name="username" placeholder="Enter Your Username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php  include('partials/footer.php');?>   

<?php
    //process the value from form and save it in database
    //check whether the submit button is clicked or not
    
    if(isset($_POST['submit']))
    {
        //button clicked
        // echo "Button Clicked";

        //1.Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']) ; //Password Encryption with md5

        //2.SQL Query to save the data in the database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        
        ";
        
        //3. Executing Query and saving data into database 
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4.check whetherthe the (Query is Executed ) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            // data insurted
            // echo "data inserted";
            //creat a session variable to disply the message 
            $_SESSION['add'] = "<div class = 'success'>Admin Added Successfully. </div>";
            //Redirect page TO MANAGE ADMIN
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // faild to insert data
            // echo "faild to insert data";
            //creat a session variable to disply the message 
            $_SESSION['add'] = "<div class= 'error' >Fail To Add Admin. <div>";
            //Redirect page TO add ADMIN
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
        
    
?>