<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

?>

<!DOCTYPE html>
<html lang="en">
	  	<head>
	<title>Utpann.com | Order History</title>
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
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <a href="my-account.php">My Account</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Order Histroy</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
 
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

<body class="cnt-home" >
 <div class="body-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="myAccount" >
					<div class="well"style="padding-bottom: 0px;" >
<form name="cart" method="post">	
<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,
products.productDiscount as pDis,products.shippingCharge as pShip,products.gst_range as pGst,
products.pr_sellingPrice as pSell,products.productWeight as pweight,orders.userOrderid as userorderid,
orders.orderStatus as orderstatus,
	orders.id as id from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
 $num=mysqli_num_rows($ret);
	if($num>0)
	{
while($row=mysqli_fetch_array($query))
{
	$setStatus = "Delivered";
				$status = $row['orderstatus'];
				 	 if ($status!=$setStatus) {
?>
<div class="orderIf" style="text-align: center;background-color: orange;width:40px;color: white;
					  padding-left: 0px;  font-size: 1em;font-weight: bold; border-top-right-radius: 30px;height: 30px;
  position: absolute; overflow: hidden;
    z-index: 1;
    border-bottom-right-radius: 30px; ">
			<h5><?php echo $cnt;?></h5>
		</div>
<?php } else{
	?>
	<style>
		.orderIf {
    background-color: #00BCD2;
    height: 30px;
    width: 40px;
    color: white;
    padding-left: 15px;
    position: absolute;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    overflow: hidden;
    z-index: 1;
}
.orderIf h5 {
    font-size: 1em;
}
		.orderElse {
    background-color: green;
    height: 30px;
    width: 40px;
    color: white;
    padding-left: 15px;
    position: absolute;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    overflow: hidden;
    z-index: 1;
}
.orderElse h5 {
    font-size: 1em;
}

	</style>
	<div class="orderElse">
			<h5><?php echo $cnt;?></h5>
		</div>
	<?php
}?>
<div class="orderHistory" style="margin-bottom: -5px;">
		
	<div class="well">
		<div class="row">
			<div class="col-lg-10"></div>
			<div class="col-lg-2">
					<?php 
					 if ($status!=$setStatus) { ?>
					<h5 class="inProg" style="text-align: center;background-color: orange;width:150px;color: white;
					padding: 5px;margin-top: -20px;margin-bottom: 0px;margin-left: -40px;letter-spacing: 2px; font-size: 1em;font-weight: bold; "><?php echo $status;?></h5>

				<?php } else{
					?>
				<h5 class="Delivered"><?php echo $status;?></h5>
				<style>
					.orderDetails h5{font-size: 1.2em;}
					.Delivered{text-align: center;background-color: green;width:100px;color: white;
					padding: 5px;margin-top: -20px;margin-bottom: 0px;margin-left: 10px;letter-spacing: 2px; font-size: 1em;font-weight: bold; }
				</style>
					<?php
				} ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
			<a href="product-details.php?pid=<?php echo $row['opid'];?>">
				<img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt=""  class="img-responsive">	
				</a>	 
			</div>
			
			<div class="col-lg-5">

 			<?php 
		"Get Weight ".$getWeight  = htmlentities($row['pweight']);
		"Get Price ".$getAmount = htmlentities($row['pprice']);
		"Get Discount % ".$getDisRange = htmlentities($row['pDis']);
		"Get GST Charge".$getGstCharge = htmlentities($row['pGst']);
 "Get GST Charge".$getQuantity = htmlentities($row['qty']);
		" Get shippingCharge ".$shippingCharge = htmlentities($row['pShip']);

		"Get Rs/Kg" .$getRs_Kg = $getWeight*$getAmount+$shippingCharge;
		"Get After Discount ".$getDsicountPrice = round(($getAmount/100)*($getDisRange));
		"Get Amt Discount ".$getAfterDiscount = $getAmount-$getDsicountPrice;
		
		"Get Discount Amt ".$getDiscount = round(($getRs_Kg/100)*($getDisRange));
		"Get Amt Discount per kg ".$getDisAmount = $getRs_Kg-$getDiscount;

 		"Get Selling Price ".$getFinalAmount  = htmlentities($row['pSell']*$getQuantity);
 
		?>
 
<style type="text/css">
	.orderDetails i{color: black;}
	.orderDetails h5{font-size: 1.2em;}
	
	              .buttonDirect {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    font-size: 1em;
    letter-spacing: 1px;
    margin-top: 20px;
    width: 100%;
}
.buttonAddCart
{
	 font-size: 1em;
    letter-spacing: 1px;
}
</style>
				<div class="orderDetails">
					
					<h5>Order Id : <?php echo $row['userorderid'];?><a href="order-details.php?oid=<?php echo $row['id']; ?>">&nbsp <span style="font-size: 0.8em;color: #00BCD2;">(View More)</span></a></h5>
					<h5>Product Name : <?php echo $row['pname'];?></h5>
					<hr>
				</div>
				 <div class="row">

				 	 <?php 
				 	 $setStatus = "Delivered";
				$status = $row['orderstatus'];
				 	 if ($status!=$setStatus) {
				 	 	 ?>
<div class="col-lg-5"><br>
				 		<a href="order-details.php?oid=<?php echo $row['id']; ?>"  class="buttonDirect">
					 	<span style="color: white;">Track</span>
					 </a>
				 	</div>
				 	 	 <?php
				 	 } ?>
				 	
				 	<div class="col-lg-5">
				 		<a href="javascript:void(0);" onClick="popUpWindow('invoice-order.php?oid=<?php echo htmlentities($row['id']);?>');" title="Invoice Order">
					 	<button class="buttonAddCart" type="submit">Invoice</button>
					 </a>
				 	</div>
				 	<div class="col-lg-1"></div>
				 </div>
					 
			</div>

			<div class="col-lg-5">
				<div class="orderDetails" style="text-align: right;">
					 
					<h5>Order Date : <?php echo $row['odate']; ?></h5>
					<hr>
					<h5 style="font-size: 1.8em;">Grand Total : <i class="fa fa-inr"></i> <?php echo $getFinalAmount; ?> .00</h5> 
				</div>
 
			</div>
			 
		</div><!-- row -->
	 
		
	</div><!-- well -->
</div><!-- orderHistory -->
<?php $cnt=$cnt+1;}} else
{
	?>
	<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<img src="assets/images/emptyCart.png" class="img-responsive" alt="">
		<h4 style="text-align: center;padding-top: 20px;">No record found.</h4>
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
</div><br>
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
}
?>

</form>
					</div><!-- well -->
				</div><!-- myAccount -->
			</div><!-- col-lg-8 -->
			<div class="col-lg-4">
				<?php include('includes/myaccount-sidebar.php');?>
		 	</div><!-- col-lg-4 -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- body-content -->




 

		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php echo include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
 
</body>
</html>
<?php } ?>