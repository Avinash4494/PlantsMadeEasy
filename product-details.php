<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					// echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
// echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');
}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Utpann.com Product Details</title>
	    <?php include 'headerLinks/header_Links.php' ?>
	</head>
<body class="cnt-home">
<header class="header-style-1">
<!-- ============= TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ================= TOP MENU : END ======================================== -->
</header>
<div class="setNavigation"></div>
<!-- =============== HEADER : END ============================================== -->
<div class="breadCrum">
	<div class="container-fluid">	 
		<h5><?php
		$ret=mysqli_query($con,"select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
		while ($rw=mysqli_fetch_array($ret)) {
		?>
		<a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <a href="Products.php">Products</a> <i class="fa fa-chevron-right"></i> 
			<span class='active'><?php echo htmlentities($rw['pname']);?></span>
		<?php }?></h5>
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class='container-fluid'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-lg-9'>
				<?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{
?>
<div class="productDetails">
	<div class="well" >

<div class="row">
	<div class="col-xs-12 col-sm-6 col-lg-3 gallery-holder">
		    <div class="product-item-holder size-big single-product-gallery small-gallery">
        		<div id="owl-single-product">
 			<div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350" />
                </a>
            </div>
            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" />
                </a>
            </div>
        </div><!-- /.single-product-slider -->
        <div class="single-product-gallery-thumbs gallery-thumbs">
            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive"  alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" />
                    </a>
                </div>
            	<div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>"/>
                    </a>
            	</div>
            	<div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" height="200" />
                    </a>
                </div>
            </div><!-- /#owl-single-product-thumbnails -->
        </div>
    </div>
	</div>     
	<!-- =============================== PRODUCT DETAILS STARTS========================== -->			
	<div class='col-sm-6 col-lg-6' >
		<style>
			.productName{
				font-size: 1.7em;margin: 0px;
				color: #00BCD2;
				font-weight: bold;
				letter-spacing: 1px;
			}
		</style>
		<h3 class="productName"><?php echo htmlentities($row['productName']);?></h3>
		<div class="productInfo">
		<div class="stockContainer" style="margin-top: -25px;">
			<div class="row">
				<div class="col-lg-4">

					<span class="labelName">Brand Name :</span><br>
					<span class="labelName">Seller Name :</span><br>
					<span class="labelName">Availability :</span>
				</div>
				<div class="col-lg-8">
					<span class="labelValue"><?php echo htmlentities($row['productCompany']);?> </span> <br>
					<span class="labelValue"><?php echo htmlentities($row['productCompany']);?> Seeds and beyond</span> <br>
			<span style="color: #00BCD2;" class="labelValue"><?php echo htmlentities($row['productAvailability']);?></span>
				</div>
			</div><!-- /.row -->
		</div>
<div class="priceContainer">
	<div class="row">
		<div class="col-lg-4">
			<div class="price-box">
				<span>Weight :  </span><br><br>
				<span>Price: </span><br>
				 
			</div>
		</div>
		<div class="col-lg-8" >
<?php include("includes/prductCalc.php") ?>

			<span><?php echo $getWeight ?> Kgs / Packet</span>
			<br>
			<span style="font-size: 0.9em;">
				M.R.P. : <strike>
					<span class="priceStrike"><i class="fa fa-inr"></i>&nbsp<?php echo htmlentities(
						$getPrice_Pack);?>.00 / Pack
					</span>
						</strike> 
			</span><br>
			<div class="row">
				<div class="col-lg-7">
					<span style="font-size: 1.3em;color: #00BCD2;"><i class="fa fa-inr"></i> 
						<b><?php  echo $getFinalAmount;?>.00</b>
						<span style="font-size: 0.9em;">/Pack</span>
					</span>
				</div>
				<div class="col-lg-4">
					<span style="font-size: 0.9em;margin-left: -20px;">
					 (<?php  echo htmlentities($getAfterDiscount);?>.00/Kg)
				</span>
				</div>
			</div>
			 
			<span class="labelName" style="font-size: 0.9em;">Inclusive of all taxes</span>

		</div>
	</div><!-- /.row -->
</div><!-- /.price-container -->

<style>
	.purchaseContainer .minimum
	{
		background-color: #00BCD2;
		padding: 0px 15px;
		border-radius: 3px;
		color: white;
	}
</style>
<hr>
<!-- <div class="purchaseContainer">
	<span class="labelName minimum">Minimum Order : 100 Kgs</span><br>
	<?php echo $row['product_id']; ?>
</div> -->
	<div class="quantityContainer">
	 

	</div><!-- /.quantity-container -->
	</div><!-- /.product-info -->
</div><!-- /.col-sm-7 -->
<!-- =============================== PRODUCT DETAILS ENDS========================== -->
<div class="col-lg-3">
	<div class="emptyTrace"></div>
		<div class="expectedDelivery">			
			<?php $date = strtotime("+7 day");$deliveryDate = date('M d, Y', $date);?>
			<span class="labelName" style="font-size: 1em;">Expected Delivery On <br> <?php echo $deliveryDate; ?></span><br>
		</div>
		<div class="stockContainer">
	<div class="row">
 
	<div class="col-lg-12">
					<span class="labelName">Shipping Charge : <i class="fa fa-inr">&nbsp </i><?php if($row['shippingCharge']==0)
					{
						echo "Free";
					}
					else
					{
						echo htmlentities($row['shippingCharge']);
					}
				?>.00</span>
	</div>
</div>
</div>
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>		
<div class="ratingReviews">
	<div class="row">
		<div class="col-lg-12">
			<div class="reviews">
				<i style="color: #00BCD2;" class="fa fa-star"></i>&nbsp 
				<a data-toggle="tab" href="#reviewTab" >
					( <?php echo htmlentities($num);?> Reviews )
				</a>
			</div>
		</div>
	</div><!-- /.row -->
</div><!-- /.rating-reviews -->
<?php } ?>
<hr />	
	<div class="row">
		<div class="col-lg-12">
			<div class="buttonPannel">
				 <?php if($row['productAvailability']=='In Stock'){?>
				<a class="" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
					<button class="buttonWhislist"  type="submit">
						<i class="fa fa-heart"></i>&nbsp Add to Wish List
					</button>
				</a>
 
				<a data-toggle="tooltip" data-placement="right" title="Cart" href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" >
					<button class="buttonAddtoCart"  type="submit">
						<i class="fa fa-shopping-cart"></i>&nbsp Add To Cart
					</button>
				</a>
				<?php } else {?>
					<div class="action" style="color:red">Out of Stock</div>
				<?php } ?>
			</div>
			<div class="col-lg-6"></div>
		</div>
	</div>
 
		</div><!-- /.col-lg-3 -->
	</div> <!-- well -->
	</div>
</div>
<div class="productDetails">
	<div class="well">
<div class="productTabs">
		<div class="row">
		<div class="col-sm-12">
			<ul id="productTabs" class="nav nav-tabs nav-tab-cell">
				<li class="active"><a data-toggle="tab" href="#description">About this item</a></li>
				<li><a data-toggle="tab" href="#reviewTab">Customer Reviews</a></li>
			</ul><!-- /.nav-tabs #product-tabs -->
		</div>
	</div><!-- row -->
	<div class="tab-content" style="padding-top: 15px;">
		<div id="description" class="tab-pane in active">
					<div class="productTab">
						<p class="text"><?php echo $row['productDescription'];?></p>
					</div>	
				</div><!-- /.tab-pane -->
				<div id="reviewTab" class="tab-pane ">
					<div class="row">
						<div class="col-lg-6">
	<div class="productReviews">
		<h4 class="title">Customer Reviews</h4>
		<hr>
		<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");
		while($rvw=mysqli_fetch_array($qry))
		{
		?>
		<div class="reviews" style="background-color: #f5f5f5;">
			<div class="review">
				<div class="reviewedBy">
					<div class="row">
						<div class="col-lg-2">
							<img src="assets/images/user.png" class="img-responsive" alt="">
						</div>
						<div class="col-lg-10">
							<span class="reviewName"><?php echo htmlentities($rvw['name']);?></span>
						</div>
					</div>
				</div>
				<div class="textReview">"<?php echo htmlentities($rvw['review']);?>"</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="text"><b>Quality :</b>  <?php echo htmlentities($rvw['quality']);?>&nbsp <i class="fa fa-star"></i></div>
					</div>
					<div class="col-lg-4">
						<div class="text"><b>Price :</b>  <?php echo htmlentities($rvw['price']);?> Star</div>
					</div>
					<div class="col-lg-4">
						<div class="text"><b>value :</b>  <?php echo htmlentities($rvw['value']);?> Star</div>
					</div>
				</div>
				<div class="reviewTitle">
					<span class="summary"><?php echo htmlentities($rvw['summary']);?></span>
					<span class="date"><i class="fa fa-calendar"></i>
						<span><?php echo htmlentities($rvw['reviewDate']);?></span>
					</span>
				</div>
			</div>
		</div>
		<?php } ?><!-- /.reviews -->
		</div><!-- /.product-reviews -->
	</div>
	<div class="col-lg-6">
		<form role="form" class="cnt-form" name="review" method="post">
	<div class="productAddReview">
		<h4 class="title">Write your own review</h4>
		<hr />
		<div class="row">
			<div class="col-lg-12">
<table class="tableRatings">
	<thead>
		<tr>
			<th class="cell-label">&nbsp;</th>
			<th>1 star</th>
			<th>2 stars</th>
			<th>3 stars</th>
			<th>4 stars</th>
			<th>5 stars</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="cell-label"><b>Quality</b></td>
			<td><input type="radio" name="quality" class="radio" value="1"></td>
			<td><input type="radio" name="quality" class="radio" value="2"></td>
			<td><input type="radio" name="quality" class="radio" value="3"></td>
			<td><input type="radio" name="quality" class="radio" value="4"></td>
			<td><input type="radio" name="quality" class="radio" value="5"></td>
		</tr>
		<tr>
			<td class="cell-label"><b>Price</b></td>
			<td><input type="radio" name="price" class="radio" value="1"></td>
			<td><input type="radio" name="price" class="radio" value="2"></td>
			<td><input type="radio" name="price" class="radio" value="3"></td>
			<td><input type="radio" name="price" class="radio" value="4"></td>
			<td><input type="radio" name="price" class="radio" value="5"></td>
		</tr>
		<tr>
			<td class="cell-label"><b>Value</b></td>
			<td><input type="radio" name="value" class="radio" value="1"></td>
			<td><input type="radio" name="value" class="radio" value="2"></td>
			<td><input type="radio" name="value" class="radio" value="3"></td>
			<td><input type="radio" name="value" class="radio" value="4"></td>
			<td><input type="radio" name="value" class="radio" value="5"></td>
		</tr>
	</tbody>
	</table><!-- /.table .table-bordered -->
					<hr />
<div class="ratingInput">
	<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="exampleInputName">Your Name <span class="astk">*</span></label>
			<input type="text" class="form-control txt" id="exampleInputName" placeholder="Your Name" name="name" required="required">
		</div><!-- /.form-group -->
		<div class="form-group" style="padding-top: 7px;">
			<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
			<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="Summary" name="summary" required="required">
		</div><!-- /.form-group -->
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="exampleInputReview">Review <span class="astk">*</span></label>
			<textarea class="form-control txt txt-review" id="exampleInputReview" rows="5" placeholder="Your Review" name="review" required="required"></textarea>
		</div><!-- /.form-group -->
	</div>
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<button name="submit" class="buttonAddtoCart">Submit Review</button>
	</div>
	<div class="col-lg-4"></div>
</div>
</div>
			</div>
		</div>
	</div>
</form><!-- /.cnt-form -->
	</div>
					</div>
				</div>
	</div>
</div>
		</div>
	</div>
			</div>
			<div class="col-lg-3">
				<?php include ('includes/sideProducts.php'); ?>
			</div>
		</div>


	<!--============================== WHOLE PRODUCT DETAILS ENDS ==============================-->
 
<!--============================= WHOLE PRODUCT DETAILS ENDS ==================================-->
<!--============================= WHOLE PRODUCT REVIEW STARTS =================================-->	


<?php $cid=$row['category'];
			$subcid=$row['subCategory']; } ?>
<!-- ==================================== RELATED PRODUCTS ==================================== -->
<?php include('include_tabs/featuredProduct.php') ?>
 
<!-- ===================================== RELATED PRODUCTS : END ================================== -->
 

</div><!-- container-fluid -->
</div><!-- body-content -->
<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>



</body>
</html>