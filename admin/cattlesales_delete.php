<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
include("index.php");  
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!empty($_GET['cid']))
{
$reslt = mysqli_query($conn,"DELETE FROM `salescattle` WHERE cid='".$_GET['cid']."'");
echo "deleted successfully";
}
else
{
	header("location:dashboard.php");
}
?>