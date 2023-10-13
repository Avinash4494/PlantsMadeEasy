
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
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productWeight=$_POST['productWeight'];
	$productcompany=$_POST['productCompany'];
	$productPrice=$_POST['productPrice'];
 
	$productDiscount=$_POST['productDiscount'];
 
	$pr_sellingPrice=$_POST['pr_sellingPrice'];
	$productdescription=$_POST['productDescription'];
	$shippingCharge=$_POST['shippingCharge'];
	$productavailability=$_POST['productAvailability'];
	
$sql=mysqli_query($con,"update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productPrice',productDiscount='$productDiscount',pr_sellingPrice='$pr_sellingPrice',
	productDescription='$productdescription',shippingCharge='$shippingCharge',productAvailability='$productavailability' where id='$pid' ");
$_SESSION['msg']="Product Updated Successfully !!";

}
?>
<!DOCTYPE html>
<html lang="en">
<title>Utpann | Update Product</title>
	<head>
		<?php include("include/headerLinks.php"); ?>
	</head>
   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	
<body>
 <?php include('include/topHeader.php');?>
<div class="wrapperComp">
	<div class="container-fluid">
		<div class="bodyContent">
			<div class="row">
				<div class="col-lg-2">
					<?php include('include/sidebar.php');?>
					<?php include("include/alertMsg.php"); ?>
				</div>
				<div class="col-lg-10">
					<div class="sideContent">
						<div class="well">
							<div class="moduleHead">
								<h3>Update Product</h3>
							</div>
							<div class="moduleContent">
