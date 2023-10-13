<?php
session_start();
include_once 'includes/config.php';
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
}

 ?>
 <!DOCTYPE html>
<html lang="en">
	  	<head>
	<title>Utpann.com | Order Details</title>
	<head>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home" onload="getOrderStatus();">
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<div class="setNavigation"></div>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container-fluid">
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <a href="my-account.php">My Account</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Order Details</span>
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
<?php 
	     if (isset($_GET['oid'])) {
	     $oid=$_GET['oid'];
$sql="select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,
products.productDiscount as pDis,products.shippingCharge as pShip,products.gst_range as pGst,
products.gst_Charge as pGstCharge,
products.pr_sellingPrice as pSell,products.productWeight as pweight,orders.userOrderid as userorderid,
orders.orderStatus as orderstatus,
	orders.id as id from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null";
	     $result = mysqli_query($con, $sql);
     while($row=mysqli_fetch_assoc($result)){
    $rowId = $row['id']."<br>";
     $orderId = $_GET["oid"]."<br>";
      if ($rowId==$orderId) {
 	$getQuantity = htmlentities($row['qty']);
	"Get Selling Price ".$getFinalAmount  = htmlentities($row['pSell']*$getQuantity);
	 $setStatus = "Delivered";
				$status = $row['orderstatus'];
     ?>
<body class="cnt-home" >
 <div class="body-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="myAccount" >
					<div class="well"style="padding-bottom: 0px;" >
						<div class="orderHistory" style="margin-bottom: -5px;">
	<div class="well">
			<div class="row">
				<div class="col-lg-10"></div>
				<div class="col-lg-2">
					<?php 
					 if ($status!=$setStatus) { ?>
					<h5 class="inProg" style="text-align: center;background-color: orange;width:100px;color: white;
					padding: 5px;margin-top: -20px;margin-bottom: 0px;margin-left: 10px;letter-spacing: 2px; font-size: 1em;font-weight: bold; "><?php echo $status;?></h5>

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
<div class="orderDetails">
			<div class="row">
			<div class="col-lg-2">
			<a href="product-details.php?pid=<?php echo $row['opid'];?>">
				<img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt=""  class="img-responsive">	
				</a>	 
			</div>
			<div class="col-lg-10">
				<h4><b>Product Details</b></h4>
				<div class="row">
					<div class="col-lg-6">
				<h5><a href="order-details.php?oid=<?php echo $row['id']; ?>">Order Id : <?php echo $row['userorderid'];?></a></h5>
				<h5>Order Date : <?php echo $row['odate']; ?></h5>
				<h5>Product Name : <?php echo $row['pname'];?></h5>
				<h5>Quantity : <?php echo $row['qty'];?></h5>
				<h5>Weight : <?php echo $row['pweight']*$row['qty'];?> Kg</h5>
			 
				<?php 
				error_reporting(0);
$getUnitPrice = $row["pprice"]*$row["pweight"]+$row["pShip"];
$getGstPrice = $row["pGstCharge"];$getDisRange = $row["pDis"];

 "Get Discount Amt ".$getDiscount = round(($getUnitPrice/100)*($getDisRange));
	"Get Amt After Discount ".$getDisAmount = $getUnitPrice-$getDiscount."<br>";
"Get Your Savings".$getDisFinal = $getDisAmount-$getUnitPrice;
				 ?>
 </div>
					<div class="col-lg-6">
						<div class="amountDetails" >
							<div class="row">
								<div class="col-lg-6">
									<h5>Price Per Unit : </h5>
						<h5>Gst (<?php echo $row['pGst'];?>%) : </h5>
						<h5>Your Savings</h5>
						<h5 style="font-size: 1.5em;">Grand Total : </h5> 
								</div>
								<div class="col-lg-6" style="text-align: right;"> 
									<h5><i class="fa fa-inr"></i> <?php echo $getUnitPrice;?>.00</h5>
						<h5><i class="fa fa-inr"></i> <?php echo $getGstPrice?>.00</h5>
						<h5 style="color: red;"><i class="fa fa-inr"></i> <?php echo $getDisFinal?>.00</h5>
						<h5 style="font-size: 1.5em;"><i class="fa fa-inr"></i> <?php echo $getFinalAmount; ?> .00</h5> 
								</div>
							</div>
							
						</div>
						 <div class="row">
				 	 
					<div class="col-lg-5">
				 		 
					 	<button class="buttonAddCart" data-toggle="collapse" data-target="#demo">Track</button>
					  				 	</div>
				 	 	 
				 	<div class="col-lg-5">
				 		<?php if ($status==$setStatus) {
				 			?>
				 			<a href="javascript:void(0);" onClick="popUpWindow('invoice-order.php?oid=<?php echo htmlentities($row['id']);?>');" title="Track order">
					 	<button class="buttonAddCart">Invoice</button>
					 </a>
				 			<?php
				 		} ?>
				 	</div>
				 	<div class="col-lg-1"></div>
				 </div>
					
					</div>
				</div>
 
			</div>
			 
		</div><!-- row -->
</div>
 

<div id="demo" class="collapse">
<?php include("includes/orderTrack.php"); ?>
</div>
 



	</div><!-- well -->
</div><!-- orderHistory -->

					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php include('includes/myaccount-sidebar.php');?>
		 	</div><!-- col-lg-4 -->
		 </div>
		</div>
	</div>
	 <?php   }}}?>
	 <?php echo include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
</body>
</body>
 


 
 

		 
 
	
 
 