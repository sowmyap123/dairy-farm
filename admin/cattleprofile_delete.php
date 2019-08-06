<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
include("index.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
  <div class="page-wrapper">
        
       <div class="container-fluid">
	   <?php
	   if(!empty($_GET['cid']))
{
$reslt = mysqli_query($conn,"DELETE FROM `cattleprofile` WHERE cid='".$_GET['cid']."'");
echo "deleted successfully";
}
else
{
	header("location:dashboard.php");
}
?>
   </div>
            </div>