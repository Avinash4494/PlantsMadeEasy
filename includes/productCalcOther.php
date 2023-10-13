
		<?php 
		"Get Weight ".$getWght  = htmlentities($row['pweight']);
		"Get Price ".$getAmt = htmlentities($row['pprice']);
		"Get Discount % ".$getDisRange = htmlentities($row['pDis']);
		"Get Gst_range ".$getGstRange = htmlentities($row['pGst']);
		"Get Gst_range ".$pr_sellingPrice = htmlentities($row['pShell']);
		"Get shippingCharge ".$shippingCharge = htmlentities($row['pShip']);
		
 		"Get Price per pack" .$getPrice_Pack = $getWght*$getAmt;
 "Get  Discount Calculation ".$getDisPrice = round(($getAmt/100)*($getDisRange));
		"Get Discount Amount ".$getAfterDis = $getAmt-$getDisPrice;

		"Get Discount Amt ".$getDis = round(($getPrice_Pack/100)*($getDisRange));
	"Get Amt After Discount ".$getFinalAmount = $getPrice_Pack-$getDis+$shippingCharge;
		?>
 
