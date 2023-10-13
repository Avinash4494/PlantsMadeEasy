<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			// echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			// echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	
	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$userOrderid = $_POST['userOrderid'];
	$order_id_gen = '#'.rand(100000,999999);
	$orderStat = $_POST["orderStatus"];
	$product_id = $_POST["product_id"];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity,userOrderid,orderStatus,product_id) values('".$_SESSION['id']."','$qty','$val34','$order_id_gen','$orderStat','$product_id')");
header('location:payment-method.php');
}
}
}

// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
// echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
// echo "<script>alert('Shipping Address has been updated');</script>";
		}
	}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Utpann.com Cart Details</title>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home" onload="commaCheck();">
<!-- ============================= HEADER ====================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
</header>
<div class="setNavigation"></div>
<!-- =============== HEADER : END ============================================== -->
<div class="breadCrum">
	<div class="container-fluid">
		<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Shopping Cart</span></h5>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
 
<div class="body-content">

	<div class="container-fluid">
	<div class="row">
		<!-- ============================= column 1 col-lg-9 starts ============================= -->
		<div class="col-lg-9" >
			<form name="cart" method="post">
			<?php
if(!empty($_SESSION['cart'])){

	?>
	
			
		
<div class="shoppingCartTab">
	<div class="well">
						<div class="row">
				<div class="col-lg-6">
					<h3>Shopping Cart</h3>
				</div>
				<div class="col-lg-6">
				<?php $totalOrder = count($_SESSION['cart']); 
				if ($totalOrder>1) {
					$items = "Items";
				}
				else
				{
					$items = "Item";
				}
				?>
					<h4> ( <?php echo $totalOrder ." ". $items ;?>  )</h4> 
				</div>
			</div>
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

			$totalprice += $getFinalAmount;
			$_SESSION['qnty']=$totalqunty+=$quantity;
			array_push($pdtid,$row['id']);
	?>
	
<div class="shoppingCart">
		<div class="well">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<h4 style="margin: 0px;font-size: 1.5em;font-weight: bold;letter-spacing: 1px;">
			<a  href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" >
				<?php echo $row['productName'];
						$_SESSION['sid']=$pd;
					?>
				</a>
			</h4>
				</div>
			</div>
	<div class="row">
		<div class="col-lg-2">
			<a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" >
				<img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" class="img-responsive" />
			</a>
		</div>
		<div class="col-lg-5">
			<div class="cartProduct" style="padding-top: 15px;">
			
			<h5>by <?php echo htmlentities($row['productCompany']);?> Seeds and beyond</h5>
			<h5 style="color:#00BCD2; "><?php echo htmlentities($row['productAvailability']);?></h5>
				<h5>Product Name : <?php echo htmlentities($row['productName']);?></h5>
				<h5>Weight : <?php echo $getWeight; ?> Kgs / Packet</h5>
				<h5>Quantity : <?php echo $quantity; ?> Packet</h5>
				<h5>Discount : <?php echo $getDisRange; ?> %</h5>
				<h5>Price per Packet : <i class="fa fa-inr"></i> <?php echo $getUnitPrice; ?>.00 </h5>
			</div>
		</div>
	<div class="col-lg-5">
		<div class="row">
			<div class="col-lg-6">
				<div class="priceTab" style="text-align: left;">
					<h5>Price : </h5>
					<h5>Shipping Charge : </h5>
					<!-- <h5>GST Amount (<?php echo $getGstRange; ?>%): </h5> -->
					<h5>Your Savings : </h5>
					<h4>Grand Total : </h4>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="priceTab" style="text-align: right;">
					
					<h5><i class="fa fa-inr"></i> <?php echo $getRs_Kg; ?>.00</h5>
					<h5><i class="fa fa-inr"></i> <?php echo $shippingCharge; ?>.00</h5>
					<!-- <h5><i class="fa fa-inr"></i> <?php echo $getGstCharge; ?>.00</h5> -->
					<h5 style="color: red;font-weight: bold;"><i class="fa fa-inr"></i> <?php echo $getDisFinal; ?>.00</h5>
					<h4 style="text-align: right;"><i class="fa fa-inr"></i>
						<?php echo $getFinalAmount;?>.00</h4>
				</div>
			</div> 
		</div> 
		<hr>
						 
	<div class="row">
		<div class="col-lg-6">
			<h5 style="padding-top: 10px;">Quantity : </h5>		
		<div class="quant-input">
			<div class="arrows">
				<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc" ></i></span></div><br>
				<div class="arrow minus gradient" style="margin-top: -30px;"><span class="ir" ><i class="icon fa fa-sort-desc" ></i></span></div>
			</div>
			<input type="text" class="form-control" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
		</div>

		</div>
		<div class="col-lg-6">
			<div class="row">
	<div class="col-lg-1">
		<div class="checkBoxCart">
			<input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" />
		</div>
	</div>
	<div class="col-lg-10">
		<h5 style="padding-top: 8px;padding-bottom: 10px;"> Remove Product</h5>
	</div>
	<div class="col-lg-3"></div>
</div>
			 
			<button type="submit" name="submit" class="buttonCartDelete">
					Update Cart</button>
		</div>
	</div>
 
	</div><!-- col-lg-5 -->
</div><!-- row -->
		</div><!-- .well -->
	</div><!-- shoppingCart -->
	<input type="text" name="product_id" hidden="" value="<?php echo $row["product_id"]; ?>">
	
			<?php  } 
