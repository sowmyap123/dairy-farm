<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if (empty($id))
		{
			header("location:viewproduct.php");
		}
		else
		{
	$stmt = mysqli_query($conn,"DELETE FROM products WHERE ID='".$id."'");
	echo "Product deleted successfully";
            header("Location:viewproduct.php");
		}