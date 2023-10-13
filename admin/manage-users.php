
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


if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

?>
 <!DOCTYPE html>
<html lang="en">
<head>
 <title>Utpann | Manage Users</title>
  <?php include("include/headerLinks.php"); ?>
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
		<div class="col-lg-10">
			<h3>Manage Users</h3>
		</div> 
		<div class="col-lg-2">
			<?php
        $feedback_rt = mysqli_query($con,"SELECT * FROM users");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
		</div>
	</div>
</div><!-- moduleHead -->					 
<div class="moduleContent">
	<div class="moduleError">			
<?php if(isset($_GET['del']))
{?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
<?php } ?>

	</div><!-- moduleError -->
		 
<div class="tablePannel">
 <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th> Name</th>
			<th>Email </th>
			<th>Contact no</th>
			<th>Shippping Address</th>
			<th>Billing Address</th>
			<th>Reg. Date </th>
			
		</tr>
	</thead>
	<tbody>
		<?php $query=mysqli_query($con,"select * from users");
		$cnt=1;
		while($row=mysqli_fetch_array($query))
		{
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<td><?php echo htmlentities($row['name']);?></td>
			<td><?php echo htmlentities($row['email']);?></td>
			<td> <?php echo htmlentities($row['contactno']);?></td>
			<td width="290px;"><?php echo htmlentities($row['shippingAddress'].",".$row['shippingCity'].",".$row['shippingState']."-".$row['shippingPincode']);?></td>
			<td width="290px;"><?php echo htmlentities($row['billingAddress'].",".$row['billingCity'].",".$row['billingState']."-".$row['billingPincode']);?></td>
			<td><?php echo htmlentities($row['regDate']);?></td>
			
			<?php $cnt=$cnt+1; } ?>
			
		</table>
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
<?php } ?>