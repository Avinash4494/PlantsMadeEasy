<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){

}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}

</script>

 
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Update Order</title>
    <?php include("include/headerLinks.php"); ?>
  </head>
  <body > 
  <?php include('include/topHeader.php');?>
  <div class="wrapperComp">
      <div class="container-fluid">
        <div class="bodyContent">
          <div class="row">
          <div class="col-lg-2">
           <div class="sidebarContent" style="margin-top: -15px;margin-bottom: -10px;">
              <?php include('include/sidebar.php');?>
           </div> 
          </div><!-- col-lg-2 -->
          <div class="col-lg-10">
            <div class="sideContent" style="margin-top: -15px;">
                                 <div class="well">
                  <div class="moduleHead">
  <div class="row">
    <div class="col-lg-10">
      <h3><i class="fa fa-archive"></i> Order Details</h3>
    </div> 
    <div class="col-lg-2">
      
    </div>
  </div>
</div><!-- moduleHead -->
 <form name="updateticket" id="updateticket" method="post">
 <div class="row">
   <div class="col-lg-12">
     <div class="orderDetails" style="padding:10px;">
             <?php 
       if (isset($_GET['oid'])) {
       $oid=$_GET['oid'];
$sql="SELECT users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,
        orders.productId as productid,products.productWeight as product_weight,
        orders.paymentMethod as payMethod,orders.orderStatus as order_status,
 products.pr_sellingPrice as pSell,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId";
       $result = mysqli_query($con, $sql);
     while($row=mysqli_fetch_assoc($result)){
     $rowId = $row['id'];
      $orderId = $_GET["oid"];
      if ($rowId==$orderId) {
     ?>
      <div class="row">
        <div class="col-lg-9"></div>
            <div class="col-lg-3">
              <?php if ($row['order_status']!="Delivered") {
                 
                 ?>

              <a href="updateorder.php?oid=<?php echo $row['id'] ?>" class="buttonClose" target="_blank"><i class="fa fa-pencil"></i> Update Order   
              </a>
               <?php } ?>
            </div>
            <style>
              a.buttonClose{color: white;text-decoration: none;}
              .buttonClose {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    margin-left: 80px;
    margin-top: 25px;
    width: 100%;
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
            
          </div>
     <div class="row">
       <div class="col-lg-3">
         <ul class="list-group">
          <h5><b>Order Details</b></h5>
  <li class="list-group-item">Order Id :  <?php echo htmlentities($row['id']);?> </li>
  <li class="list-group-item">Order Date : <?php echo htmlentities($row['orderdate']);?></li>
  <li class="list-group-item">Payment Mode : <?php echo htmlentities($row['payMethod']);?></li>
  <li class="list-group-item">Order Status : <?php echo htmlentities($row['order_status']);?></li>
</ul>
       </div>
        <div class="col-lg-4">
          <h5><b>Product Details</b></h5>
         <ul class="list-group">
  <li class="list-group-item">Product Name : <?php echo htmlentities($row['productname']);?></li>
  <li class="list-group-item">Quantity : <?php echo htmlentities($row['quantity']);?> Packet</li>
  <li class="list-group-item">Weight : <?php echo htmlentities($row['product_weight']*$row['quantity']);?> Kg</li>
  <li class="list-group-item">Amount : <?php "Get Selling Price ".$getFinalAmount  = htmlentities($row['pSell']);?><i class="fa fa-inr"></i> <?php echo htmlentities($getFinalAmount);?>.00</li>
</ul>
       </div>
       <div class="col-lg-5">
        <h5><b>Customer Details</b></h5>
         <ul class="list-group">
  <li class="list-group-item">Customer Name : <?php echo htmlentities($row['username']);?></li>
  <li class="list-group-item">Customer Contact : <?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></li>
  <li class="list-group-item">Shipping Address : <?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></li>
</ul>
       </div>
      
     </div>
    <?php   }}?>
               <table  id="example" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display table-responsive" >
  <thead>
    <style>
      table {font-size: 0.8em;}
    </style>
     <h5 style="margin-top: 0px;"><b>Order Status</b></h5>
    <tr>
      <th>#</th>
      <th>Updated On</th>
      <th>Current Status</th>
      <th>Location</th>
      <th>Remarks</th>
    </tr>
  </thead>
  <tbody>
  </tbody>


           <?php 
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
$cnt=1;
     while($row=mysqli_fetch_array($ret))
      {
     ?>
    
 
<tr>
      <td><?php echo htmlentities($cnt);?></td>
      <td><?php echo $row['postingDate'];?></td>
      <td><?php echo $row['status'];?></td>
      <td><?php echo $row['order_location'];?></td>
      <td><?php echo $row['remark'];?></td>
</tr>
 
         <?php $cnt=$cnt+1; } ?>
         </tbody>
</table>
    <div class="row">
    	<div class="col-lg-4"></div>
    	<div class="col-lg-4"></div>
    	<div class="col-lg-4">
      <div class="row">
            <div class="col-lg-6">
               
   
         
                
        
            </div>
            <div class="col-lg-6">
              <input name="Submit2" type="submit" class="buttonInsert" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  />
            </div>
          </div>
    	</div>
    </div>
     </div>
   </div>
 </div> 
  </form>
</div><!-- well -->
            </div><!-- sideContent -->
          </div><!-- col-lg-10 -->
        </div><!-- row -->
      </div><!-- bodyContent -->
    </div><!-- container-fluid -->
  </div><!-- wrapperComp -->
</body>
</html> 
<?php } ?>
</body>
</html>
<?php } ?>

 