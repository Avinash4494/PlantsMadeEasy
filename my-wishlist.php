<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
// Code forProduct deletion from  wishlist	
$wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:my-wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
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
	<title>Utpann.com My Wish List</title>
	<head>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home">
<header class="header-style-1">
	<!-- ======================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<div class="setNavigation"></div>
</header>
<!-- ================= HEADER : END ============================================== -->
<div class="breadCrum">
	<div class="container-fluid">
		<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Wishlist</span></h5>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9"><!-- ======== major columen .col-lg-9 starts ======= -->
				<div class="wishProducts">
					<div class="well">
<?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,products.productWeight as pweight,products.productCompany as pcoy,products.productAvailability as pAvail,products.productName as pName,products.productName as pName,
products.productDiscount as pDis,products.shippingCharge as pShip,products.gst_range as pGst,products.pr_sellingPrice as pShell,
	wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {
?>
<div class="row">
	<div class="col-lg-2">
		<img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" class="img-responsive">
	</div>
	<div class="col-lg-5">
		<div class="wishProduct">
		<h3 style="margin-top: 0px;"><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></h3>
		<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
<div class="rating">
	<i class="fa fa-star rate"></i>
	<i class="fa fa-star rate"></i>
	<i class="fa fa-star rate"></i>
	<i class="fa fa-star rate"></i>
	<i class="fa fa-star non-rate"></i>
	<span class="review">( <?php echo htmlentities($num);?> Reviews )</span>
</div>

<?php } ?>
<h5>by <?php echo htmlentities($row['pcoy']);?> Seeds and beyond</h5>
<h5>Weight : <?php echo $row['pweight']; ?> Kg </h5>

<?php include("includes/productCalcOther.php"); ?>

<h5>Total Price : <i class="fa fa-inr"></i> <span style="font-size: 2em;"><?php echo $getFinalAmount; ?></span>.00 / Packet </h5>
	 
	</div>
	</div><!-- col-lg-5 -->
	<div class="col-lg-5">
 
	<div class="wishContent">
		<h5 style="color:#00BCD2; "><?php echo htmlentities($row['pAvail']);?></h5>
			<h5><b>Product Name :</b> <?php echo htmlentities($row['pName']);?></h5>
	</div>
 			
			<hr>
					<div class="emptyButton">
				<div class="row">
		<div class="col-lg-6">
			<a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')"><button class="buttonAddCart" type="submit">
				<i class="fa fa-times"></i>&nbsp Remove
			</button></a>
		</div>
		<div class="col-lg-6">
			<a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>"><button class="buttonAddCart" type="submit"><i class="fa fa-shopping-cart"></i>&nbsp Add</button></a>			
		</div>
	</div>
</div>
	</div>
</div>
 <hr>
<style>
	.buttonAddCart
	{
		width: 100%;
	}
</style>
<?php } } else{ ?>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<img src="assets/images/emptyCart.png" class="img-responsive" alt="">
		<h4 style="text-align: center;padding-top: 20px;">Your Wish List is empty.</h4>
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
</div><!-- myWishlist --> 
			</div><!-- ================ major columen .col-lg-9 ends ================ -->
			<div class="col-lg-3"><!-- ========= major columen .col-lg-3 starts ========= -->
<?php include ('includes/sideProducts.php'); ?>
			</div><!-- ================ major columen .col-lg-3 ends ================ -->
		</div><!-- ======================= .row ==================-->
	</div><!-- ======================= container ================ -->
</div><!-- ======================= body-content outer-top-bd ends ================ -->
<?php include('includes/brands-slider.php');?> 
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>