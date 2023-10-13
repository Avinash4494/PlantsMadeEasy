<?php
session_start();
error_reporting(0);
include('includes/config.php');
  
?>
    
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpann.com | Sin In | Sin Up</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
<body class="cnt-home" id="toTheTop">
	<header class="header-style-1">
		<?php include('includes/top-header.php');?>
	</header>
	<div class="setNavHead"></div>
<div class="body-content" id="top-banner">
	<style>
		.body-content
		{
		background-image: url(assets/images/banners/banner01.png);
		padding-bottom: 120px;	padding-top: 20px;
		margin-bottom: -20px;
		}
		.checkbox h4{font-size: 1.5em; font-weight: normal;padding-bottom: 15px;}
.checkbox h5{padding: 5px;padding-bottom: 15px;font-size: 1.2em;}
span.iconCheck {
padding: 1px;
background-color: #00bcd2;
border-radius: 50%;
color: white;
margin-right: 10px;
}
.iconCheck i{padding-left: 5px;font-size: 0.9em;}
.formwell .well{background-color: white;padding:20px;box-shadow: 0px 10px 20px 6px rgba(243, 234, 232, 0.9);}
.buttonAddCart{font-size: 1.5em;padding: 3px 25px;letter-spacing: 1px;}
	</style>
	<div class="breadCrum">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<!-- <div class="paggignation">
						<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span>Account</span></h5>
					</div> -->
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
			<div class="row">
				<div class="col-lg-4">
					<div class="checkbox hidden-xs">
						<h4>Sign Up Today And You'll Be Able To :  </h4>
						<h5><span class="iconCheck"><i class="fa fa-check"></i> </span> Speed your way through the checkout.</h5>
						<h5><span class="iconCheck"><i class="fa fa-check"></i> </span> Track your orders easily.</h5>
						<h5><span class="iconCheck"><i class="fa fa-check"></i> </span> Keep a record of all your purchases.</h5>
					</div>
				</div>
				<div class="col-lg-5">
<div class="formwell">
	<div class="well">
		<h4>Create a New Account</h4>
		<p>Create your own Shopping account.</p>
		<p> Already have an account ? <a href="login.php">Log in here</a></p>
		<div class="row">
			<div class="col-lg-12">
				<form class="register-form outer-top-xs" role="form" action="mailTrigger.php" method="post" name="register" onSubmit="return valid();">
					<input type="text" id="password" name="password" hidden="">
					<div class="form-group">
						<label class="info-title" for="fullname">Full Name <span>*</span></label>
						<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" placeholder="Full Name" required="required">
					</div>
					<div class="form-group">
						<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
						<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required  placeholder="Email Address">
						<span id="user-availability-status1" style="font-size:12px;"></span>
					</div>
					<div class="form-group">
						<label class="info-title" for="contactno">Contact No. <span>*</span></label>
						<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required placeholder="Contact Number">
					</div>
					<button type="submit" name="submit" class="buttonAddCart" id="submit">Create my account</button>
				</form>
			</div>
		</div>
	</div>
</div>
		</div><!-- col-lg-5 -->
				<div class="col-lg-3"></div>
			</div><!-- row -->
		</div><!-- formPannelAuth -->
		</div><!-- container -->
	</div><!-- loginCrum -->
</div><!-- body-content -->
<?php include('includes/footer.php');?>
</body>
</html>
 <script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
 
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>