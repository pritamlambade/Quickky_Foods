<?php  include('partials/menu.php');?>

     <!--Main content section starts--> 
     <div class="main-content">
        <div class="wrapper">
        <h1>DASHBOARD</h1>
        <br><br>
        <?php
             if(isset($_SESSION['login']))
             {
                 echo $_SESSION['login'];
                 unset($_SESSION['login']);
             }
        ?>
        <br><br>
        <div class= "col-4 text-center">

            <?php
                //sql query
                $sql = "SELECT * FROM tbl_category";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count the no of rows
                $count = mysqli_num_rows($res);

            ?>

            <h1><?php echo $count; ?></h1>
            <br>
            <b>Categories</b>
        </div>

        <div class= "col-4 text-center">

            <?php
                //sql query
                $sql2 = "SELECT * FROM tbl_food";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);
                //count the no of rows
                $count2 = mysqli_num_rows($res2);

            ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            <b>Foods</b>
        </div>

        <div class= "col-4 text-center">
            <?php
                //sql query
                $sql3 = "SELECT * FROM tbl_order";
                //execute the query
                $res3 = mysqli_query($conn, $sql3);
                //count the no of rows
                $count3 = mysqli_num_rows($res3);

            ?>
            <h1><?php echo $count3 ?></h1>
            <br>
            <b>Total Orders</b>
        </div>

        <div class= "col-4 text-center">

             <?php
                //aggrigreat function in sql
                $sql4 = "SELECT SUM(total) as Total FROM tbl_order WHERE status='Delivered'";

                //execute the query
                $res4 = mysqli_query($conn, $sql4);

                //get the valuue
                $row4 =mysqli_fetch_assoc($res4);

                //GET TOTAL Revanue
                $total_revenue = $row4['Total'];
             ?>

            <h1>₹ <?php echo $total_revenue; ?></h1>
            <br>
            <b>Revenue Generated</b>
        </div>
        <div class="clearfix"></div>
    </div>
        
    </div>
    <!--Main content section ends--> 

<?php  include('partials/footer.php');?>   