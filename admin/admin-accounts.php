
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
  
$admin_id=$_POST['admin_id'];
$admin_id_gen = rand(10000,99999);
$Fullname=$_POST['Fullname'];
$username=$_POST['username'];
$roleLevel=$_POST['roleLevel'];
$password=$_POST['password'];
$updationDate=$_POST['updationDate'];

$sql=mysqli_query($con,"insert into admin(admin_id,Fullname,username,roleLevel,password,updationDate) values('$admin_id_gen','$Fullname','$username','$roleLevel','$password','$updationDate')");
$_SESSION['msg']="Added Successfully !!";

}
 if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from admin where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
      }
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Admin Account</title>
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
      <h3><i class="fa fa-users"></i>&nbsp Admin Accounts</h3>
    </div> 
    <div class="col-lg-2">
         <?php
        $feedback_rt = mysqli_query($con,"SELECT * FROM admin");
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
          <th>Admin Id.</th>
          <th>Access Level</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Password</th>
          <th>Creation Date</th>
          <th>Updation Date</th>
          <th>Update</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php $query=mysqli_query($con,"select * from admin");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo htmlentities($cnt);?></td>
          <td><?php echo htmlentities($row['admin_id']);?></td>
          <td><?php echo htmlentities($row['roleLevel']);?></td>
          <td><?php echo htmlentities($row['Fullname']);?></td>
          <td> <?php echo htmlentities($row['username']);?></td>
          <td><?php echo htmlentities($row['password']); ?></td>
          <td><?php echo htmlentities($row['creationDate']); ?></td>
        <td><?php echo htmlentities($row['updationDate']); ?></td>
           <td> 
            <a href="edit-admin.php?id=<?php echo $row['id']?>">
              <button class="buttonCheck" ><i class="fa fa-pencil"></i></button>
            </a>
          </td>
          <td>
            <a href="admin-accounts.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
              <button class="buttonTimes"><i class="fa fa-trash"></i></button>
            </a>
          </td>
          <?php $cnt=$cnt+1; } ?>
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
          <h3><i class="fa fa-user-plus"></i>&nbsp Add Account</h3>
        </div>
        <div class="col-lg-4">
     <div class="moduleError">
      <?php if(isset($_POST['submit']))
      {?>
      <div class="alert alert-success" id="success-alert">
        
        <strong>Well done!</strong><?php echo htmlentities($_SESSION['msg']);?>
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
    
  </style>
        </div>
      </div>
    </div>
    <div class="formPannel">
      <form action="" name="insertproduct" method="post" enctype="multipart/form-data">
        <input type="text" name="admin_id" hidden="">
        <input type="text" name="updationDate" hidden="">
        <div class="form-group">
          <div class="row">
          <div class="col-lg-3">
            <label for="">Fullname</label>
            <input type="text" name="Fullname" class="form-control" placeholder="Fullname">
             
          </div>
          <div class="col-lg-3">
             <label for="">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="col-lg-3">
             <label for="">Role Level</label>
            <select name="roleLevel" id="" class="form-control">
              <option value="Select Any">Select Any</option>
              <option value="Level 01">Level 01</option>
              <option value="Level 02">Level 02</option>
            </select>
          </div>

          <div class="col-lg-3">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-10"></div>
          <div class="col-lg-2">
            <button type="submit" name="submit" class="buttonAdd">Add Account</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
                  
      
  <style>
    .alert-success{background-color: green;color: white;text-align: center;line-height: 30px;}
    button.close{color: white;}
  </style>       
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('include/footer.php');?>
 
  </body>
</html>
<?php } ?>