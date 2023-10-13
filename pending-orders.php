<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
		;

	}

?>

<!DOCTYPE html>
<html lang="en">
 	<head>
	<title>Utpann.com My Account</title>
	<head>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home">
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<div class="setNavigation"></div>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container-fluid">
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <a href="my-account.php">My Account</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Pending Orders</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container-fluid">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-lg-8 col-sm-12">
					<div class="myAccount">
						<div class="well">
								 
<form name="cart" method="post">	
<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.productCompany as bname,products.id as c,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is null");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0)
{
while($row=mysqli_fetch_array($query))
{
?>
<div class="orderHistory">
		<div class="orderSlNo">
			<h5><?php echo $cnt;?></h5>
		</div>
	<div class="well">
		<a href="product-details.php?pid=<?php echo $row['opid'];?>">
		<div class="row">
			<div class="col-lg-2">
				<img src="admin/productimages/<?php echo $row['opid'];?>/<?php echo $row['pimg1'];?>" alt=""  class="img-responsive">		 
			</div>
			<div class="col-lg-4">
				<div class="orderDetails">
					<h3><?php echo $row['pname'];?></h3>
					<h5>Brand Name : <?php echo $row['bname'];?></h5>
					<h5>Quantity : <?php echo $qty=$row['qty']; ?></h5>
					<h5>Order Date : <?php echo $row['odate']; ?></h5>
					
				</div>
			</div>
			<div class="col-lg-4">
						<div class="orderDetails">
					<?php 
					"Get Weight ".$getWeight  = htmlentities($row['pweight']);
		"Get Price ".$getAmount = htmlentities($row['pprice']);

		"Get Discount % ".$getDisRange = htmlentities($row['pDis']);
		"Get Gst_range ".$getGstRange = htmlentities($row['pGst']);
		"Get shippingCharge ".$shippingCharge = htmlentities($row['pShip']);
		"Get Price per pack" .$getPrice_Pack = $getWeight*$getAmount;
		"Get Total Amount Before discount" .$getRs_Kg = $getWeight*$getAmount*$qty+$shippingCharge;
		"Get  Discount Calculation ".$getDsicountPrice = round(($getAmount/100)*($getDisRange));
		"Get Discount Amount ".$getAfterDiscount = $getAmount-$getDsicountPrice;
		
		"Get Discount Amt ".$getDiscount = round(($getRs_Kg/100)*($getDisRange));
		"Get Amt After Discount ".$getDisAmount = $getRs_Kg-$getDiscount."<br>";

		"Get Gst Amount".$getGstAmount = round(($getDisAmount/100)*($getGstRange));
	
		"Get Your Savings".$getDisFinal = $getDisAmount-$getRs_Kg;
		"Get Final Amount ".$getFinalAmount = $getDisAmount+$getGstAmount;
 ?>



					<h5>Product Weight : <?php echo $row['pweight']; ?>.00 Kg</h5>
					 <h5>Shipping Charge : <i class="fa fa-inr"></i> <?php echo $shippcharge = $row['shippingcharge']; ?>.00</h5>
					<h5>Grand Total : <i class="fa fa-inr"></i> <?php echo ($getFinalAmount);?>.00</h5> 
				</div>
			</div>
			<div class="col-lg-2">
				<div class="orderDetails">
					<div class="cartPrice">
			<h5>Price per Unit</h5>
			<h4><i class="fa fa-inr"></i> 
				<b><?php echo $row['pprice']; ?>.00 <span style="font-size: 0.5em;">/ Kg</span></b>
			</h4>
		</div>
				</div>
			</div>
		</div><!-- row -->
		</a>
	</div><!-- well -->
</div><!-- orderHistory -->				 
<?php $cnt=$cnt+1;} ?>
 
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<button style="margin-top: -20px;" type="submit" name="ordersubmit" class="buttonAddCart"><a href="payment-method.php" style="color: white;">Proceed To Pay</a></button>
			</div>
			<div class="col-lg-4"></div>
		</div>
  
 
<?php } else {?>
<div class="row" style="margin-top: 25px;margin-bottom: 50px;">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<img src="assets/images/emptyCart.png" class="img-responsive" alt="">
		<h4 style="text-align: center;padding-top: 20px;">Your have no pending order.</h4>
		
		
	</div>
	<div class="col-lg-4"></div>
</div>
<hr>
<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="buttonAddCart">
					<a href="index.php">Continue Shopping</a>
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
<?php } ?>	
			</div><!-- well -->
		</div><!-- myAccount -->
	</div><!-- .col-lg-9 -->
<div class="col-lg-4">
	<?php include('includes/myaccount-sidebar.php');?>
</div><!-- col-lg-3 -->

</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</div><!-- /.body-content -->
		</form>
<!-- ========= BRANDS CAROUSEL ================================= -->

<?php echo include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>