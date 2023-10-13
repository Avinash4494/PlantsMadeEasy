<section class="section featured-product wow fadeInUp">
	<h3 class="sectionTitle">Realted Products </h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs " data-item="5">
	   
		<?php 
$qry=mysqli_query($con,"select * from products where subCategory='$subcid' and category='$cid'");
while($rw=mysqli_fetch_array($qry))
{

			?>	
	    	
<div class="item item-carousel">
<div class="productComp">
	<div class="well">
			<div class="products">
		<div class="product" style="margin-top: 20px;">
<div class="well">
				<div class="product-image">
				<div class="image">
					<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"><img  src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($rw['id']);?>/<?php echo htmlentities($rw['productImage1']);?>" alt="" class="img-responsive"></a>
				</div><!-- /.image -->
			</div><!-- /.product-image -->
<div class="productInfo">
	<h4 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h4>
	 
	 
	<div class="product-price">
		<strike>
			<span class="price-before-discount">
		MRP Rs.	<?php echo htmlentities($row['productPriceBeforeDiscount']);?>/Kg		
		</span>
		</strike>&nbsp 
		<span class="price">Rs.<?php echo htmlentities($row['productPrice']);?>/Kg	</span>
		</div><!-- /.product-price -->
		</div><!-- /.product-info -->
<?php if($row['productAvailability']=='In Stock'){?>
<div class="row">
	<div class="col-lg-12">
		<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class=""><button class="buttonAddCart" type="submit"><i class="fa fa-shopping-cart"></i>&nbsp Add to Cart</button></a></div>
	</div> 
</div>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
<?php } ?>
</div><!-- product well -->
		</div><!-- /.product -->
	</div><!-- /.products -->
	</div><!-- productComp well -->
</div><!-- productComp -->
</div><!-- /.item -->
		<?php } ?>
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->