<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
 

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
    <title>Utpann | Product Details</title>
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
      <h3><i class="fa fa-archive"></i> &nbsp Product Details</h3>
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
       if (isset($_GET['id'])) {
       $oid=$_GET['id'];
$sql="SELECT * from products where id=".$oid;
       $result = mysqli_query($con, $sql);
     while($row=mysqli_fetch_assoc($result)){
     $rowId = $row['id'];
      $orderId = $_GET["id"];
      if ($rowId==$orderId) {
     ?>
      <div class="row">
        <div class="col-lg-8">
          <?php 
          $getStockStatus = $row['productAvailability'];
          if($getStockStatus == "In Stock"){
           ?>
          <div class="stockIn">
             <h5><?php echo $row['productAvailability'];?></h5>
          </div>
          <div class="stockInSquare"></div>
        <?php } else
        {
          ?>
           <div class="stockOut">
             <h5><?php echo $row['productAvailability'];?></h5>
          </div>
           <div class="stockOutSquare"></div>
          <?php
        } ?>
        </div>
        <div class="col-lg-2">
         <div class="buttonUpdate" style="margin-top: 7px;">
            <a href="edit-products.php?id=<?php echo $row['id'] ?>" class="buttonUpdate" target="_blank"><i class="fa fa-pencil"></i> Update Product   </a>
         </div>
        </div>
        <div class="col-lg-2">
          <button name="Submit2" type="submit" class="buttonClose" onClick="return f2();"><i class="fa fa-times"></i> Close Window </button>
        </div>
      </div>
<style>
  .stockIn h5{background-color: green;padding: 5px;width: 70px;color: white;margin-top: 5px;}
   .stockOut h5{background-color: orange;padding: 5px;width: 100px;color: white;margin-top: 5px;}
   .stockInSquare{background-color: green;height: 18px;width: 18px;margin-left: 61px;margin-top: -31px;transform: rotate(45deg);margin-bottom: 20px;}
   .stockOutSquare{background-color: orange;height: 18px;width: 18px;margin-left: 92px;margin-top: -31px;transform: rotate(45deg);margin-bottom: 20px;}
a.buttonUpdate{color: white;text-decoration: none;}
.buttonUpdate {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
text-align: center;
border: 1px solid #00BCD2;
color: white;
width: 100%;
}
.buttonClose {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
margin-top: 7px;
border: 1px solid #00BCD2;
color: white;
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
<h5><b>Product Details</b></h5>
     <div class="row">
       <div class="col-lg-3">
         <ul class="list-group">
            <li class="list-group-item">Reference Id. :  Ref 
              <?php echo htmlentities($row['id']);?> </li>
              <li class="list-group-item">Product Id :  
              <?php echo htmlentities($row['product_id']);?> </li>
            <li class="list-group-item">Category : 
              <?php echo htmlentities($row['category']);?></li>
            <li class="list-group-item">Sub Category : 
              <?php echo htmlentities($row['subCategory']);?></li>
          </ul>
       </div>
        <div class="col-lg-3">
          <ul class="list-group">
            <li class="list-group-item">Product Weight :  
              <?php echo htmlentities($row['productWeight']);?> Kg </li>
            <li class="list-group-item">Product Price : 
              <i class="fa fa-inr"></i> <?php echo htmlentities($row['productPrice']);?>.00</li>
            <li class="list-group-item">Shipping Charge : 
              <i class="fa fa-inr"></i> <?php echo htmlentities($row['shippingCharge']);?>.00</li>
            <li class="list-group-item">Total Amount : 
              <i class="fa fa-inr"></i> <?php echo htmlentities($row['pr_sellingPrice']);?>.00</li>
          </ul>
       </div>
       <div class="col-lg-6">
          <ul class="list-group">
             <li class="list-group-item">Brand Name : 
              <?php echo htmlentities($row['productCompany']);?></li>
             <li class="list-group-item">Product Name : 
              <?php echo htmlentities($row['productName']);?></li>
            <li class="list-group-item">Discount :  
              <?php echo htmlentities($row['productDiscount']);?> % </li>
            <li class="list-group-item">Creation Date : 
              <?php echo htmlentities($row['postingDate']);?></li>
          </ul>
       </div>
     </div>
     <div class="row">
       <div class="col-lg-12">
        <ul class="list-group">
          <h5><b>Product Description</b></h5>
          <li class="list-group-item">  
            <?php echo htmlentities($row['productDescription']);?> 
          </li>
        </ul>
       </div>
     </div>
     <div class="row">
       <div class="col-lg-2">
         <img src="productimages/<?php echo htmlentities($oid);?>/<?php echo htmlentities($row['productImage1']);?>" class="img-responsive" />
       </div>
       <div class="col-lg-2">
          <img src="productimages/<?php echo htmlentities($oid);?>/<?php echo htmlentities($row['productImage2']);?>" class="img-responsive" />
       </div>
       <div class="col-lg-2">
          <img src="productimages/<?php echo htmlentities($oid);?>/<?php echo htmlentities($row['productImage3']);?>" class="img-responsive" />
       </div>
        
     </div>
    <?php   }}?>
 
    <div class="row">
    	<div class="col-lg-4"></div>
    	<div class="col-lg-4"></div>
    	<div class="col-lg-4">
      <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
             
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

 