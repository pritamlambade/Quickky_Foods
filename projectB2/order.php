<?php include('partials-front/menu.php'); ?>

<?php

    //check food id is set or not
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the SELECTED FOOD
        $food_id = $_GET['food_id'];

        //get the details of the selected food 
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //executing the query
        $res = mysqli_query($conn, $sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //data is available or not
        if($count==1)
        {
            //we have data
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            //food not available
            //redirect to home page
            header('location:'.SITEURL);
        }
    }
    else
    {
        //redirect to home page
        header('location:'.SITEURL);
    }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
        
            
            <h2 class="text-center ">Fill this form to confirm your order.<img src="images/GIF1.webp" alt="Computer man" class="center2" style="width:60px;height:60px;"></h2>
            
        

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
                                //check wether image availabel or not
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
                        <h3><?php echo $title; ?></h3>

                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <p class="food-price"> ₹ <?php echo $price; ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your full name here." class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your phone number." class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter your valid Email Id." class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="House No.,state,City etc." class="input-responsive" required></textarea>
                    
                    <div class="order-label">Please select your Payments Option:</div>
                    <input type="radio" name="payment" value="UPI">UPI <br>
                    <input type="radio" name="payment" value="Credit/Debit/ATM Card">Credit/Debit/ATM Card<br>
                    <input type="radio" name="payment" value="Cash On Delivery">Cash On Delivery
                    <br><br>
                    

                    <!-- <div class="order-label"><p>Please select your Payments Option:</p></div>
  <input type="radio" id="upi" name="payment" >
  <label for="upi">UPI</label><br>
  <input type="radio" id="cards" name="payment">
  <label for="cards">Credit/Debit/ATM Card</label><br>
  <input type="radio" id="cash" name="payment" >
  <label for="cash">Cash On Delivery</label>
                    <br><br><br> -->

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
            //check whether submit button clicked or not
            if(isset($_POST['submit']))
            {
                //get all the details from the form 
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                
                $total = $price*$qty;

                $order_date = date("Y-m-d h:i:sa");//order date

                $status = "ordered";//orderede ,on delivery ,delivered,cancelleed

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $custommer_address = $_POST['address'];
                //for radio input type to ceck button is selected or not 
                if(isset($_POST['payment']))
                {
                    $payment = $_POST['payment'];

                }
                else
                {
                    $payment = "No";
                }

                //save the order in database
                //creat sql query
                $sql2 = "INSERT INTO  tbl_order SET 
                    food = '$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$custommer_address',
                    payment = '$payment'
                    

                ";
                //  echo $sql2;

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //check whether query is executed or not
                if($res2==true)
                {
                    //query executed and order saved
                    $_SESSION['order'] = "<div class='success text-center'><B>Food ordered successfully.</B></div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    //Failed to save order
                    $_SESSION['order'] = "<div class='error text-center'><B>Failed to order food.<B></div>";
                    header('location:'.SITEURL);
                }

                


            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>