<style>
.sideContent .well{padding: 10px;}
.progressiveComp{background-color: white;padding: 15px;border-radius: 5px;}
.circlechart{color: white;}
.progressiveComp p{color: #1C2833;padding-top: 15px;text-align: center;}
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="progressiveComp">
      <div class="row">
        <div class="col-lg-2">
          <?php
          $resultUser = mysqli_query($con,"SELECT COUNT(id) FROM  products ");
          while($rowUser = mysqli_fetch_array($resultUser))  {
          $getNum = $rowUser[0];$setNum =100;$getPer = ($getNum/$setNum)*100; ?>
          <div class="circlechart" data-percentage="<?php echo $getPer; ?>">Products</div>
          <p> <?php echo round($getNum,1); ?><br> Products</p>
          <?php } ?>
        </div>
        <div class="col-lg-2">
          <?php
          $query_Amt = mysqli_query($con,"SELECT * FROM products");
          $AmtPerVar= 0;
          $getAmt=0;
           $setAmt = 300000;
          while ($Amt = mysqli_fetch_array($query_Amt)) {
          $getAmt +=$Amt["pr_sellingPrice"];
          }
          $getAmtPer = ($getAmt/$setAmt)*100;
          ?>
          <div class="circlechart" data-percentage="<?php echo round($getAmtPer,1); ?>">Payments </div>
          <p><i class="fa fa-inr"></i> <?php echo round($getAmt,1);?> <i class="fa fa-arrow-up" style="color: green;"></i><br>Payments Received</p>
        </div>
        <div class="col-lg-2">
          <?php
          $query_weight = mysqli_query($con,"SELECT * FROM products");
          $weightPerVar=0;
          while ($weight = mysqli_fetch_array($query_weight)) {
          $weightPerVar +=(int)$weight['productWeight'];
          }
          $getWeight = $weightPerVar;
          $setWeight = 30000;
          $getWeightPer = ($getWeight/$setWeight)*100;
          ?>
          <div class="circlechart" data-percentage="<?php echo round($getWeightPer,1); ?>">Total Weights</div>
          <p> <?php echo round($weightPerVar,1); ?> Kg <br> Product Weight</p>
        </div>
        <div class="col-lg-2">
          <?php
          $resultUser = mysqli_query($con,"SELECT COUNT(id) FROM  users ");
          while($rowUser = mysqli_fetch_array($resultUser))  {
          $getNum = $rowUser[0];$setNum =300;$getPer = ($getNum/$setNum)*100; ?>
          <div class="circlechart" data-percentage="<?php echo $getPer; ?>">Users</div>
        <p><?php echo $getNum; ?> <br> Users</p>
          <?php } ?>
        </div>
        <div class="col-lg-2">
          <?php
          $resultUser = mysqli_query($con,"SELECT COUNT(id) FROM  userlog ");
          while($rowUser = mysqli_fetch_array($resultUser))  {
          $getLogs = $rowUser[0];
          $setLogs =1000;
          $getLogPer = ($getLogs/$setLogs)*100; ?>
          <div class="circlechart" data-percentage="<?php echo round($getLogPer); ?>">Users Logs</div>
           <p><?php echo $getLogs; ?><br> Users Logs</p>
          <?php } ?>
        </div>
        <div class="col-lg-2">
          <?php
          $resultUser = mysqli_query($con,"SELECT COUNT(id) FROM  orders");
          while($rowUser = mysqli_fetch_array($resultUser))  {
          $getOrders = $rowUser[0];
          $setOrders =1000;
          $getOrdesPer = ($getOrders/$setOrders)*100; ?>
          <div class="circlechart" data-percentage="<?php echo $getOrdesPer; ?>">Total Orders</div>
          <p><?php echo $getOrders; ?><br> Orders</p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>