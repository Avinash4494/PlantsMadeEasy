<?php
define('DB_SERVER','127.0.0.1:3306');
define('DB_USER','u794345337_utpannseeds');
define('DB_PASS' ,'@Utpann9454767811');
define('DB_NAME', '');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>