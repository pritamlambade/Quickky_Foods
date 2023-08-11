<?php include('../config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Quickyy Foods</title>
    <link rel="stylesheet" href="admin1.css">
    <!-- <div class ='bg_img' style="background-image: url('../images/logo1.png');"> -->
</head>
<body>
    <section class="home-section">
    <div class="home-bg"></div>
    <div class="login">
        <h2 class="text-center"><b>Quickyy Foods</b></h2>
        <br>
        <h1 class="text-center">Login</h1>
        <h5 class="text-center">To Admin Page...</h5>
        <br>
       
        <?php
             if(isset($_SESSION['login']))
             {
                 echo $_SESSION['login'];
                 unset($_SESSION['login']);
             }
             if(isset($_SESSION['no-login-message']))
             {
                 echo $_SESSION['no-login-message'];
                 unset($_SESSION['no-login-message']);
             }
        ?>
        <br>
        
        
        <!-- login form starts -->
        <form action="" method="POST" class="text-center">
            <b>Username: </b><br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            <b>Password: </b><br>
            <input type="password" name="password" placeholder="Enter Passsword"><br><br>

            <input type="submit" name ="submit" value="  Login  " class="btn-primary">
        </form><br>
        <!-- login form ends -->
        <p class="text-center">Created By <a href="www.TEGroup.com">TE Group</a></p>
    </div>
    </section>
</body>
</html>

<?php
    //submit button clicked or not 
    if(isset($_POST['submit']))
    {
        //1. get the data from login form 
        $username = mysqli_real_escape_string($conn, $_POST['username']);// does not printed
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. sql to check the wether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. execute the query
        $res = mysqli_query($conn, $sql);

        //4. count rows to check user exist or not 
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class= 'success'> Login Successful</div>";
            $_SESSION['user'] = $username; //to check user log in or not and log out will unset it 

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class= 'error text-center'> Faild To Login, Username or Password did not match.</div>";

            header('location:'.SITEURL.'admin/login.php');
        }
    }
    
    

?>