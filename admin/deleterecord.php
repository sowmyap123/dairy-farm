<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
include("menu.php");
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if (empty($id))
		{
			header("location:viewproduct.php");
		}
		else
		{
	$stmt = mysqli_query($conn,"delete from products where id='".$id."'");
	echo "Product deleted successfully";
		}
		?>
		