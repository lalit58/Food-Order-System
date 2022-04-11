<link rel="stylesheet" href="../css/style.css">
<?php
error_reporting(0);
include('partials-front/menu.php'); ?>
<?php
error_reporting(0);
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
// require_once("../config/constants.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {

	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

		$orderid = $_POST['ORDERID'];
?>

<div class="container">
    <div class="">
        <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Order Placed
            Successfully.</h1>
    </div>
</div>
<br>

<h4 class="container"> Thank you for Ordering ! The ordering process is now complete.</h4>


<div class="container">

    <h3 class="container"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo $orderid; ?></span>
    </h3>
</div>
<span>
    <h4>Redirecting to main page in 5 Second.....</h4>
</span>
<div class="container">
    <a href="../index.php" class="btn btn-primary">Continue shopping</a>
</div>

<?php
		echo "<script> setTimeout(() => {
			window.location.href ='../index.php';
		},7500); </script>";
		

		// $orderdate = $_POST['TXNDATE'];
		// $status = $_POST['STATUS'];
		// $mode = $_POST['PAYMENTMODE'];
		// $orderid= $_POST['ORDERID'];

		//  echo $query = "update order_manager set Status='$status' whare Order_id='$orderid'"; die();

		// if(mysqli_query($conn,$query)){
		// 	echo mysqli_error($conn);
		// }
	} else { ?>
<!-- // echo "<b>Transaction status is failure</b>" . -->
<div class="container">
    <div class="">
        <h1 class="text-center" style="color: red;"><span class="glyphicon glyphicon-ok-circle"></span> Transaction
            Status is failure.</h1>
    </div>
</div>
<span>
    <h4>Redirecting to main page in 5 Second.....</h4>
</span>
<div class="container">
    <a href="../index.php" class="btn btn-primary">Continue shopping</a>
</div>

<?php

		echo "<script> setTimeout(() => {
		window.location.href ='../index.php';
		},7500); </script>";
		
	}

	if (isset($_POST) && count($_POST) > 0) {
	}
} else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>