<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if (isset($_POST['submit'])) {

		mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		header('location:order-history.php');

	}
?>
<!DOCTYPE html>
 	<head>
	<title>Utpann.com Payment Method</title>
	<head>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home" onload="commaCheck();">
<header class="header-style-1">
	<!-- ======================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<div class="setNavigation"></div>
</header>
<!-- ================= HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container-fluid">
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Payment Method</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content" >
	<div class="container" style="color: black;">

<h3 style="font-weight: bold;font-size: 2em;">You’re almost there! Complete your order</h3>


<form name="payment" method="post">
		<div class="formDetails">
			<div class="well">
				<input type="radio" name="paymethod" value="COD" checked="checked"> &nbsp COD	 
			</div>
		</div>
		<div class="formDetails">
			<div class="well">
				<input type="radio" name="paymethod" value="Internet Banking"> &nbsp Internet Banking
			</div>
		</div>
		<div class="formDetails">
			<div class="well">
				<input type="radio" name="paymethod" value="Debit / Credit card"> &nbsp Debit / Credit card
			</div>
		</div>
	 
<?php
			$pdtid=array();
			$sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			 ?>

			<?php
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				  
		"Get Weight ".$getWeight  = htmlentities($row['productWeight']);
		"Get Price ".$getAmount = htmlentities($row['productPrice']);
		"Get Quantity" .$quantity=$_SESSION['cart'][$row['id']]['quantity'];
		"Get Discount % ".$getDisRange = htmlentities($row['productDiscount']);
		"Get shippingCharge % ".$shippingCharge = htmlentities($row['shippingCharge']);
		"Get Gst_range ".$getGstRange = htmlentities($row['gst_range']);
		"Get Gst_range ".$getGstCharge = htmlentities($row['gst_charge']);
		"Get Gst_range ".$pr_sellingPrice = htmlentities($row['pr_sellingPrice']);
"Get Total Amount Before discount" .$getUnitPrice = $getWeight*$getAmount;
		"Get Total Amount Before discount" .$getRs_Kg = $getWeight*$getAmount*$quantity;

		"Get  Discount Calculation ".$getDsicountPrice = round(($getAmount/100)*($getDisRange));
		"Get Discount Amount ".$getAfterDiscount = $getAmount-$getDsicountPrice;

	"Get Discount Amt ".$getDiscount = round(($getRs_Kg/100)*($getDisRange));
		"Get Amt After Discount ".$getDisAmount = $getRs_Kg-$getDiscount."<br>";

		 
		
		"Get Your Savings".$getDisFinal = $getDisAmount-$getRs_Kg;
		"Get Final Amount ".$getFinalAmount = $getDisAmount+$shippingCharge;
			$getUnitAmt  +=$getRs_Kg;
			$totalprice += $getFinalAmount;
			$getDiscountAmt +=$getDisFinal;
			$_SESSION['qnty']=$totalqunty+=$quantity;
			array_push($pdtid,$row['id']);
  }
 }
$_SESSION['pid']=$pdtid;
  $totalOrder = count($_SESSION['cart']); 
				if ($totalOrder>1) {
					$items = "Items";
				}
				else
				{
					$items = "Item";
				}
				?>
<script>
				 	function commaCheck()
				 	{
	var totalPrice ='<?php echo $totalprice; ?>';
    var totalPriceMatches = totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("totalPriceString").innerHTML=totalPriceMatches;
				 	}
				 </script>
				 <hr>
	<h3  style="font-weight: bold;font-size: 1.5em;"> Select your Payment Method </h3>

 <div class="row">
	<div class="col-lg-4">
		<a href="payment.php">Payment</a>

	</div>
 	<div class="col-lg-8">
		<div class="paymentDetails">
			<div class="well">
				<div class="row">
					<div class="col-lg-6" style="text-align: left;">
						<h4>Quantity : </h4>
						<h4>Unit Price : </h4>
						<h4>Your Savings : </h4>
						<hr>
						<h4 style="font-weight: bold;">Sub Total (<?php echo $totalOrder ." ". $items ;?>)
						</h4>
					</div> 
					<div class="col-lg-6" style="text-align: right;">
						<h4><?php echo $totalqunty; ?> Packet</h4>
						<h4><i class="fa fa-inr"></i> <?php echo $getUnitAmt; ?> .00</h4>
						<h4 style="color: red;"><i class="fa fa-inr"></i> <?php echo $getDiscountAmt; ?> .00</h4>
						<hr>
						<h4 style="font-weight: bold;"><i class="fa fa-inr"></i> <span id="totalPriceString"></span>.00</h4>
					</div>
				</div>
				
				<hr>
				<div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-3">
						<input type="submit" value="Pay Now" name="submit" class="buttonAddCart">
					</div>
				</div>
			</div>
		</div>
 	</div>
 </div>
</form>
 <style>
 	.buttonAddCart{font-size: 1.5em;padding: 3px 25px;letter-spacing: 1px;}
 	.formDetails .well
 	{
 		background-color: white;
 		border-radius: 0px;
 		padding: 10px;
 	}
 	.paymentDetails .well
 	{
 		background-color: white;
 		border-radius: 0px;
 		color: black;
 	}
 </style>
</div><!-- /.container -->
</div><!-- /.body-content -->
<?php echo include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>