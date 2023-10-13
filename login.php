<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration


// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="my-cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");

exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']= "Invalid email id or Password";
exit();
}
}
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
		padding-bottom: 120px;	padding-top: 50px;
		margin-bottom: -20px;
		}
		.formwell .well{background-color: white;padding:20px;box-shadow: 0px 10px 20px 6px rgba(243, 234, 232, 0.9);}
.buttonAddCart{font-size: 1.5em;padding: 3px 25px;letter-spacing: 1px;}
	</style>
	<div class="breadCrum">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					 
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
				<div class="col-lg-4"></div><!-- col-lg-4 -->
				<div class="col-lg-4">
					<div class="formwell">
	<div class="well">
							<h4 class="">Sign In</h4>
	<p>Hello, Welcome to your account.</p>
	<p>Don't have an account? <a href="regis.php">Create One</a> </p>
						<form class="register-form outer-top-xs"  method="post">
 
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email Address">
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Password">
		</div>
 
	  	<div class="row">
	  		<div class="col-lg-6">
	  			<button type="submit" class="buttonAddCart" name="login">Login</button>
	  		</div>
	  		<div class="col-lg-6">
	  			<a href="forgot-password.php" class="forgot-password pull-right">Forgot your Password?</a>
	  		</div>
	  	</div>
	   



<span style="color: red;">
	 <?php
echo htmlentities($_SESSION['errmsg']);
?>
</span>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</form>	
	</div>
</div>


				</div>
 
				<div class="col-lg-4">
				</div><!-- col-lg-6 -->
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