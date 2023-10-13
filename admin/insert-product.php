<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$product_id=$_POST['product_id'];
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productName=$_POST['productName'];
	$productWeight=$_POST['productWeight'];
	$productCompany=$_POST['productCompany'];
	$productPrice=$_POST['productPrice'];
	$productDiscount=$_POST['productDiscount'];
	$shippingCharge=$_POST['shippingCharge'];
	$pr_sellingPrice=$_POST['pr_sellingPrice'];
	$productDescription=$_POST['productDescription'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}
	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
$sql=mysqli_query($con,"insert into products(product_id,category,subCategory,productName,productWeight,productCompany,productPrice,productDiscount,pr_sellingPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3) values('$product_id','$category','$subcat','$productName','$productWeight','$productCompany','$productPrice','$productDiscount','$pr_sellingPrice','$productDescription','$shippingCharge','$productavailability','$productimage1','$productimage2','$productimage3')");
$_SESSION['msg']="Added Successfully !!";

}
$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query)

?>
<!DOCTYPE html>
<html lang="en">
<title>Utpann | Insert Product</title>
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
						
				</div>
				<div class="col-lg-10">
					<div class="sideContent">
						<div class="well">
							<div class="moduleHead">
								<h3>Insert Product</h3>
							</div>
							<div class="moduleContent">							 

 
<!--=========================== formPannel starts ===========================-->
<form action="" name="insertproduct" method="post" enctype="multipart/form-data">	
<div class="formPannel">

<div class="row">
	<div class="col-lg-4"> 
		<div class="form-group">
		 	<label  class="controlLabel" for="basicinput">Product Id.</label>
			<input type="text" name="product_id" id="product_id"  placeholder="Enter Product Id." class="form-control" required>

			<label class="controlLabel" for="basicinput">Category</label>
			<select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
				<option value="">Select Category</option>
				<?php $query=mysqli_query($con,"select * from category");
				while($row=mysqli_fetch_array($query))
				{?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
				<?php } ?>
			</select>

			<label  class="controlLabel" for="basicinput">Sub Category</label>
			<select  name="subcategory"  id="subcategory" class="form-control" required></select>

			

			<label class="controlLabel" for="basicinput">Product Image 1</label>
			<input type="file" name="productimage1" id="productimage1" value="" class="form-control" required >

			<label class="controlLabel" for="basicinput">Product Image 2</label>
			<input type="file" name="productimage2" id="productimage2" value="" class="form-control" required>

			<label class="controlLabel" for="basicinput">Product Image 3</label>
			<input type="file" name="productimage3" id="productimage3" value="" class="form-control" required>
		</div><!-- form-group -->
	</div><!-- col-lg-4 -->
	<div class="col-lg-4">
		<div class="form-group">
			<label class="controlLabel" for="basicinput">Product Company</label>
		 	<input type="text" name="productCompany"  placeholder="Enter Product Comapny Name" 
		 			class="form-control" value="Utpann Seeds And Beyond" readonly="">
			<label class="controlLabel">Product Weight (Kg)</label>
			<input type="text" name="productWeight" id="productWeight" class="form-control" placeholder="Enter Product Weight (Kgs)">

 			<label class="controlLabel" for="basicinput">Product Price / Kg</label>
			<input type="text" name="productPrice" id="productPrice"  placeholder="Enter Product Price" class="form-control" required>
<label class="controlLabel" for="basicinput">Discount %</label>
			<input type="text" name="productDiscount"  id="productDiscount"  placeholder="Enter Product Price" 
			class="form-control" required>
			<label class="controlLabel" for="basicinput">Product Shipping Charge</label>
 			<input type="text"  id="shipCharge"  name="shippingCharge"   placeholder="Enter Product Shipping Charge" class="form-control" onfocusout="amountCalculate();" required >

			<!-- <label class="controlLabel" for="basicinput">GST % </label>
			<input type="text" class="form-control" id="gst_range" placeholder="GST Percentage" name="gst_range" required> -->

			
 <label class="controlLabel" for="basicinput">Selling Price</label>
			<input type="text" name="pr_sellingPrice" id="pr_sellingPrice" placeholder="Enter Product Price" 
			class="form-control" required>
		<!-- 	<label class="controlLabel" for="basicinput">GST Charges</label>
            <input type="text" class="form-control" id="gst_charge" name="gst_charge" placeholder="GST Charges"  required>	 -->

           
        </div>
	</div><!-- col-lg-4 -->
	<div class="col-lg-4">
			<label class="controlLabel" for="basicinput">Product Availability</label>
		 	<select   name="productAvailability"  id="productAvailability" class="form-control" required>
				<option value="">Select</option>
				<option value="In Stock">In Stock</option>
				<option value="Out of Stock">Out of Stock</option>
			</select>

			<label class="controlLabel" for="basicinput">Product Name</label>
			<input type="text"  name="productName"  placeholder="Enter Product Name" 
			class="form-control" required >
 			 
			<label class="controlLabel" for="basicinput">Product Description</label>
		<textarea  name="productDescription"  placeholder="Enter Product Description" rows="5" 
		class="form-control" required >
		</textarea>
		 
		<button type="submit" name="submit" class="buttonInsert">Insert</button>
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
		</style>
	</div><!-- col-lg-4 -->
</div><!-- row -->
</div><!-- formPannel -->
</form>
<!--=========================== formPannel ends ===========================-->	
							</div><!-- moduleContent -->
						</div><!-- well -->
					</div><!-- sideContent -->
					<?php include("include/alertMsg.php"); ?>
					<style>
		.alert-success{background-color: green;color: white;text-align: center;line-height: 30px;margin: 0px;
			padding: 5px;}
		button.close{color: white;}
	</style>
				</div><!-- col-lg-10 -->
			</div><!-- row -->
			</div><!-- bodyContent -->
		
		</div><!-- container-fluid -->
	</div><!-- wrapperComp -->
<?php include('include/footer.php');?>
</body>
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

