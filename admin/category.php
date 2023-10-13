
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
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
$sql=mysqli_query($con,"insert into category(categoryName,categoryDescription) values('$category','$description')");
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  }
?>

 <!DOCTYPE html>
<html lang="en">
<head>
 <title>Utpann | Product Category</title>
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
		<div class="col-lg-8">
			<h3>Manage Category Products</h3>
		</div> 
		<div class="col-lg-4">
		</div>
	</div>
</div><!-- moduleHead -->					 
<div class="moduleContent">
	<div class="moduleError">			
<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php } ?>
<?php if(isset($_GET['del']))
{?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
<?php } ?>
	</div><!-- moduleError -->
		<div class="moduleAdd">
		<div class="well">
	<div class="formPannel">
		<form class="" name="Category" method="post" >
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="" class="controlLabel">Category Name</label>
						 
						<input type="text" placeholder="Enter category Name"  name="category" 
						class="form-control" required>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="" class="controlLabel">Description</label>
							<input type="text" placeholder="Product Description"  name="description" 
						class="form-control" required>
						</div>
					</div>
					<div class="col-lg-2">
						<button type="submit" name="submit" class="buttonInsert">Create</button>
					</div>
					<style>
.buttonInsert {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    margin-top: 35px;
    width: 100%;
}
					</style>
				</div>
			</form>
	</div>
		</div>
	</div>
<div class="tablePannel">
 <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Category</th>
			<th>Description</th>
			<th>Creation date</th>
			<th>Last Updated</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $query=mysqli_query($con,"select * from category");
		$cnt=1;
		while($row=mysqli_fetch_array($query))
		{
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<td><?php echo htmlentities($row['categoryName']);?></td>
			<td><?php echo htmlentities($row['categoryDescription']);?></td>
			<td> <?php echo htmlentities($row['creationDate']);?></td>
			<td><?php echo htmlentities($row['updationDate']);?></td>
			<td>
				<a href="edit-category.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
				<a href="category.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
					<button class="buttonTimes"><i class="fa fa-trash"></i></button>
				</a></td>
			</tr>
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