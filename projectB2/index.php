<?php include('partials-front/menu.php'); ?>

    

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center home-text">
    
       <h2 class="center "data-aos="flip-right">Quickyy Foods</h2>
       
        <div class="container">
        
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

            
        </div>
        
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
    
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories ">
        <div class="container">
            <h2 class="text-center" style="color:white;">Explore Foods</h2>

            <?php 
            //creat a category to display category from database 
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //execute the query 
            $res = mysqli_query($conn, $sql);

            //count rows to check we have categorys or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //category is availabel
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the value like image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                        <a href="<?PHP echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                //check wether the image is availabel or not
                                if($image_name=="")
                                {
                                    //display the message
                                    echo "<div class='error'>Image Not Availabel.</div>";
                                }
                                else
                                {
                                    //image availabel
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }  

                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                    <?php
        
                }
            }
            else
            {
                //category not found
                echo "<div class='error'>Category Not Added.</div>";
            }
            ?>
            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container ">
            <div class="radius" style="padding-left:42%; "></div>
            <h2 class="text-center text-white"data-aos="zoom-in-up">Food Menu</h2>

            <?php
            //getting foods from database thet are active and featured
            //sql query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //EXECUT THE QERY 
            $res2 = mysqli_query($conn, $sql2);

            //countrows
            $count2 = mysqli_num_rows($res2);

            //check wether the food is availabel or not
            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    //get all the value
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                        <div class="food-menu-box"data-aos="flip-left">
                            <div class="food-menu-img">
                                <?php
                                    //check wether the image is availabele or not
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"> ₹ <?php echo $price; ?></p>
                                <p class="food-detail">
                                   <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Food Not Available.</div>";
            }
            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    

    <!-- fOOD Menu Section Ends Here -->
    <!-- WP pop up message  ( Live chat)-->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-a39a3d73-fd94-4832-bdea-ec3ca421de35"></div>

     <!-- live chat end  -->
     <!-- map section  -->
     <div class="map">
     <h2 class="text-center text-white"data-aos="zoom-in-up">Resort's Location</h2>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3800.500450444892!2d73.41854981489048!3d17.721043597760485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be9dff4b6655c1b%3A0x20a078940d0db32!2sSai%20Resort!5e0!3m2!1sen!2sin!4v1641417110259!5m2!1sen!2sin" width="1800" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </div>
    <!-- map section end here  -->

    

<?php include('partials-front/footer.php'); ?>