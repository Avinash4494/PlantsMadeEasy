 	<style>
		.ProductComponent
		{
			margin-top: -75px;
		}
	.sectionTitle
	{
		margin-bottom: -15px;
		}
	</style>
<div class="ProductComponent">
	<div class="row">
<div class="col-md-6">
	 <h4 class="productTitle">Onion Seeds &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 3+ More</a></span></h4>
<section class="section">
	<div class="product-slider">
	<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="3">
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
							<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
						</div>
 <?php include("includes/prductCalc.php") ?>
					<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getRs_Kg);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;"><i class="fa fa-inr"  style="color:black;"></i> <?php echo htmlentities($getFinalAmount);?>.00	</span></span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDiscount); ?>.00/Kg)</span> 
</div>
						<?php if($row['productAvailability']=='In Stock'){?>
						<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
						<?php } ?>
					</a>
					</div><!-- well -->
				</div><!-- productComp -->
			</div><!-- /.item -->
		<?php }?>
	</div>
</div>
</section>
</div>
<style>
	.section{margin-top: 30px;}
</style>
<div class="col-md-6">
	 <h4 class="productTitle">Pulses Seeds &nbsp 
			   	<span style="font-size: 0.6em;font-weight: normal;text-decoration: underline;color: #00bcd2;"><a href="Products.php">View 3+ More</a></span></h4>
<section class="section">
	<div class="product-slider">
	<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="3">
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
							<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="img-responsive">
						</div>
 <?php include("includes/prductCalc.php") ?>
					<div class="productDetails">
	<h4> <?php $productName = htmlentities($row['productName']);
	echo substr($productName, 0,20);
	?> </h4>
	<h5><?php echo htmlentities($getDisRange);?>% Off &nbsp &nbsp MRP <strike><i class="fa fa-inr"  style="color:black;"></i>
		<?php  echo htmlentities($getRs_Kg);?>.00</strike></h5>
		<span> <span style="font-size: 1.3em;font-weight: bold;"><i class="fa fa-inr"  style="color:black;"></i> <?php echo htmlentities($getFinalAmount);?>.00	</span></span> &nbsp 
		<span style="font-size: 1.1em;">(<?php echo round($getAfterDiscount); ?>.00/Kg)</span> 
</div>
						<?php if($row['productAvailability']=='In Stock'){?>
						<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
						<?php } ?>
					</a>
					</div><!-- well -->
				</div><!-- productComp -->
			</div><!-- /.item -->
		<?php }?>
	</div>
</div>
</section>
</div>
				</div>
			</div>