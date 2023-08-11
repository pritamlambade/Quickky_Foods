
<?php include('partials-front/menu.php'); ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center" style="color:white;">Explore Foods</h2>

            <?php
            
                //display all the category
                //sql query
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                //executr the query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check whether the category is availabel or not
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?PHP echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($image_name=="")
                                        {
                                            //image not availabel
                                            echo "<div class='error'>Image Not Found</div>";
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
                    echo "<div class='error'>Category Not Found</div>";
                }
            ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
    <!-- WP pop up message  ( Live chat)-->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-a39a3d73-fd94-4832-bdea-ec3ca421de35"></div>

     <!-- live chat end  -->


    <?php include('partials-front/footer.php'); ?>