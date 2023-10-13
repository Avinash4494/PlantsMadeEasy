
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
  date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
$getId = $_GET['id'];
  if(isset($_POST['submit']))
{
$Fullname=$_POST['Fullname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$aadharNo=$_POST['aadharNo'];
$dateOfBirth=$_POST['dateOfBirth'];
$panNo=$_POST['panNo'];
$qualification=$_POST['qualification'];
$address=$_POST['address'];
$empRole=$_POST['empRole'];
$emp_status=$_POST['emp_status'];

$sql=mysqli_query($con,"update employee set Fullname='$Fullname',contact='$contact',email='$email',aadharNo='$aadharNo',dateOfBirth='$dateOfBirth',panNo='$panNo',qualification='$qualification',address='$address',empRole='$empRole',emp_status='$emp_status',updationDate='$currentTime' where employee.id='$getId'");
$_SESSION['msg']="Updated Successfully !!";

}
 if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from employee where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
      }
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Employees Account</title>
    <?php include("include/headerLinks.php"); ?>
  </head>
  <body >
    <?php include('include/topHeader.php');?>
    <div class="wrapperComp">
      <div class="container-fluid">
        <div class="bodyContent">
          <div class="row">
            <div class="col-lg-2">
              <?php include('include/sidebar.php');?>
            </div>
            <div class="col-lg-10">
              <div class="sideContent">
                <div class="well">
                  <div class="moduleHead">
  <div class="row">
    <div class="col-lg-10">
      <h3><i class="fa fa-users"></i>&nbsp Employees Accounts</h3>
    </div> 
    <div class="col-lg-2">
         <?php
        $feedback_rt = mysqli_query($con,"SELECT * FROM employee");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
    </div>
  </div>
  <style>
    .buttonAdd {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    width: 100%;
    margin: 0px;
}
  </style>
</div><!-- moduleHead -->
 
<div class="tablePannel">
  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-striped" width="100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Ref. Id.</th>
        <th>Employee Id.</th>
        <th>Designation</th>
        <th width="150">Full Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Updation Date</th>
        <th>Status</th>
        <th>Update</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php $query=mysqli_query($con,"select * from employee where id=".$getId);
      $cnt=1;
      while($row=mysqli_fetch_array($query))
      {
      ?>
      <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><a href="empDetails.php?id=<?php echo $row['id']?>">Ref <?php echo htmlentities($row['id']);?></a></td>
        <td><?php echo htmlentities($row['emp_id']);?></td>
        <td><?php echo htmlentities($row['empRole']);?></td>
        <td><?php echo htmlentities($row['Fullname']);?></td>
        <td><?php echo htmlentities($row['contact']);?></td>
        <td><?php echo htmlentities($row['email']);?></td>
        <td><?php echo htmlentities($row['updationDate']); ?></td>
         <td><?php echo htmlentities($row['emp_status']); ?></td>
        <td>
          <a href="edit-employee.php?id=<?php echo $row['id']?>">
            <button class="buttonCheck" ><i class="fa fa-pencil"></i></button>
          </a>
        </td>
        <td>
          <a href="edit-employee.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
            <button class="buttonTimes"><i class="fa fa-trash"></i></button>
          </a>
        </td>
         </tr>
        <?php $cnt=$cnt+1; } ?>
     
    </tbody>
  </table>
</div>
                </div>
              </div>
              <hr>
              <style>
                .addAccount .well
                {
                  background-color: white;
                  padding: 0px;
                }
              </style>
<div class="addAccount">
  <div class="well">
    <div class="moduleHead">
      <div class="row">
        <div class="col-lg-8">
          <h3><i class="fa fa-pencil"></i>&nbsp Update Account</h3>
        </div>
        <div class="col-lg-4">
     <div class="moduleError">
      <?php if(isset($_POST['submit']))
      {?>
      <div class="alert alert-success" id="success-alert">
        
        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?>
        <?php echo htmlentities($_SESSION['msg']="");?>
        <script>
          $("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
        </script>
      </div>
      <?php } ?>
    </div><!-- moduleError -->
    <style>
    .alert-success{background-color: green;color: white;text-align: center;margin: 0px;padding: 0px; }
    .formPannel label{padding-top: 10px;}
    .buttonAdd{margin-top: 35px;}

  </style>
        </div>
      </div>
    </div>
          <?php
  $query=mysqli_query($con,"select * from employee where id='$getId'");
  $cnt=1;
  while($row=mysqli_fetch_array($query))
  {
  
  ?>
    <div class="formPannel">
      <form action="" name="insertproduct" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-3">
             <label for="">Employee Id.</label>
            <input type="text" name="Fullname" class="form-control" value="<?php echo htmlentities($row['emp_id']);?>" readonly>
          </div>
          <div class="col-lg-3">
            <label for="">Fullname</label>
            <input type="text" name="Fullname" class="form-control" value="<?php echo htmlentities($row['Fullname']);?>" placeholder="Fullname">
          </div>
          <div class="col-lg-3">
             <label for="">Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact" value="<?php echo htmlentities($row['contact']);?>">
          </div>
          <div class="col-lg-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo htmlentities($row['email']);?>">
          </div>
          
        </div>  
        <div class="row">
            <div class="col-lg-3">
              <label for="">Aadhar Number</label>
              <input type="text" name="aadharNo" class="form-control" placeholder="Aadhar Number" value="<?php echo htmlentities($row['aadharNo']);?>">
            </div>
            <div class="col-lg-3">
               <label for="">PAN Number</label>
              <input type="text" name="panNo" class="form-control" placeholder="PAN Number" value="<?php echo htmlentities($row['panNo']);?>">
            </div>
            <div class="col-lg-3">
              <label for="">Date Of Birth</label>
              <input type="date" name="dateOfBirth" class="form-control"  value="<?php echo htmlentities($row['dateOfBirth']);?>">
            </div>
            <div class="col-lg-3">
                <label for="">Designation</label>
            <select name="empRole" id="" class="form-control">
              <option value="<?php echo htmlentities($row['empRole']);?>"> <?php echo htmlentities($row['empRole']);?></option>
              <option value="Level 01">Level 01</option>
              <option value="Level 02">Level 02</option>
            </select>
            </div>
        </div>
          <div class="row">
            <div class="col-lg-3">
              <label for="">Gender</label>
             <select name="gender" id="" class="form-control">
              <option value="<?php echo htmlentities($row['gender']);?>"> <?php echo htmlentities($row['gender']);?></option>
               
            </select>
            </div>
            <div class="col-lg-3">
              <label for="">Qualification</label>
              <input type="text" name="qualification" class="form-control" placeholder="Qualification" value="<?php echo htmlentities($row['qualification']);?>">
            </div>
            <div class="col-lg-3">
               <label for="">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo htmlentities($row['address']);?>">
            </div>
            
            <div class="col-lg-3">
                <label for="">Employee Status</label>
             <select name="emp_status" id="" class="form-control">
                <option value="Select Status">Select Status</option>
                <option value="Active">Active</option>
                <option value="In Active">In Active</option>
              </select>
                
            </div>
        </div>
        <div class="row">
          <div class="col-lg-9"></div>
          <div class="col-lg-3">
             <button type="submit" name="submit" class="buttonAdd" style="margin-top: 10px;">Update Account</button>
          </div>
        </div>
        </div>
      </form>
    </div>
  <?php } ?>
  </div>
</div>
       
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('include/footer.php');?>
 
  </body>
</html>
<?php } ?>