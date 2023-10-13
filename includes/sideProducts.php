 <?php 
 if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:my-wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
	}
} ?>
		<div class="sideOrders">
	<div class="well" >	
		<?php 
		$ret=mysqli_query($con,"select * from products");
		$row=mysqli_fetch_array($ret)  ?>
		<h5 style="font-size: 1.3em;padding: 5px 10px;color: black;">Customers who shopped for <?php echo htmlentities($row['productName']);?>,... also shopped for:</h5><br>
		 
<?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{
?>
<style type="text/css">
	.sideOrders .well
	{
		background-color: white;
		padding: 0px;
	}
	.moreProducts .well
	{
		padding: 0px;
		margin-top: -20px;
	}
	.moreProducts .well .buttonAddCart
	{
		padding: 5px;
		margin-top: -25px;
		position: relative;
		margin-left: -10px;
	}
</style>
<div class="moreProducts" style="margin-bottom: -20px;">
<div class="well" >
<div class="row">
	<div class="col-lg-4">
		<style>
			.productImage{margin: 5px;}
		</style>
		<div class="productImage">
			<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive"></a>
		</div>
	</div>
	<div class="col-lg-8">

		<h5 style="font-size: 1.2em;padding-top: 5px;"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<?php echo htmlentities($row['productName']);?></a></h5>

<?php 
		"Get Weight ".$getWght  = htmlentities($row['productWeight']);
		"Get Price ".$getAmt = htmlentities($row['productPrice']);
		"Get Discount % ".$getDisRng = htmlentities($row['productDiscount']);
		"Get Gst_range ".$getGstRange = htmlentities($row['gst_range']);
		"Get Gst_range ".$pr_sellingPrice = htmlentities($row['pr_sellingPrice']);
			"Get shippingCharge % ".$shippingCharge = htmlentities($row['shippingCharge']);

		"Get Price per pack" .$getPrice_Pack = $getWght*$getAmt;
 "Get  Discount Calculation ".$getDisPrice = round(($getAmt/100)*($getDisRng));
		"Get Discount Amount ".$getAfterDis = $getAmt-$getDisPrice;

		"Get Discount Amt ".$getDis = round(($getPrice_Pack/100)*($getDisRng));
	"Get Amt After Discount ".$getDisAmt = $getPrice_Pack-$getDis+$shippingCharge;

?>

			<span class="price" style="font-size: 1em;"><i class="fa fa-inr"></i><?php echo htmlentities($getDisAmt);?>.00	</span>&nbsp 
		<strike>
			<span class="price-before-discount">

				MRP <i class="fa fa-inr"></i>	<?php echo htmlentities($getPrice_Pack);?>.00		
			</span>
		</strike>&nbsp 
		<br><br>
		<div class="row">
			<div class="col-lg-6">
			<!-- 	<a data-toggle="tooltip" data-placement="right" title="Cart" href="my-cart.php?page=product&action=add&id=<?php echo $row['id']; ?>" >
					<button class="buttonAddCart"  type="submit">
						<i class="fa fa-shopping-cart"></i>
					</button>
				</a> -->
			</div>
			<div class="col-lg-6">
				<?php if($row['productAvailability']=='In Stock'){?>
				<a  data-toggle="tooltip" data-placement="top" title="Wishlist" class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
		<button class="buttonAddCart" type="button"><i class="fa fa-heart"></i></button></a>
		<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
			</div>
		</div>
	</div>
</div>
</div><!-- well -->
		</div><!-- moreProducts -->


			
		<?php } ?>
	</div>
</div>