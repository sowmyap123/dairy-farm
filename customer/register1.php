<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
	// REGISTER USER
if(isset($_POST['submit']))
	{
		// receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
		$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		
		
		
		$reslt = mysqli_query($conn,"SELECT * FROM register WHERE username='".$username."' ");
		$count=mysqli_num_rows($reslt);
		if($count==0)
		{
			$reslts = mysqli_query($conn,"INSERT INTO `register`(fname,`username`,`email`, `password_1`,`password_2`,`age`,`address`,`gender`) VALUES ('".$fname."','".$username."','".$email."','".$password."','".$password."','".$age."','".$address."','".$gender."')");
			echo "Registered successfully";
		}
		else
		{
			echo "username already exists";
		}
	}
		?>
