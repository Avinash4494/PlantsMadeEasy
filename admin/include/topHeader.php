<?php include("include/headerLinks.php"); ?>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<?php 
$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query); ?>
<body onload="nameShort();">
  <div class="left-topHeading" >
  <div class="container-fluid">
    <div class="row hidden-xs">
      <div class="left_logo">
        <div class="col-lg-2 col-xs-3" >
          <a href="AdminDashboard.php">
            <img src="images/logo.png" alt=""  class="img-responsive">
          </a>
        </div>
      </div>
      <style>
        .dropdown-menu {
    margin-left: -170px;
    padding: 0px;
    width: 250px;
    background-color: #1C2833;
    color: white;
    border-radius: 0px;
    box-shadow: 0px 10px 20px 6px rgba(243, 234, 232, 0.5);
    margin-top: 25px;
}

.dropdown-menu .profileCircleDropdown img {
    height: 40px;
    width: 40px;
    margin-top: 8px;
    border-radius: 50%;
    margin-left: 15px;
}
   </style>
            <div class="col-lg-10 col-xs-12" style="background-color: #00bcd2;">
              <div class="row">
                <div class="col-lg-1 col-xs-4">
                  <div class="profileCircleDrop">
                    <img src="images/user.png" class="nav-avatar" />
                  </div>
                </div>
                <div class="col-lg-9 col-xs-3" >
                  <div class="right-topHeading">
                    <h5>Welcome</h5>
                    <h6><?php echo $row["Fullname"]; ?></h6>
 
                  </div>
                </div>
                <div class="col-lg-1 col-xs-2">
                  <div class="nameString">
                     <span id="nameString"></span>
                  </div>
                </div>
                <div class="col-lg-1 col-xs-3">
                  <div class="logoutFrame" data-toggle="dropdown" >
                    <a href=""><i class="fa fa-cogs"></i></a>
                  </div>
                  
                  <div class="dropdown-menu">
                    <div class="row">
                      <div class="col-lg-3 col-xs-3">
                        <div class="profileCircleDropdown">
                    <img src="images/user.png" class="nav-avatar" />
                        </div>
                      </div>
                      <div class="col-lg-8 col-xs-8">
                        <div class="profileName">
                          <h5><?php echo $row["Fullname"]; ?></h5>
                          <h5><i class="fa fa-user"></i>&nbsp <?php echo $row["admin_id"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="my-account.php"><h5><i class="fa fa-pencil"></i>&nbsp View and Edit Profile</h5></a>
                      </div>
                      <div class="logout">
                        <a href="logout.php"><h5><i class="fa fa-sign-out"></i>&nbsp Log Out</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>

            <script>
function nameShort() {
var str = '<?php echo $row["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameString").innerHTML=acronym;
}
 
</script>