?>
		</div>
<!-- ========================= column 1 col-lg-9 ends ============================= -->
<!-- ========================== column 1 col-lg-3 starts ============================= -->
<?php
		}
$_SESSION['pid']=$pdtid;
?>
		<div class="col-lg-3">
 
					<div class="checkOut" >
			<div class="well">
				<!-- <input type="hidden" name="order_id" value=""> -->
				<?php 
					// if ($totalprice>5000) {
					// 	 $free = "is eligible for FREE";
					// 	 $msfIcon = '<span class="check Tick"><i class="fa fa-check"></i></span>';
					// 	 $addCart = 'Select the below option to checkout.';
					// }
					// else
					// {
					// 	$free = "is not eligible for FREE";
					// 	$msfIcon = '<span class="check cross"><i class="fa fa-times"></i></span>';
					// 	 $addCart = 'Add more items to your cart for Free Delivery.';
					// }
				?>
				 <!--  <h4 class="free"> <?php echo $msfIcon; ?> &nbsp  <span style="color: #00BCD2;">Your order <?php echo $free; ?> Delivery.</span><br> <?php echo $addCart; ?> </h4> -->
<input type="text" name="order_id_gen" hidden="">
<input type="text" name="orderStatus" hidden="" value="Order Received">

				<h4 style="text-align: right;"> Sub Total (<?php echo $totalOrder ." ". $items ;?>)<br>  
				</h4>
				<h3 style="text-align: right;"><i class="fa fa-inr"></i> <span id="totalPriceString"></span>.00 </h3>
				
				<script>
				 	function commaCheck()
				 	{
	var totalPrice ='<?php echo $totalprice; ?>';
    var totalPriceMatches = totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("totalPriceString").innerHTML=totalPriceMatches;
				 	}
				 </script>

				<hr>
	<button type="submit" name="ordersubmit" class="buttonCheckout">Procced To Checkout </button>
  
<!-- <div> <a style=" width: 135px; background-color: #1065b7; text-align: center; font-weight: 800; padding: 11px 0px; color: white; font-size: 12px; display: inline-block; text-decoration: none; " href='https://pmny.in/mrEFutT9fsC8' > Pay Now </a> </div> -->

				
			</div>
		</div>

 

		<?php include ('includes/sideProducts.php'); ?>
	 
		</div>

		<!-- ============================= column 1 col-lg-3 ends ============================= -->
	</div>	<!-- ================== major row ends ==================  -->
	 <?php $_SESSION['pid']=$pdtid; ?>
<div class="row">
	<div class="col-lg-9">
					<div class="addressContainer" style="margin-top: 30px;">
			<div class="row">
			<div class="col-lg-6">
				<div class="shippingAddress">
					<div class="well">
						<h4>Shipping Address</h4>
						<hr>
<div class="form-group">
	<?php
	$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
	?>
	<div class="form-group">
		<label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
		<textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing City">Billing City <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
	</div>
	 <div class="form-group">
		<label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
	</div>
	<button type="submit" name="update" class="buttonAddCart">Update</button>
	<?php } ?>
</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="shippingAddress">
					<div class="well">
						<h4>Billing Address</h4>
						<hr>
<div class="form-group">
	<?php
	$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
	?>
	<div class="form-group">
		<label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
		<textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing City">Shipping City <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
	</div>
	 <div class="form-group">
		<label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
	</div>
	<button type="submit" name="shipupdate" class="buttonAddCart">Update</button>
	<?php } ?>
</div><!-- form-group -->
					</div><!-- well -->
				</div><!-- shippingAddress -->
			</div><!-- col-lg-6 -->
		</div><!-- .row -->
</div>
	</div>
	<div class="col-lg-3">
		
	</div>
</div>
</form>

 <?php } else {
		?>

	</div> <!-- container -->
 	

<div class="row" style="margin-top: 25px;margin-bottom: 50px;">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<img src="assets/images/emptyCart.png" class="img-responsive" alt="">
		<h4 style="text-align: center;padding-top: 20px;">Your shopping Cart is empty.</h4>
		<hr>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="buttonAddCart">
					<a href="index.php">Continue Shopping</a>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<div class="col-lg-4"></div>
</div>
<style>
	.buttonAddCart a
	{
		width: 100%;
		color: white;
		font-size: 1.2em;
		letter-spacing: 2px;
		text-align: center;
	}
</style>
<?php
}?>
 				 


</div>
</div>
</div>
<?php echo include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>

</body>
</html>