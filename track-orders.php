    <section id="sectionTitle" class="container-fluid">
      <h2>Track Your Shipment</h2>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:;">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
                <div class="col-lg-2 col-xs-2" style="background-color:red"></div>
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p>We’re always interested in new projects, big or small. <br> Send us an email and we’ll get in touch shortly, or phone between 8:00 am and 7:00 pm Monday to Saturday.</p>
    </section>
    <section id="sectionTrackComp">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10">
                            <form action="track-orders.php" method="post">
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                  <p>Search by Docket Number or Invoice Number</p>
                </div>
                <div class="col-lg-4"></div>
              </div>
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="word"  name="userOrderid"  autocomplete="off" placeholder="Search by Docket Number or Invoice Number"  required>
                  </div>
                </div>
                <div class="col-lg-2">
                  <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                </div>
                <div class="col-lg-2"></div>
              </div>
            </form>
<!--  <div class="traceCour">
  <div class="well">

  </div>
</div> -->
            <?php
            session_start();
error_reporting(0);
include('includes/config.php');
            if(isset($_POST['click'])){
            $dock_num = $_POST['id'];
            $q = "SELECT * FROM orders where (userOrderid = '$dock_num')";
            $result = mysqli_query($con, $q) or die(mysqli_error($con));
            if(mysqli_num_rows($result)>=1){
            while($rowMember = mysqli_fetch_assoc($result)){
            ?>
            <div class="row">
              <div class="col-lg-1">
       
              </div>
              <div class="col-lg-8">
                <h4>Tracking History</h4>
                <p>Your Courier Id : <?php echo $rowMember['userOrderid'] ?> has been <?php echo $rowMember['order_status'] ?> on <?php echo $rowMember['order_date'] ?>.</p>
                <div class="trackLongContent">
                  <div class="trackWidget">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="list-group">
                          <a href="#" class="list-group-item">Customer's Name : <?php echo $rowMember['cus_name'] ?></a>
                        </div>
                      </div>
                      
                   
                    </div>
                    
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="list-group">
                          <a href="#" class="list-group-item">Courier Id : <?php echo $rowMember['id'] ?></a>
                          <a href="#" class="list-group-item">Total Weight : <?php echo $rowMember['total_weight'] ?>.00 Kg</a>
                          <a href="#" class="list-group-item">Invoice Number : <?php echo $rowMember['invoice_no'] ?></a>
                          <a href="#" class="list-group-item">Payment Status : <?php echo $rowMember['payment_process'] ?></a>
                          <a href="#" class="list-group-item">Dispatched From : <?php echo $rowMember['package_from'] ?></a>
                          
                          <a href="#" class="list-group-item">Number of Packets : <?php echo $rowMember['nofpkts'] ?> Nos.</a>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="list-group">
                          <a href="#" class="list-group-item">Docket Number : <?php echo $rowMember['docketNumber'] ?></a>
                          <a href="#" class="list-group-item">Date of Courier :  <?php echo $rowMember['courierdate'] ?> </a>
                          <a href="#" class="list-group-item">Invoice Date : <?php echo $rowMember['invoice_date'] ?></a>
                          <a href="#" class="list-group-item">Shipment Mode : <?php echo $rowMember['transport_number'] ?></a>
                          <a href="#" class="list-group-item">Delivered To : <?php echo $rowMember['package_to'] ?></a>
                          
                          <a href="#" class="list-group-item">Order Status : <?php echo $rowMember['order_status'] ?></a>
                        </div>
                      </div>
                      
                    </div>
                    <?php
                    $payment_status = $rowMember['payment_process'];
                    $payment_pending  = "Pending";
                    if ($payment_status==$payment_pending) {
                    ?>
                    <p>You can pay the pending amount on below bank details.</p>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="list-group">
                          <a href="#" class="list-group-item">Bank Name : AXIS BANK</a>
                          <a href="#" class="list-group-item">Account Type : Current Account</a>
                          <a href="#" class="list-group-item">Account No. : 918020089221996</a>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="list-group">
                          <a href="#" class="list-group-item">Account Name : Aaradhya Cargo Movers</a>
                          <a href="#" class="list-group-item">IFSC Code : UTIB0001614</a>
                          <a href="#" class="list-group-item">Branch : Yeshwanthpur, Bangalore</a>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
                 <style type="text/css">
                      .statusImage img
                      {
                      margin-left: 50px;
                      height: 80px;
                      margin-top: -30px;
                      }
                      </style>
              <div class="col-lg-3">
                         <?php
                $deskstatus = $rowMember['order_status'];
                $dispatched  = "Dispatched";
                $delivered  = "Delivered";
                if ($deskstatus==$delivered) {
                ?>
                <div class="statusImage">
                  <img src="image/delive.png" alt="">
                </div>
                <a href="invoice_index.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
                  <button class="actionButtonIcons_invoice" type="submit">Download Invoice</button>
                </a>
                <?php }
                else
                {
                ?>
                <div class="statusImage">
                  <img src="image/dispatched.png" alt="">
                </div>
                <?php
                } ?>
                
                <!--  <a href="invoice_index.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
                  <button class="actionButtonIcons_invoice" type="submit">Download Invoice</button>
                </a> -->
              </div>
            </div>
            <?php
            }}
            else{
            ?>
            <?php
            echo "<h1 style='color:red;text-align:center;font-size:1em; font-family: Asap;'>Sorry...No Record Found!!</h1>";?>
            <?php
            }}
            ?>
          </div>
          <div class="col-lg-2">
 
           
          </div>
        </div>
      </div>
    </section>