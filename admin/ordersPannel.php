<?php include("include/session.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Orders Pannel</title>
    <?php include("include/headerLinks.php"); ?>
  </head>
  <body > 
  <?php include('include/topHeader.php');?>
  <div class="wrapperComp">
      <div class="container-fluid">
        <div class="bodyContent" style="margin-top: -15px;">
          <div class="row">
          	<div class="col-lg-2">
          		 <?php include('include/sidebar.php');?>
          	</div>
          <div class="col-lg-10">
     	<div class="row">
     		<div class="col-lg-2">
     		<div class="headPaggignation">
     				<h5><a href="AdminDashboard.php">Dashboard</a> / Orders Pannel</h5>
     			</div>
     	</div>
     		<div class="col-lg-10">
     			<?php include("include/orders_tab.php"); ?>
     		</div>
     	</div>

            <div class="sideContent">
              <div class="well">
			<div class="tablePannel">
<table  id="example" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display table-responsive" >
	<thead>
		<tr>
			<th>#</th>
			<th width="75">Order Id.</th>
			<th>Order No.</th>
			<th>Customer Name</th>
			<th width="50">Email /Contact no</th>
			<th>Product Name</th>
			<th width="50">Weight</th>
			<th width="50">Qty </th>
			<th width="50">Amount </th>
			<th width="130">Order Date</th>
			<th width="75">Status</th>
			<th width="115">Action</th>
		</tr>
	</thead>
	
	<tbody>
		<?php
		 
			$query=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,
				orders.productId as productid,products.productWeight as product_weight,
				orders.userOrderid as userorderid,
				orders.paymentMethod as payMethod,orders.orderStatus as order_status,
 products.pr_sellingPrice as pSell,
				orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId");
		$cnt=1;
		while($row=mysqli_fetch_array($query))
		{
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<td><a href="orderDetails.php?oid=<?php echo $row['id'] ?>" target="_blank">Ref <?php echo htmlentities($row['id']);?></a></td>
			<td><?php echo htmlentities($row['userorderid']);?></td>
			<td><?php echo htmlentities($row['username']);?></td>
			<td><?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></td>

			<td><?php echo htmlentities($row['productname']);?></td>
			<?php "Get Selling Price ".$getFinalAmount  = htmlentities($row['pSell']*$row['quantity']);?>
			<td><?php echo htmlentities($row['product_weight']*$row['quantity']);?> Kg </td>
			<td><?php echo htmlentities($row['quantity']);?></td>
			<td><?php echo htmlentities($getFinalAmount);?>.00</td>
			<td><?php echo htmlentities($row['orderdate']);?></td>
			<td><?php echo htmlentities($row['order_status']);?></td>
						<td>    
			<?php 
if ($row['order_status']=="Delivered") {
?>
<a href="orderDetails.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">
				<button class="buttonSuccess"><i class="fa fa-eye"></i></button>
			</a>


<?php } else
{
	?>
	<a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">
				<button class="buttonCheck"><i class="fa fa-pencil"></i></button>
			</a>
			 <a href="updateShipment.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">
				<button class="buttonCheck"><i class="fa fa-car"></i></button>
			</a>
	<?php
}
			 ?>

		</td>
 
	</tr>
	<?php $cnt=$cnt+1; } ?>
</tbody>
</table>
</div>
              </div><!-- well -->
            </div><!-- sideContent -->
          </div><!-- col-lg-10 -->
        </div><!-- row -->
      </div><!-- bodyContent -->
    </div><!-- container-fluid -->
  </div><!-- wrapperComp -->
  <?php include('include/footer.php');?>
</body>
</html>
<script>
  $('#json').on('click',function(){
    $("#example").tableHTMLExport({type:'json',filename:'AllOrders.json'});
  })
  $('#csv').on('click',function(){
    $("#example").tableHTMLExport({type:'csv',filename:'AllOrders.csv'});
  })
  </script>


 	

	