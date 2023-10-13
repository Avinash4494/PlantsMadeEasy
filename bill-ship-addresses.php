<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{
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
$_SESSION['msg']="Billing Address Updated Successfully !!";
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
$_SESSION['msg']="Shipping Address Updated Successfully !!";
		}
	}



?>
<!DOCTYPE html>
<html lang="en">
 	<head>
	<title>My Account</title>
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
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <a href="my-account.php">My Account</a> <i class="fa fa-chevron-right"></i> <span  class='active'>Shipping & Billing Address</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="myAccount">
					<div class="well">
					<div class="panel-group checkout-steps" id="accordion">
<!-- checkout-step-01  -->
<div class="panel panel-default" style="margin-bottom: 20px;">
	<!-- panel-heading -->
	<div class="panel-heading">
    	<h4 class="unicase">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span class="number">1</span>&nbsp Billing Address
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->
	<div id="collapseOne" class="panel-collapse collapse in">
		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
				<div class="col-md-12 col-sm-12">
<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
<form class="register-form" role="form" method="post">
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
	<div class="row">
		<div class="col-lg-3">
			<button type="submit" name="update" class="buttonAddCart">Update</button>
		</div>
		<div class="col-lg-9"></div>
	</div>
</form>
<?php } ?>
				</div>		
			</div>			
		</div><!-- panel-body  -->
	</div><!-- row -->
</div>
<!-- checkout-step-01  -->

<!-- checkout-step-02  -->
<div class="panel panel-default checkout-step-02" style="margin-bottom: -17px;">
	<div class="panel-heading">
		<h4 class="unicase-checkout-title">
		<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
			<span class="number">2</span>&nbsp Shipping Address
		</a>
		</h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse">
		<div class="panel-body">
			<?php
			$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
			while($row=mysqli_fetch_array($query))
			{
			?>
<form class="register-form" role="form" method="post">
	<div class="form-group">
		<label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
		<textarea class="form-control unicase-form-control text-input" name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
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
	<div class="row">
		<div class="col-lg-3">
			<button type="submit" name="shipupdate" class="buttonAddCart">Update</button>
		</div>
		<div class="col-lg-9"></div>
	</div>
</form>
			<?php } ?>
		</div>
	</div>
</div>
<!-- checkout-step-02  -->
					  	
					</div><!-- /.checkout-steps -->
 					</div><!-- well -->
				</div><!-- myAccount -->
			</div><!-- col-lg-8 -->
			<div class="col-lg-4">
				<?php include('includes/myaccount-sidebar.php');?>
				<div class="row">
	<div class="col-lg-12">
		<div class="moduleError">
			<?php if(isset($_POST['update']))
			{?>
			<div class="alert alert-success" id="success-alert">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong>	<br><?php echo htmlentities($_SESSION['msg']);?>
				<?php echo htmlentities($_SESSION['msg']="");?>
				<script>
					$("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
				$("#success-alert").slideUp(500);
				});
				</script>
			</div>
			<?php } ?>
	<?php if(isset($_POST['shipupdate']))
			{?>
			<div class="alert alert-success" id="success-alert">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong>	<br><?php echo htmlentities($_SESSION['msg']);?>
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
	<style>
		.alert-success{background-color: green;color: white;text-align: center;line-height: 30px;}
		button.close{color: white;}
	</style>
				
	 		</div><!-- col-lg-4 -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- body-content -->

<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
 
</body>
</html>
<?php } ?>