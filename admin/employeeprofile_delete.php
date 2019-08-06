

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
	   if(!empty($_GET['eid']))
{
$reslt = mysqli_query($conn,"DELETE FROM `employee` WHERE employeeid='".$_GET['eid']."'");
echo "deleted successfully";
}
else
{
	header("location:dashboard.php");
}
?>
   </div>
            </div>