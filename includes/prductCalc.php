			<?php 
		"Get Weight ".$getWght  = htmlentities($row['productWeight']);
		"Get Price ".$getAmt = htmlentities($row['productPrice']);
		"Get Discount % ".$getDisRange = htmlentities($row['productDiscount']);
		"Get GST Charge".$getGstCharge = htmlentities($row['gst_charge']);
 
		" Get shippingCharge ".$shippingCharge = htmlentities($row['shippingCharge']);

 		"Get Price per pack" .$getPrice_Pack = $getWght*$getAmt;
 "Get  Discount Calculation ".$getDisPrice = round(($getAmt/100)*($getDisRange));
	"Get Discount Amount ".$getAfterDis = $getAmt-$getDisPrice;

		"Get Discount Amt ".$getDis = round(($getPrice_Pack/100)*($getDisRange));
	"Get Amt After Discount ".$getFinalAmount = $getPrice_Pack-$getDis+$shippingCharge;

		?>
