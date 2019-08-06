<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
include("index.php");  

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!empty($_GET['pid']))
{
$reslt = mysqli_query($conn,"DELETE FROM `expenses` WHERE pid='".$_GET['pid']."'");
echo "deleted successfully";
}
else
{
	header("location:dashboard.php");
}
?>




