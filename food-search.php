
    <?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php 

            //Get the Search Keyword
            // $search = $_POST['search'];
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        ?>


        <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 

            //SQL Query to Get foods based on search keyword
            //$search = burger '; DROP database name;
            // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check whether food available of not
            if($count>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the details
                    $id = $row['foodid'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                // Check whether image name is available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php 

                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">&#8377; <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <p><h6 class="btn success">4.4 <i class="fa fa-star "></i></h6></p>
                            <br>

                            <!-- <a href="#" class="btn btn-primary">Order Now</a> -->
                        </div>
                        <form method="POST" action="cart.php">
                                <input type="hidden" name="id" value="<?= $id; ?>">   
                                <input type="hidden" name="title" value="<?= $title; ?>">
                                <input type="hidden" name="food-price" value="<?= $price; ?>">
                                <input type="number" class="food-cart" name="quantity" value="1" > <br><br>
                                <input type="submit" class="btn btn-primary" style="width: 38% " name="add_to_cart" value="Add To Cart" >
                                
                            </form>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available
                echo "<div class='error'>Food not found.</div>";
            }
        
        ?>

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>