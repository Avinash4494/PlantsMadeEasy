
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	 
	$productimage1=$_FILES["productimage1"]["name"];
//$dir="productimages";
//unlink($dir.'/'.$pimage);
	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$pid/".$_FILES["productimage1"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage1='$productimage1' where id='$pid' ");
$_SESSION['msg']="Image Updated Successfully !!";

}
?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Utpann | Update Image</title>
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
			<h3>Update Product Image</h3>
		</div> 
		<div class="col-lg-4">

		</div>
	</div>
</div><!-- moduleHead -->
<style>
	.buttonUpdate {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
text-align: center;
border: 1px solid #00BCD2;
color: white;
width: 100%;
}
.buttonClose {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
margin-top: 7px;
border: 1px solid #00BCD2;
color: white;
width: 100%;
}
.moduleContent{padding: 20px;}
.moduleContent img{height: 300px;}
.moduleContent h5{padding-left: 5px;font-weight: bold;}
</style>					 
<div class="moduleContent">
 <div class="row">
 	<div class="col-lg-10"></div>
 	<div class="col-lg-2">
 		<button name="Submit2" type="submit" class="buttonClose" onClick="return f2();"><i class="fa fa-times"></i> Close Window </button>
 	</div>
 </div> 
	<div class="tablePannel">
		<form name="insertproduct" method="post" enctype="multipart/form-data">

<?php 
$query=mysqli_query($con,"select * from products where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  
?>
<div class="row">
	<div class="col-lg-3">
		<h5>Current Product Image</h5>
		<ul class="list-group" >
            <li class="list-group-item" style="padding: 0px;">
            	<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage1']);?>" class="img-responsive"> 
            </li>
        </ul>
	</div>
	<div class="col-lg-9">
		<h5>Product Details</h5>
		<div class="row">
			
			<div class="col-lg-4">
				<ul class="list-group">
					 <li class="list-group-item">Product Name  :  Ref 
              <?php echo htmlentities($row['productName']);?> </li>
            <li class="list-group-item">Reference Id. :  Ref 
              <?php echo htmlentities($row['id']);?> </li>
          </ul>
			</div>
			<div class="col-lg-4">
				<ul class="list-group">
              <li class="list-group-item">Product Id :  
              <?php echo htmlentities($row['product_id']);?> </li>
           <li class="list-group-item">Product Weight :  
              <?php echo htmlentities($row['productWeight']);?> Kg </li>
          </ul>
				
			</div>
			<div class="col-lg-4">
				<ul class="list-group">
            <li class="list-group-item">Product Price : 
              <i class="fa fa-inr"></i> <?php echo htmlentities($row['productPrice']);?>.00</li>
               <li class="list-group-item">Total Amount : 
              <i class="fa fa-inr"></i> <?php echo htmlentities($row['pr_sellingPrice']);?>.00</li>
          </ul>
				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-6">
						<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
					</div>
					<div class="col-lg-6">
						<button type="submit" name="submit" class="buttonUpdate">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 

<?php } ?>
 
</form>

	</div><!-- tablePannel -->
</div><!-- moduleContent -->
						</div><!-- well -->
					</div><!-- sideContent -->
					<div class="row">
						<div class="col-lg-4"></div>
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
										<?php if(isset($_POST['submit']))
{?>
	<div class="alert alert-success" id="success-alert">
				<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?>
				<?php echo htmlentities($_SESSION['msg']="");?>
				<script>
					$("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
				$("#success-alert").slideUp(500);
				});
				</script>
			</div>
			<style>
		.alert-success{background-color: green;color: white;text-align: center;padding: 10px;margin: 0px;}
		button.close{color: white;}
	</style>
<?php } ?>
						</div>
					</div>
				</div><!-- col-lg-10 -->
			</div><!-- row -->
		</div><!-- bodyContent -->
	</div><!-- container-fluid -->
</div><!-- wrapperComp -->
<?php include('include/footer.php');?>
</body>
</html>
<?php } ?>