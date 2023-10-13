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
$row = mysqli_fetch_assoc($query);

if(isset($_GET['del']))
{
	mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
    $_SESSION['delmsg']="Product deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Utpann | Manage Products</title>
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
			<h3>Manage Products</h3>
		</div> 
		<div class="col-lg-2">
			<?php
        $feedback_rt = mysqli_query($con,"SELECT products.*,category.categoryName,subcategory.subcategory from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory");
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
			<th>Ref. Id.</th>
			<th>Product Id.</th>
			<th>Product Name</th>
			<th>Category </th>
			<th>Subcategory</th>
			<th>Company Name</th>
			<th>Product Creation Date</th>
			<th>Action</th>
			<th>Update</th>
		</tr>
	</thead>
	<tbody>
		<?php $query=mysqli_query($con,"select products.*,category.categoryName,subcategory.subcategory from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory");
		$cnt=1;
		while($row=mysqli_fetch_array($query))
		{
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<td><a href="productDetails.php?id=<?php echo $row['id']?>" target="blank">Ref <?php echo htmlentities($row['id']);?></a></td>
			<td><?php echo htmlentities($row['product_id']);?></td>
			<td><?php echo htmlentities($row['productName']);?></td>
			<td><?php echo htmlentities($row['categoryName']);?></td>
			<td> <?php echo htmlentities($row['subcategory']);?></td>
			<td><?php echo htmlentities($row['productCompany']);?></td>
			<td><?php echo htmlentities($row['postingDate']);?></td>
			<td>
				<a href="manage-products.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
					<button class="buttonTimes"><i class="fa fa-trash"></i></button>
				</a></td>
				<td>
				<a href="edit-products.php?id=<?php echo $row['id']?>" >
					<button class="buttonCheck"><i class="fa fa-pencil"></i></button>
				</a>
			</td>
			</tr>
			<?php $cnt=$cnt+1; } ?>
			
		</table>
	</div><!-- tablePannel -->
</div><!-- moduleContent -->
						</div><!-- well -->
					</div><!-- sideContent -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
<?php } ?>