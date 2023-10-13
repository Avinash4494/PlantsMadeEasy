  <style>
       .ordered{
                        height: 50px;
                        width: 50px;
                        background-color:#D5D4D4 ;
                        border-radius: 50%;
                        margin-top: 20px;
                        margin-bottom: 30px;
                        }
                        .ordered i{
                        font-size: 1.5em;
                        padding-top: 15px;
                        color: white;
                        padding-left: 15px;
                        }
                        .ordered h5{
                        padding-top: 15px;
                        text-align: center;
                        color: #D5D4D4;
                        font-weight: bold;
                         
                        letter-spacing: 1px;
                        }
                        .orderStatus li.list-group-item
                        {
                        font-size: 0.9em;
                        padding: 5px 10px;
                        }
                        #orderedLine, #dispatchLine,  #shippingLine, #deliveredLine
                        {
                          height: 5px;
                          width: 135px;
                          position: absolute;
                          margin-top: 25px;
                          margin-left: 50px;
                          background-color:#D5D4D4; 
                        }
                        #orderedLine i, #dispatchLine i,  #shippingLine i
                        {
                          font-size: 1.7em;
                          position: absolute;
                          margin-top: -10px;
                          margin-left: 113px;
                          color: transparent;
                          
                        }
                        .orderPannel span 
                        {
                          font-size: 0.7em;
                          margin-top: 0px;
                        }
  </style><hr>
   <h4 style="margin-top: 0px;"><b>Order Tracking Status</b></h4>
               <div class="row">
                          <div class="col-lg-2"></div>
                          <script>
                          function getOrderStatus()
                          
                          {
                          var ordered = "In Transit";
                          var dispatched = "Dispatched";
                          var shipping = "Shipped";
                          var delivered = "Delivered";
 
 
                          var orderStatus = '<?php echo $status; ?>';
                          
                          if (orderStatus==ordered)
                          {

                          let orderedArr = document.querySelectorAll("#orderedItem");
                          for (let h = 0; h < orderedArr.length; h++) {
                          orderedArr[h].style.backgroundColor = "#00bcd2";
                          }
                          let orderedText = document.querySelectorAll("#orderedH5");
                          for (let h = 0; h < orderedText.length; h++) {
                          orderedText[h].style.color = "#00bcd2";
                          }

                          }
                          else if(orderStatus==dispatched)
                          {
                          
                          let dispatchedArr = document.querySelectorAll("#orderedItem,#dispatched,#orderedLine");
                          for (let i = 0; i < dispatchedArr.length; i++) {
                          dispatchedArr[i].style.backgroundColor = "#00bcd2";
                          }
                          let dispatchedText = document.querySelectorAll("#orderedH5,#dispatchedH5,#orderedAro");
                          for (let i = 0; i < dispatchedText.length; i++) {
                          dispatchedText[i].style.color = "#00bcd2";
                          }
                          }
                          else if(orderStatus==shipping)
                          {
                          let shippingArr = document.querySelectorAll("#orderedItem,#dispatched,#shipping,#dispatchLine,#orderedLine");
                          for (let j = 0; j < shippingArr.length; j++) {
                          shippingArr[j].style.backgroundColor = "#00bcd2";
                          }
                          let shippingText = document.querySelectorAll("#orderedH5,#dispatchedH5,#shippingH5,#dispatchArrow");
                          for (let j = 0; j < shippingText.length; j++) {
                          shippingText[j].style.color = "#00bcd2";
                          } 
                          }
                          else if(orderStatus==delivered)
                          {

                          let deliverdArr = document.querySelectorAll("#orderedItem,#dispatched,#shipping,#delivered,#orderedLine,#dispatchLine,#shippingLine");
                          for (let k = 0; k < deliverdArr.length; k++) {
                          deliverdArr[k].style.backgroundColor = "#00bcd2";
                          }
                          let deliveredText = document.querySelectorAll("#orderedH5,#dispatchedH5,#shippingH5,#deliveredH5,#shippingArrow");
                          for (let k = 0; k < deliveredText.length; k++) {
                          deliveredText[k].style.color = "#00bcd2";
                          }
                          }
                          }
                          
                          </script>
                     
                        
                          <div class="col-lg-2">
                            <div class="orderPannel">
                                <div id="orderedLine">
                                   <i id="orderedAro" class="fa fa-arrow-right"></i>
                                </div>
                              <div class="ordered" id="orderedItem">
                                <i class="fa fa-archive"></i>
                                <h5 id="orderedH5">Ordered</h5>
                                
                              </div>
                            
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="orderPannel">
                               <div id="dispatchLine">
                                  <i id="dispatchArrow" class="fa fa-arrow-right"></i>
                               </div>
                              <div class="ordered" id="dispatched">
                                <i class="fa fa-archive"></i>
                                <h5 id="dispatchedH5">Dispatched</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="orderPannel">
                               <div id="shippingLine">
                                  <i  id="shippingArrow" class="fa fa-arrow-right"></i>
                               </div>
                              <div class="ordered" id="shipping">
                                <i class="fa fa-archive"></i>
                                <h5 id="shippingH5">Shipped</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="orderPannel">
                              <div class="ordered" id="delivered">
                                <i class="fa fa-archive"></i>
                                <h5 id="deliveredH5">Delivered</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                             
                          </div>
                        </div>
                                       <table  id="example" cellpadding="0" cellspacing="0" border="0" width="100%" class="datatable-1" >
  <thead>
    <style>
      table th,td{padding: 10px;margin: 10px;}
    </style>
    
    <tr >
      <th >#</th>
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