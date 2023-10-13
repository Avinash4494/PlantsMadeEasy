<?php 
session_start();
error_reporting(0);
include('includes/config.php');  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpann.com | Forgot Password</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
<body class="cnt-home" id="toTheTop">
	<header class="header-style-1">
		<?php include('includes/top-header.php');?>
	</header>
	<div class="setNavHead"></div>
<div class="body-content" id="top-banner">
	<div class="breadCrum">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<div class="paggignation">
						<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i>  
							<a href="login.php">Account </a>  <i class="fa fa-chevron-right"></i> <span>Forgot Password</span></h5>
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
				</div><!-- col-lg-3 -->
			</div><!-- row -->
		</div><!-- container-fluid -->
	</div><!-- breadCrum -->
	<div class="loginCrum">
		<div class="container">
			<div class="formPannelAuth">
	<form class="register-form outer-top-xs" name="register" method="post" action="passCheck.php">

	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
				<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
					<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Registered Email Id" required >
		</div>
 
		</div>
<!-- 		<div class="col-lg-4">
			<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Contact no <span>*</span></label>
		 <input type="text" name="contact" placeholder="Registered Contact Number" class="form-control unicase-form-control text-input" id="contact" required>
		</div>
			

<div class="form-group">
	    	<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required >
	  	</div>		
	  
		</div> -->
		<div class="col-lg-4"></div>
	</div>
	<div class="row">
		<div class="col-lg-5"></div>
		<div class="col-lg-2">
				<button type="submit" class="buttonAddCart" name="change" style="font-size: 1.2em;letter-spacing: 1px;">Submit</button>
		</div>
		<div class="col-lg-5"></div>
	</div>
	</form>
		</div><!-- formPannelAuth -->
		</div><!-- container -->
	</div><!-- loginCrum -->
</div><!-- body-content -->

<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
</body>
</html>
 