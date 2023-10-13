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
    <title>Utpann | Update Employee</title>
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
      <h3><i class="fa fa-briefcase"></i>&nbsp Update Employee Details</h3>
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
        $getId = $_GET['id'];
      $sql="SELECT * from employee where id=".$getId;
      $result = mysqli_query($con, $sql);
     while($row=mysqli_fetch_assoc($result)){
     ?>
           <div class="row">
        <div class="col-lg-8">
          <?php 
          $getStockStatus = $row['emp_status'];
          if($getStockStatus == "Active"){
           ?>
          <div class="stockIn">
             <h5><?php echo $row['emp_status'];?></h5>
          </div>
          <div class="stockInSquare"></div>
        <?php } else
        {
          ?>
           <div class="stockOut">
             <h5><?php echo $row['emp_status'];?></h5>
          </div>
           <div class="stockOutSquare"></div>
          <?php
        } ?>
        </div>
        <div class="col-lg-2">
         <div class="buttonUpdate" style="margin-top: 7px;">
            <a href="edit-employee.php?id=<?php echo $row['id'] ?>" class="buttonUpdate" target="_blank"><i class="fa fa-pencil"></i> Update Details   </a>
         </div>
        </div>
        <div class="col-lg-2">
          <button name="Submit2" type="submit" class="buttonClose" onClick="return f2();"><i class="fa fa-times"></i> Close Window </button>
        </div>
      </div>
      <style>
  .stockIn h5{background-color: green;padding: 5px;width: 70px;color: white;margin-top: 5px;padding-left: 10px;}
   .stockOut h5{background-color: orange;padding: 5px;width: 100px;color: white;margin-top: 5px;padding-left: 10px;}
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
 <br>
     <div class="row">
       <div class="col-lg-4">
         <ul class="list-group">
  <li class="list-group-item">Ref. Id. :  Ref <?php echo htmlentities($row['id']);?> </li>
  <li class="list-group-item">Employee Id. : <?php echo htmlentities($row['emp_id']);?></li>
  <li class="list-group-item">Date Of Birth : <?php echo htmlentities($row['dateOfBirth']);?></li>
  <li class="list-group-item">Gender : <?php echo htmlentities($row['gender']);?></li>
</ul>
       </div>
        <div class="col-lg-4">
         <ul class="list-group">
  <li class="list-group-item">Full Name : <?php echo htmlentities($row['Fullname']);?></li>
  <li class="list-group-item">Aadhar No : <?php echo htmlentities($row['aadharNo']);?></li>
  <li class="list-group-item">Date Of Joining : <?php echo htmlentities($row['dateOfJoining']);?></li>
  <li class="list-group-item">Qualification : <?php echo htmlentities($row['qualification']);?></li>
</ul>
       </div>
       <div class="col-lg-4">
         <ul class="list-group">
  <li class="list-group-item">Email : <?php echo htmlentities($row['email']);?></li>
  <li class="list-group-item">PAN Number : <?php echo htmlentities($row['panNo']);?></li>
  <li class="list-group-item">Address : <?php echo htmlentities($row['address'])?></li>
   <li class="list-group-item">Status : <?php echo htmlentities($row['emp_status'])?></li>
</ul>
       </div>
     </div>
    <?php   }?>
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

 