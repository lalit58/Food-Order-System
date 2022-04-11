<?php include('partials-front/menu.php'); ?>

<?php 
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{
?>

<form action='order.php' method='POST'>
    <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
        value="<?php echo  "ORDS" . rand(10000,99999999)?>">
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" required>

    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="number" name="phone_no" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>

    </div>
    <div class="form-group">
        <label>Adrress</label>
        <textarea type="text" name="address" class="form-control"></textarea>

    </div>
    <!-- <div class="form-check">
        <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Cash On Dalivery
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pay_mode" value="Online_Pay" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Pay Online
        </label>
    </div> -->
    <br>
    <!-- <Button class="btn btn-primary btn-block" name="purchase">Order Confirm</Button>
    <input type='hidden' name='title' value='$value[title]'> -->
</form>
<?php } ?>