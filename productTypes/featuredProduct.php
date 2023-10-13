		 
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="">
			   <h4 class="productTitle">Featured Products &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 8+ More</a></span></h4>
			</div>
			<style>
				.productTitle span a
				{
					color: #00bcd2;
				}
			</style>
			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" 
						data-item="5">
<?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{
?>	
 			    	
<div class="item item-carousel">
	<div class="productComp">
		<div class="well">
			<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<div class="productImage">
				<img style="height: 250px;" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
			</div>
<?php include("includes/prductCalc.php") ?>
<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getPrice_Pack);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;">
			<i class="fa fa-inr" ></i> <?php echo htmlentities($getFinalAmount);?>.00	</span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDis); ?>.00/Kg)</span> 
</div>
<?php if($row['productAvailability']=='In Stock'){?>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
</a>
	</div><!-- well -->
</div><!-- productComp -->
</div><!-- /.item -->
	<?php } ?>
			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div><!-- tab-pane -->
			</div><!-- tab-content -->
		</div><!-- product-tabs-slider -->

<!-- CATEGORY 8 SUB 15 -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp" style="margin-top: -95px;">
			<div class="">
			   <h4 class="productTitle">Wheat Seeds &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 8+ More</a></span></h4>
			</div>
			<style>
				.productTitle span a
				{
					color: #00bcd2;
				}
			</style>
			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" 
						data-item="7">
<?php
$ret=mysqli_query($con,"select * from products where category=8 and subCategory=15");
while ($row=mysqli_fetch_array($ret)) 
{
?>	
 			    	
<div class="item item-carousel">
	<div class="productComp">
		<div class="well">
			<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<div class="productImage">
				<img style="height: 250px;" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
			</div>
<?php include("includes/prductCalc.php") ?>
<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getPrice_Pack);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;">
			<i class="fa fa-inr" style="color:black;"></i> <?php echo htmlentities($getFinalAmount);?>.00	</span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDis); ?>.00/Kg)</span> 
</div>
<?php if($row['productAvailability']=='In Stock'){?>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
</a>
	</div><!-- well -->
</div><!-- productComp -->
</div><!-- /.item -->
	<?php } ?>
			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div><!-- tab-pane -->
			</div><!-- tab-content -->
		</div><!-- product-tabs-slider -->

<!-- CATEGORY 8 SUB 15 -->
<!-- CATEGORY 8 SUB 15 -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp" style="margin-top: -95px;">
			<div class="">
			   <h4 class="productTitle">Paddy Seeds &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 5+ More</a></span></h4>
			</div>
			<style>
				.productTitle span a
				{
					color: #00bcd2;
				}
			</style>
			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" 
						data-item="7">
<?php
$ret=mysqli_query($con,"select * from products where category=8 and subCategory=15");
while ($row=mysqli_fetch_array($ret)) 
{
?>	
 			    	
<div class="item item-carousel">
	<div class="productComp">
		<div class="well">
			<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<div class="productImage">
				<img style="height: 250px;" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
			</div>
<?php include("includes/prductCalc.php") ?>
<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getPrice_Pack);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;">
			<i class="fa fa-inr" style="color:black;"></i> <?php echo htmlentities($getFinalAmount);?>.00	</span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDis); ?>.00/Kg)</span> 
</div>
<?php if($row['productAvailability']=='In Stock'){?>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
</a>
	</div><!-- well -->
</div><!-- productComp -->
</div><!-- /.item -->
	<?php } ?>
			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div><!-- tab-pane -->
			</div><!-- tab-content -->
		</div><!-- product-tabs-slider -->

<!-- CATEGORY 8 SUB 15 -->

<!-- CATEGORY 8 SUB 15 -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp" style="margin-top: -95px;">
			<div class="">
			   <h4 class="productTitle">Gram Seeds &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 3+ More</a></span></h4>
			</div>
			<style>
				.productTitle span a
				{
					color: #00bcd2;
				}
			</style>
			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" 
						data-item="7">
<?php
$ret=mysqli_query($con,"select * from products where category=8 and subCategory=15");
while ($row=mysqli_fetch_array($ret)) 
{
?>	
 			    	
<div class="item item-carousel">
	<div class="productComp">
		<div class="well">
			<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
			<div class="productImage">
				<img style="height: 250px;" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
			</div>
<?php include("includes/prductCalc.php") ?>
<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getPrice_Pack);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;">
			<i class="fa fa-inr" style="color:black;"></i> <?php echo htmlentities($getFinalAmount);?>.00	</span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDis); ?>.00/Kg)</span> 
</div>
<?php if($row['productAvailability']=='In Stock'){?>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
</a>
	</div><!-- well -->
</div><!-- productComp -->
</div><!-- /.item -->
	<?php } ?>
			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div><!-- tab-pane -->
			</div><!-- tab-content -->
		</div><!-- product-tabs-slider -->

<!-- CATEGORY 8 SUB 15 -->