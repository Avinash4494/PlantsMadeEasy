<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Pending Orders</title>
</head>
<body>
<?php include('include/topHeader.php');?>
<div class="wrapperComp">
		<div class="container-fluid">
			<div class="bodyContent">
				<div class="row">
				<div class="col-lg-2">
					<?php include('include/sidebar.php');?>
				</div>
				<div class="col-lg-10">
					<div class="sideContent">
						<div class="well">
<div class="moduleHead">
	<div class="row">
		<div class="col-lg-8">
			<h3>Pending Orders</h3>
		</div> 
		<div class="col-lg-4">
		</div>
	</div>
</div><!-- moduleHead -->					 
<div class="moduleContent">
	<div class="moduleError">
	</div><!-- moduleError -->
	<div class="tablePannel">
	</div><!-- tablePannel -->
</div><!-- moduleContent -->
						</div><!-- well -->
					</div><!-- sideContent -->
				</div><!-- col-lg-10 -->
			</div><!-- row -->
		</div><!-- bodyContent -->
	</div><!-- container-fluid -->
</div><!-- wrapperComp -->
<?php include('include/footer.php');?>
</body>
</html>
 