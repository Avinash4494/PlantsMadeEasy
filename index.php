<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		// echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
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
		<title>Utpann.com Home</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home" id="toTheTop">
<!-- =============== HEADER ========================== -->
<header class="header-style-1">
	<?php include('includes/top-header.php');?>
</header>
<div class="setNavigation"></div>
<!-- ===================== HEADER : END ============================ -->
<div class="body-content" id="top-banner-and-menu">
	

<!-- ================ SECTION – HERO =============================== -->		
<?php include('includes/sliderIndex.php') ?>	
<section>
	<div class="welcome">
		<h1>Welcome to Utpann Seeds And Beyonds</h1>
		<h4>EXPORTER & INTERNATIONAL TRADER AND PRODUCER OF AGRICULTURAL COMMODITIES</h4>
	</div>
	<style>
		.welcome h1{text-align: center;font-weight: bold;letter-spacing: 1px;color: black;}
		.welcome h4{text-align: center;font-weight: bold;letter-spacing: 1px;color: #00bcd2;padding-bottom: 20px;}
	</style>
</section>
<?php include("includes/productCategory.php"); ?>
	<div class="container-fluid">
		 
 		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
<section id="howItWorksPannel">
	<div class="howItWorks">
		<h1>How it works?</h1>
	</div>
	<div class="workSection">
		<div class="row">
			<div class="col-lg-4 col-xs-4">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<img src="assets/images/banners/how01.png" alt="" class="img-responsive">
					</div>
					<div class="col-lg-4"></div>
				</div><br>
				<h4>Create an account <br>
and add your ZIP-CODE</h4>  
<div class="iconComp">
	<i class="fa fa-chevron-right"></i>
</div>
			</div>
			<div class="col-lg-4 col-xs-4">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<img src="assets/images/banners/how02.png" alt="" class="img-responsive">
					</div>
					<div class="col-lg-4"></div>
				</div><br>
				<h4>Select products <br>
you want to buy</h4>  
<div class="iconComp">
	<i class="fa fa-chevron-right"></i>
</div>
			</div>
			<div class="col-lg-4 col-xs-4">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<img src="assets/images/banners/how03.png" alt="" class="img-responsive">
					</div>
					<div class="col-lg-4"></div>
				</div><br>
				<h4>We will deliver your <br>
shopping to your door</h4>  
 
			</div>
		</div>

	</div>
</section>

<?php include('productTypes/featuredProduct.php') ?>
<?php include('productTypes/categoryProduct.php') ?>
<!-- =======================SCROLL TABS ENDS ============================ -->
 
		<!-- ============================================== TABS : END ============================================== -->

</div>
</div>
 
</div>
</div>
<?php include('includes/customerReview.php') ?>

<?php include('includes/footer.php');?> 
 
</body>
</html>
<style>
	.custom-carousel .owl-controls .owl-prev:hover,
.custom-carousel .owl-controls .owl-next:hover,
.custom-carousel .owl-controls .owl-prev:focus,
.custom-carousel .owl-controls .owl-next:focus {
    background: #00bcd2;
}
	.custom-carousel .owl-controls {
    position: absolute;
    right: 0;
     
    width: 100%;
    display: block;
}

.custom-carousel .owl-controls .owl-prev {
    position: absolute;
    width: 20px;
    height: 20px;
    top: -10px;
    right: 27px;
    -webkit-transition: all linear 0.2s;
    -moz-transition: all linear 0.2s;
    -ms-transition: all linear 0.2s;
    -o-transition: all linear 0.2s;
    transition: all linear 0.2s;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: #00bcd2;
}

.custom-carousel .owl-controls .owl-prev:before {
    color: #fff;
    content: "\f104";
    font-family: fontawesome;
    font-size: 13px;
    left: 8px;
    position: absolute;
    top: 0px;
}

.custom-carousel .owl-controls .owl-next {
    position: absolute;
    width: 20px;
    height: 20px;
    top: -10px;
    right: 0px;
    -webkit-transition: all linear 0.2s;
    -moz-transition: all linear 0.2s;
    -ms-transition: all linear 0.2s;
    -o-transition: all linear 0.2s;
    transition: all linear 0.2s;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: #00bcd2;
}
</style>