<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$admin_id=$_POST['admin_id'];
	$password=$_POST['password'];
$ret=mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="AdminDashboard.php";//
$_SESSION['alogin']=$_POST['admin_id'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Log in to Utpann</title>
 <?php include("include/headerLinks.php"); ?>
<body>
	<style>
		.wrapper
		{
			background-image: url(images/banner01.png);
			background-size: cover;
			height: 100%;
			background-repeat: no-repeat;
			background-position:bottom;
			padding-bottom: 145px;
			background-color: #EAEDED;
		}
		.formPannel .well{
			margin-top: 80px;
			padding: 20px;
			background-color: white;
			border-radius: 10px;		
			box-shadow: 0px 20px 20px 10px rgba(243, 234, 232, 0.7);	
		}
		.loginHead h3
		{
			margin: 0px;
			text-align: center;
			font-weight: bold;
			letter-spacing: 1px;
			padding: 15px;
		}
		.formPannel .well input
		{
			margin-top:25px;
			padding: 20px; 
		}
.buttonInsert {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    margin-top: 25px;
    width: 100%;
    font-size: 1.2em;
}	 
	</style>
 <div class="wrapper">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-2">
 				<img src="images/logo.png" class="img-responsive" alt="" style="margin-top: 30px;">
 			</div>
 			<div class="col-lg-9"></div>
 		</div>
 	</div>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-4"></div>
 			<div class="col-lg-4">
<div class="formPannel">
	<div class="well">
		<form class="form-vertical" method="post">
	<div class="loginHead">
		<h3>Log In</h3>
	</div>
	 <h5 style="text-align: center;color: red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></h5>
	 
		<div class="control-group">
			<div class="controls row-fluid">
				<input class="form-control" type="text" id="inputEmail" name="admin_id" placeholder="Username">
			</div>
		</div>
		<div class="control-group">
			<div class="controls row-fluid">
				<input class="form-control" type="password" id="inputPassword" name="password" placeholder="Password">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<button type="submit" class="buttonInsert" name="submit">Login</button>
			</div>
			<div class="col-lg-3"></div>
		</div>
	 
 
</form>
	</div>
</div>
 			</div>
 			<div class="col-lg-4"></div>
 		</div>
 	</div>
 </div>
</body>