<form  name="insertproduct" method="post" enctype="multipart/form-data">
	<div class="formPannel">
	<?php
	$query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
	$cnt=1;
	while($row=mysqli_fetch_array($query))
	{
	
	?>
<div class="row">
	<div class="col-lg-4"> 
		<div class="form-group">
			<label class="controlLabel" for="basicinput">Category</label>
			<select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
<option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
<?php $query=mysqli_query($con,"select * from category");
while($rw=mysqli_fetch_array($query))
{
	if($row['catname']==$rw['categoryName'])
	{
		continue;
	}
	else{
	?>
<option value="<?php echo $rw['id'];?>"><?php echo $rw['categoryName'];?></option>
<?php }} ?>
</select>

			<label  class="controlLabel" for="basicinput">Sub Category</label>
			<select  name="subcategory"  id="subcategory" class="form-control" required>
				<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
			</select>

			<label class="controlLabel" for="basicinput">Product Company</label>
		 	<input type="text" name="productCompany"  placeholder="Enter Product Comapny Name" 
		 			class="form-control" readonly="" value="<?php echo htmlentities($row['productCompany']);?>">
		 			<label class="controlLabel" for="basicinput">Product Availability</label>
		 	<select   name="productAvailability"  id="productAvailability" class="form-control" required>
				<option value="<?php echo htmlentities($row['productAvailability']);?>"><?php echo htmlentities($row['productAvailability']);?></option>
				<option value="In Stock">In Stock</option>
				<option value="Out of Stock">Out of Stock</option>
			</select>
<label class="controlLabel" for="basicinput">Product Name</label>
			<input type="text"  name="productName"  placeholder="Enter Product Name" 
			class="form-control" required value="<?php echo htmlentities($row['productName']);?>">

 			

			

		</div><!-- form-group -->
	</div><!-- col-lg-4 -->
	<div class="col-lg-4">
		<div class="form-group">
			<label class="controlLabel">Product Weight (Kg)</label>
			<input type="text" name="productWeight" id="productWeight" class="form-control" placeholder="Enter Product Weight (Kgs)" value="<?php echo htmlentities($row['productWeight']);?>">
			<label class="controlLabel" for="basicinput">Product Price  / Kg</label>
			<input type="text" name="productPrice" id="productPrice" placeholder="Enter Product Price" class="form-control" required value="<?php echo htmlentities($row['productPrice']);?>">
			 
			<label class="controlLabel" for="basicinput">Discount %</label>
			<input type="text" name="productDiscount" id="productDiscount" placeholder="Enter Product Price" 
			class="form-control" required value="<?php echo htmlentities($row['productDiscount']);?>">
<label class="controlLabel" for="basicinput">Product Shipping Charge</label>
 			<input type="text"  id="shipCharge"  name="shippingCharge"  placeholder="Enter Product Shipping Charge" class="form-control" onfocusout="amountCalculate();" required value="<?php echo htmlentities($row['shippingCharge']);?>">
			 
            <label class="controlLabel" for="basicinput">Selling Price</label>
			<input type="text" name="pr_sellingPrice" id="pr_sellingPrice" placeholder="Enter Product Price" class="form-control" required value="<?php echo htmlentities($row['pr_sellingPrice']);?>">
        </div>
	</div><!-- col-lg-4 -->
	<div class="col-lg-4">
		<div class="form-group">
			<label class="controlLabel" for="basicinput">Product Description</label>
		<textarea  name="productDescription"  placeholder="Enter Product Description" rows="5" 
		class="form-control" required value="<?php echo htmlentities($row['productDescription']);?>">
		</textarea>
		<button type="submit" name="submit" class="buttonInsert">Update Product</button>
<style>
.formPannel input, .formPannel select , .formPannel textarea
{
border:1px solid #00BCD2;
}
.buttonInsert {
background-color: #00BCD2;
border-radius: 5px;
padding: 5px 25px;
border: 1px solid #00BCD2;
color: white;
margin-top: 25px;
width: 100%;
}
.buttonCheck{
margin-left: -15px;margin-top: 5px;
}
.imageWell .well h5
{
font-size: 0.8em;
}
</style>
			</div>
	</div><!-- col-lg-4 -->
</div><!-- row -->
<style>
	a.buttonCheck
	{
		padding: 5px 22px;
		margin-left: 5px;
		color: white;
		text-decoration: none;
	}
</style>
	<div class="row">
		<div class="col-lg-2">
			<div class="imageWell">
				<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<h5>Product Image 1 </h5>
				</div>
				<div class="col-lg-4"></div>
			</div>
			<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage1']);?>" class="img-responsive"> 
				</div><!-- well -->
				<a href="update-image1.php?id=<?php echo $row['id'];?>" target="blank" class="buttonCheck">Change Image</a>
			</div><!-- imageWell --> 
		</div><!-- col-lg-2 -->
		<div class="col-lg-2">
			<div class="imageWell">
				<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<h5>Product Image 2 </h5>
				</div>
				<div class="col-lg-4"></div>
			</div>
	 		<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage2']);?>" class="img-responsive"> 
				</div><!-- well -->
				</div><!-- imageWell -->
				<a href="update-image2.php?id=<?php echo $row['id'];?>" target="blank" class="buttonCheck">Change Image</a>
			</div><!-- imageWell --> 
		<div class="col-lg-2">
			<div class="imageWell">
				<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<h5>Product Image 3 </h5>
				</div>
				<div class="col-lg-4"></div>
			</div>
			<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage3']);?>" class="img-responsive"> 
				</div><!-- well -->
				<a href="update-image3.php?id=<?php echo $row['id'];?>" target="blank" class="buttonCheck">Change Image</a>
				</div><!-- imageWell -->
			</div><!-- col-lg-2 --> 
			</div><!-- row -->
		</div><!-- formPannel -->
	</div><!-- moduleContent -->
	<?php } ?>
</div><!-- formPannel -->
</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
<?php } ?>
<script>
	function amountCalculate()
{
var getWeight = document.getElementById('productWeight').value || 0;
var getAmount = document.getElementById('productPrice').value || 0;
var getDisRange = document.getElementById('productDiscount').value || 0; 
 
var shipCharge = document.getElementById('shipCharge').value || 0;

var getRs_Kg = getWeight*getAmount;
// var getDsicountPrice = Math.round((getAmount/100)*(getDisRange));
// var getAfterDiscount = getAmount-getDsicountPrice;
var getDiscount = Math.round((getRs_Kg/100)*(getDisRange));
var getDisAmount = getRs_Kg-getDiscount+parseInt(shipCharge);
 document.getElementById('pr_sellingPrice').value =Math.round(getDisAmount);
 
// var getGstAmount = Math.round((getDisAmount/100)*(getGstRange));
// document.getElementById('gst_charge').value =Math.round(getGstAmount);
// var getFinalAmount = getDisAmount;
// var getFinal = getFinalAmount+parseInt(shipCharge);
//
}
</script>