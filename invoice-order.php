 <?php
session_start();
include_once 'includes/config.php';
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
}
?>
<?php 
error_reporting(0);
       if (isset($_GET['oid'])) {
       $oid=$_GET['oid'];
$sql="select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,

users.billingAddress as baddress,users.billingCity as bcity,users.billingState as bstate,users.billingPincode as bpincode,

products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,
products.productPrice as productprice,
        orders.productId as productid,products.productWeight as product_weight,
        orders.paymentMethod as payMethod,orders.orderStatus as order_status,
 products.pr_sellingPrice as pSell,products.gst_charge as pGst,products.gst_range as pGstRange,orders.userOrderid as userorderid,
        orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId";
       $result = mysqli_query($con, $sql);
     while($row=mysqli_fetch_assoc($result)){
    $rowId = $row['id']."<br>";
     $orderId = $_GET["oid"]."<br>";
      if ($rowId==$orderId) {
  $getQuantity = htmlentities($row['quantity']);
  "Get Selling Price ".$getFinalAmount  = htmlentities($row['pSell']*$getQuantity);
   $setStatus = "Delivered";
        $status = $row['order_status'];
     ?>
         
<!DOCTYPE html>
<html>
  <title>Utpann | Tax Invoice</title>
  <head>
    <?php include 'headerLinks/header_Links.php' ?>
  </head>
  <body onload="timeout_init(),timeout_trigger('print_setion');"> 
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
 
            <div class="rightPannel">
               
              <br>
              <div id="print_setion" style=" padding: 5px; margin-bottom: 20px;margin-top: -15px;">
              	<table class="tablePrintOuter"  border="1" width="100%" >
              		<tr >
              			<td style="margin-bottom: 150px;padding: 10px;">
 
                <h4 style="text-align: center;margin: 0px;">Tax Invoice / Bill of Supply / Cash Memo</h4>
                <p style="text-align: center;padding-top: 10px;font-size: 1.1em;">(Original for Receipt)</p><br>
                <div class="courier_view">
                  <table class="tablePrint" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td width="300px">
                          <img src="img/logo.png" alt="" height="50px" width="200px">
                          <h4 style="margin-left: 20px;">GSTIN : 23AADFU8092M2ZN</h4>
                          <h4 style="margin-left: 20px;">PAN NO. : 23AADFU8092M2ZN</h4>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="tablePrint" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td width="700px" style="padding-left: 20px;">
                          <p style="text-align: left; margin: 0px;font-size: 1.2em; 
                          padding-bottom:20px;line-height: 20px;"><b>Registred Office:</b><br>
                             Office No. B-210, Second Floor, Capital Mall Misrod, <br> Hosangabad Road , Bhopal- 462001, <br> Madhya Pradesh, India</p>
                        </td>
                       
                        <td width="250px">
                          <p style="text-align: left; margin: 0px;font-size: 1.2em; padding-bottom:15px;line-height: 20px;"><b>Contact</b><br>
                          utpannseeds@gmail.com <br>
                          +91 8046075277 | +91 9826993344</p>
                        </td>
 
                      </tr>
                    </tbody>
                  </table><br><br><br>
                  <table class="tablePrintCustomer" border="0" style="margin-top: -30px;" width="100%">
                    <tbody >
                      <tr>
                        <td width="350px" style="padding: 10px;line-height: 20px;">
                          <h5 style="margin: 0px;padding-bottom: 10px;"><b>Shipping Address</b></h5>
                          <p style="padding: 0px 10px;font-size: 1.1em;">
                            <?php echo $row['username'] ?><br>
                            <?php echo $row['shippingaddress'].",<br>".$row['shippingcity'].",".$row['shippingstate'].",".$row['shippingpincode'];?><br>
                            <?php echo $row['usercontact'] ?><br>
                        </td>
                        <td width="400px" style="padding: 10px;line-height: 20px;">
                           <h5 style="margin: 0px;padding-bottom: 10px;"><b>Billing Address</b></h5>
                          <p style="padding: 0px 10px;">
                            <?php echo $row['username'] ?><br>
                            <?php echo $row['baddress'].",<br>".$row['bcity'].",".$row['bstate'].",".$row['bpincode'];?><br>
                            <?php echo $row['usercontact'] ?><br>
                        </td>
                        <td width="320px" style="padding: 10px;line-height: 20px;">
                          <h5 style="margin-top:-3px;padding-bottom: 10px;"><b>Order Details </b></h5>
                          <p style="padding: 0px 10px;margin-top: -10px; "> 
                            Invoice Date : <?php echo date("d-m-Y"); ?><br>
                            Order Number : <?php echo $row['userorderid'] ?><br>
                            Order Date : <?php echo $row['orderdate'] ?>
                           </p>
                        </td>
                      </tr>
                    </tbody>
                  </table> <br>
                  <table class="tablePrintdetails  " border="1"  style=" text-align: center;" width="100%">
                    <thead>
                      <style>
                   
                      table td
                      {
                      	  padding: 5px 0px 5px 0px;
                      }
                      table th
                      {
                      	  padding: 5px 0px 5px 0px;
                      }
                      table.tablePrintdetails td
                      {
                      text-align: center;
                       
                      }
                      table.tablePrintdetails th
                      {
                      text-align: center;
                      
                      }
                        
                      table.tablePrint span
                      {
                        padding-left: 10px;
                      }
                      </style>
                      <tr style="font-size: 1em;">
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Weight</th>
                        <th>Shipping Amt.</th>
                        <th>GST <?php echo $row['pGstRange'] ?>%</th>
                        <th>Total Amt.</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr style="font-size: 1em;">
                        <td><?php echo $row['userorderid'] ?></td>
                        <td><?php echo $row['productname'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['product_weight']*$row['quantity'] ?> Kg</td>
                        <td><?php echo $row['shippingcharge'] ?>.00</td>
                        <td><?php echo $row['pGst'] ?>.00</td>
                        <td><?php echo $finalAmt =  $row['pSell']*$row['quantity']; ?>.00</td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="tablePrintdetails" border="0" width="100%">
                    <tbody>
                      <?php 
                      $number = $finalAmt;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
   ?>
                      <tr style="font-size: 1em;">
                      	<td width="500px">
                          <h5 style="text-align: left;font-size:1.2em;font-weight: bold;"><?php echo  $result . "Rupees Only "; ?></h5>
                        </td>
                        <td width="" style="padding-top: 10px;font-size:1.2em;font-weight: bold;"> <span style="margin-right: 20px;">Total</span> Rs. <?php echo $finalAmt; ?>.00</td>
                      </tr>
                    </tbody>
                  </table><hr> 
                    <table class="tablePrintdetails" border="0" width="100%">
                    <tbody>
                      <tr style="font-size: 1em;">
                        <td width="400px"></td>
                        <td width="" style="padding-top: 10px;"> <span style="margin-right: 20px;font-weight: bold;font-size: 1.2em;">For Utpann Seeds And Beyond <br><br>
                          <img class="signatureImage" src="img/Picture2.png" alt=""><br><br>
                          Authorized Signatory
                        </td>
                      </tr>
                      <style>
                        img.signatureImage{width: 150px;height: 50px;}
                      </style>
                    </tbody>
                  </table>
                </div>
                </td>

              		</tr>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
  <?php   }}}?>
<script>

  function timeout_trigger(setion_id) {
  var Contents_Section = document.getElementById(setion_id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = Contents_Section;
  window.print();
  document.body.innerHTML = originalContents;    
}
 
function timeout_init() {
    setTimeout('timeout_trigger()', 500);
}
  </script> 