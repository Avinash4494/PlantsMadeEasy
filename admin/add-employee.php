
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
  if(isset($_POST['submit']))
{
$emp_id=$_POST['emp_id'];
$emp_id_gen = rand(100000,999999);
$empRole=$_POST['empRole'];
$gender=$_POST['gender'];
$Fullname=$_POST['Fullname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$aadharNo=$_POST['aadharNo'];
$dateOfBirth=$_POST['dateOfBirth'];
$panNo=$_POST['panNo'];
$qualification=$_POST['qualification'];
$address=$_POST['address'];
$dateOfJoining=$_POST['dateOfJoining'];
$emp_status=$_POST['emp_status'];
$updationDate=$_POST['updationDate'];

$sql=mysqli_query($con,"insert into employee (emp_id,empRole,gender,Fullname,contact,email,aadharNo,dateOfBirth,panNo,qualification,address,dateOfJoining,emp_status,updationDate) values('$emp_id_gen','$empRole','$gender','$Fullname','$contact','$email','$aadharNo','$dateOfBirth','$panNo','$qualification','$address','$dateOfJoining','$emp_status','$updationDate')");
$_SESSION['msg']="Added Successfully !!";

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
              <style>
                .addAccount .well
                {
                  background-color: white;
                  padding: 0px;
                }
                    .buttonAdd {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 10px;
    border: 1px solid #00BCD2;
    color: white;
    width: 100%;
 
}
              </style>
<div class="addAccount">
  <div class="well">
    <div class="moduleHead">
      <div class="row">
        <div class="col-lg-8">
          <h3><i class="fa fa-briefcase"></i>&nbsp Add Account</h3>
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
    .formPannel select{border:1px solid #00bcd2;}
  </style>
        </div>
      </div>
    </div>
    <div class="formPannel">
      <form action="" name="insertproduct" method="post" enctype="multipart/form-data">
        <input type="text" name="emp_id" hidden="">
        <input type="text" name="updationDate" hidden="">
        <div class="form-group">
          <div class="row">
          <div class="col-lg-3">
            <label for="">Fullname</label>
            <input type="text" name="Fullname" class="form-control" placeholder="Fullname">
          </div>
          <div class="col-lg-3">
             <label for="">Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact">
          </div>
          <div class="col-lg-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="col-lg-3">
             <label for="">Designation</label>
            <select name="empRole" id="" class="form-control">
              <option value="Select Designation">Select Designation</option>
              <option value="Level 01">Level 01</option>
              <option value="Level 02">Level 02</option>
            </select>
          </div>
        </div>  
        <div class="row">
            <div class="col-lg-3">
              <label for="">Aadhar Number</label>
              <input type="text" name="aadharNo" class="form-control" placeholder="Aadhar Number">
            </div>
            <div class="col-lg-3">
               <label for="">PAN Number</label>
              <input type="text" name="panNo" class="form-control" placeholder="PAN Number">
            </div>
            <div class="col-lg-3">
              <label for="">Date Of Birth</label>
              <input type="date" name="dateOfBirth" class="form-control"  >
            </div>
            <div class="col-lg-3">
                <label for="">Date Of Joining</label>
              <input type="date" name="dateOfJoining" class="form-control"  >
            </div>
        </div>
          <div class="row">
            <div class="col-lg-3">
              <label for="">Gender</label>
              <select name="gender" id="" class="form-control">
                <option value="Select Gender">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-lg-3">
              <label for="">Qualification</label>
              <input type="text" name="qualification" class="form-control" placeholder="Qualification">
            </div>
            <div class="col-lg-3">
               <label for="">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Address">
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
          <div class="col-lg-5"></div>
          <div class="col-lg-2">
                 <button type="submit" name="submit" class="buttonAdd" style="margin-top: 15px;">Add Account</button>
            </div>
             <div class="col-lg-5"></div>
        </div>
        </div>
      </form>
    </div>
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