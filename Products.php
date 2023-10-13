 <?php session_start();
error_reporting(0);
include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpannseeds.com | Our Products</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
<body class="cnt-home" id="toTheTop">
	<header class="header-style-1">
	<?php include('includes/top-header.php');?>
	</header>
	<div class="setNavHead"></div>
	<div class="body-content" id="top-banner">
		<div class="sectionPagin" >
					<div class="container">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-6">
								<div class="emptyHead"></div>
<div class="searchFormColl">
	<form name="search" method="post" action="search-result.php">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-10">
					<input class="form-control" placeholder="Search for Product..." name="product" required="required" />
				</div>
				<div class="col-lg-2">
					<button class="buttonSearch" type="submit" name="search"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
	</form>
</div>
<style>
	.searchFormColl input{padding:25px;overflow: hidden;font-size: 2em;}
	.searchFormColl .buttonSearch{margin-left: -80px;font-size: 1.5em;padding-bottom: 12px;}
</style>
							</div>
							 
							<div class="col-lg-4">
								<div class="emptyHead"></div>
								<div class="pagigHead">
									<h3>Our Products</h3>
									<h5><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-chevron-right"></i> Our Products</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
		<div class="container-fluid">
			<div class="WrapperContainer">
 		 <div class="breadCrum">
	 	<div class="row">
	 		<div class="col-lg-9">
	 			<div class="paggignation">
	 		<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span>Our Products</span></h5>
	 	</div>
	 		</div>
	 		<div class="col-lg-3">
	 					<div class="moduleError">
			<?php if(isset($_POST['submit']))
			{?>
			<div class="alert alert-success" id="success-alert">
				 
				<strong>Well done !</strong>	<?php echo htmlentities($_SESSION['msg']);?>
				<?php echo htmlentities($_SESSION['msg']="");?>
				<script>
					$("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
				$("#success-alert").slideUp(500);
				});
				</script>
			</div>
			<?php } ?>
		</div><!-- moduleError -->
	 		</div>
	 	</div>
	 </div>
	 <?php include("productTypes/allProduct.php") ?>
			</div>
		</div>
	</div>
	<?php include('includes/brands-slider.php');?>
	<?php include('includes/footer.php');?>
</body>
</html>
 