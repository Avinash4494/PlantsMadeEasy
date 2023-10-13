<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}


date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  users where password='".$_POST['cpass']."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='".$_POST['newpass']."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
echo "<script>alert('Password Changed Successfully !!');</script>";
header('location:login.php');
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
 	<head>
	<title>Utpann.com My Account</title>
	<head>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
 
<body class="cnt-home">
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<div class="setNavigation"></div>
</header>
<!-- =================== HEADER : END ======================================= -->
<div class="breadcrumb">
	<div class="container-fluid">
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span  class='active'>My Account</span>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="myAccount">
			<div class="well">
<div class="panel-group" id="accordion">
<div class="panel panel-default" style="margin-bottom: 20px;">
	<!-- panel-heading -->
<div class="panel-heading">
	<h4 class="unicase">
	<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
		<span class="number">1</span> My Profile
	</a>
	</h4>
</div>
<!-- checkout-step-01 -->
<div id="collapseOne" class="panel-collapse collapse in" >
	<div class="panel-body">
		<div class="row">		
		<h4>Personal info</h4>
		<div class="col-md-12 col-sm-12">
	<?php
	$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
	?>
	<form class="register-form" role="form" method="post">
		<div class="form-group">
			<label class="info-title" for="name">Name<span>*</span></label>
			<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
		</div>
		<div class="form-group">
			<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
		</div>
		<div class="form-group">
			<label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
			<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
		</div>
		<div class="row">
			<div class="col-lg-3">
				<button type="submit" name="update" class="buttonAddCart">Update</button>
			</div>
			<div class="col-lg-9"></div>
		</div>
	</form>
	<?php } ?>
		</div><!-- class="col-md-12 col-sm-12" -->			
			</div>	<!-- row -->		
		</div><!-- panel-body  -->
	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
<!-- checkout-step-02  -->
<div class="panel panel-default checkout-step-02" style="margin-bottom: -17px;">
	<div class="panel-heading">
		<h4 class="unicase">
		<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
			<span class="number">2</span> Change Password
		</a>
		</h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse">
		<div class="panel-body">
			<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
				<div class="form-group">
					<label class="info-title" for="Current Password">Current Password<span>*</span></label>
					<input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
				</div>
				<div class="form-group">
					<label class="info-title" for="New Password">New Password <span>*</span></label>
					<input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
				</div>
				<div class="form-group">
					<label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
					<input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required" >
				</div>
				<div class="row">
					<div class="col-lg-3">
						<button type="submit" name="submit" class="buttonAddCart">Change </button>
					</div>
					<div class="col-lg-9"></div>
				</div>
			</form>
		</div>
	</div>
</div>
					  	<!-- checkout-step-02  -->
			</div><!-- panel-group -->
		</div><!-- well -->
	</div><!-- myAccount -->
</div><!-- col-lg-8 -->
	<div class="col-lg-4">
<?php include('includes/myaccount-sidebar.php');?>
 	</div><!-- col-lg-4 -->
</div><!-- row -->
 
	

</div>
</div>
<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>