<?php include('partials-front/menu.php'); ?> 

    <?php 
        //check id passed or not
        if(isset($_GET['category_id']))
        {
            $category_id=$_GET['category_id']; //category id is set and get the id
            $sql= "SELECT title FROM tbl_category WHERE id=$category_id";

            $res = mysqli_query($conn,$sql);

            $row=mysqli_fetch_assoc($res);

            $category_title=$row['title'];  //get the title
        }
        else
        {
            header('location:'.SITEURL);
        }

    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!--Food Menu section starts here-->
    <section class="food-menu">
        <div class="container">
             <h2 class="text-center">Food Menu</h2>

             <?php 
                $sql2= "SELECT * FROM tbl_food WHERE category_id=$category_id";

                $res2=mysqli_query($conn,$sql2);

                $count2=mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $foodid =$row2['foodid'];
                        $title=$row2['title'];
                        $price=$row2['price'];
                        $description =$row2['description'];
                        $image_name=$row2['image_name'];

                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image Not Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php SITEURL;?>images/food/<?php echo $image_name; ?>" alt="$title" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price">&#8377;<?php echo $price;?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <p><h6 class="btn success">4.4 <i class="fa fa-star "></i></h6></p>
                                    <br>
                                    <!-- <a href="<?php SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->

                                </div>
                                <form method="POST" action="manage_cart.php">
                                <input type="hidden" name="foodid" value="<?= $foodid; ?>">   
                                <input type="hidden" name="title" value="<?= $title; ?>">
                                <input type="hidden" name="foodprice" value="<?= $price; ?>">
                                <input type="number" class="food-cart" name="quantity" value="1" > <br><br>
                                <input type="submit" class="btn btn-primary" style="width: 38% " name="add_to_cart" value="Add To Cart" >
                                
                            </form>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Food Not Availabe</div>";
                }

            ?>
             
             
             <div class="clearfix"></div>
             
        </div>
    
    </section>
    <!--Food menu section ends here-->

    <?php include('partials-front/footer.php'); ?>