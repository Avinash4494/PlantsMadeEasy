<?php
session_start();
error_reporting(0);
include('includes/config.php');
$find="%{$_POST['product']}%";
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
						echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
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
	<title>Utpann.com Find Products</title>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
    <body class="cnt-home">
<!-- ============================= HEADER ====================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
</header>
<div class="setNavigation"></div>
<!-- =============== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container-fluid">
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Products</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class='container-fluid'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-2 sidebarTab'>
<!-- ============================ TOP NAVIGATION ========================== -->
<?php include("includes/categorySideBar.php");?><hr />
<?php include("includes/subCategorySideBar.php");?>
<!-- ====================== TOP NAVIGATION : END ========================== -->	
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
<!-- ========================== SECTION – HERO ============================ -->
<div class="search-result-container">
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active " id="grid-container">
			<div class="category-product  inner-top-vs">
				<div class="row">									
			<?php
$ret=mysqli_query($con,"select * from products where productName like '$find'");
$num=mysqli_num_rows($ret);
$cnt = 1;
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>							
<div class="col-sm-6 col-lg-3">
	<style>
		.shoppingCart .well
		{
			padding: 5px;
		}
	</style>
	<div class="shoppingCart">
		<div class="well">
			<div class="row">
				<div class="col-lg-12">
					<div class="product-image">
					<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive"></a>			                      	
				</div><!-- /.product-image -->
						<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>

			<div class="product-price">	
			<strike>
			<span class="price-before-discount">
		MRP <i class="fa fa-inr"></i> <?php echo htmlentities($row['productPriceBeforeDiscount']);?>/Kg		
		</span>
		</strike>&nbsp 
		<span class="price"><i class="fa fa-inr"></i> <?php echo htmlentities($row['productPrice']);?>/Kg	</span>					
			</div><!-- /.product-price -->
		</div><!-- /.product-info -->
				<div class="cartAction">
			<?php if($row['productAvailability']=='In Stock'){?>
					<div class="row">
						<div class="col-lg-6">
							<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
							<button class="buttonAddCart" type="button"><i class="fa fa-shopping-cart"></i></button></a>
						</div>
						<?php } else {?>
							<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
						<div class="col-lg-6">
							<a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">
								<button class="buttonAddCart" type="button"><i class="icon fa fa-heart"></i></button></a>
						</div>
					</div>
			</div><!-- /.cart -->
				</div><!-- col-lg-12 -->
			</div>
		</div>
	</div>
</div><!-- col-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.category-product -->
		</div><!-- /.tab-pane -->
	</div><!-- /.search-result-container -->
</div><!-- /.col -->
	  <?php }
	   ?>
	   <?php 
$retrieve=mysqli_query($con,"select count(id) from products");
$numCount=mysqli_num_rows($retrieve);?>
	   <h5 style="position: absolute;margin-top: -430px;">Showing <b><?php echo $cnt;?></b> Record of <?php echo $numCount; ?> Products</h5>
	   <?php
	} 
	  else {?>
		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>
<?php } ?>	
	</div><!-- col-md-9 -->
</div><!-- row -->
<?php include('includes/brands-slider.php');?>

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>