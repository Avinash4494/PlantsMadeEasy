	 <form name="cart" method="post">
	<div class="row">
		<div class="col-lg-9">
			<div class="addressContainer" style="margin-top: 30px;">
			<div class="row">
			<div class="col-lg-6">
				<div class="shippingAddress">
					<div class="well">
						<h4>Shipping Address</h4>
						<hr>
<div class="form-group">
	<?php
	$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
	?>
	<div class="form-group">
		<label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
		<textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing City">Billing City <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
	</div>
	 <div class="form-group">
		<label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
	</div>
	<button type="submit" name="update" class="buttonAddCart">Update</button>
	<?php } ?>
</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="shippingAddress">
					<div class="well">
						<h4>Billing Address</h4>
						<hr>
<div class="form-group">
	<?php
	$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
	?>
	<div class="form-group">
		<label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
		<textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
	</div>
	<div class="form-group">
		<label class="info-title" for="Billing City">Shipping City <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
	</div>
	 <div class="form-group">
		<label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
	</div>
	<button type="submit" name="shipupdate" class="buttonAddCart">Update</button>
	<?php } ?>
</div><!-- form-group -->
					</div><!-- well -->
				</div><!-- shippingAddress -->
			</div><!-- col-lg-6 -->
		</div><!-- .row -->
</div>
		</div>
		<div class="col-lg-3">
<?php include ('includes/sideProducts.php'); ?>	
		</div>
	</div>	 
 	</form>