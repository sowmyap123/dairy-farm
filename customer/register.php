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
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
		
		$reslt = mysqli_query($conn,"SELECT * FROM admin WHERE username='".$username."' ");
		$count=mysqli_num_rows($reslt);
		if($count==0)
		{
			$reslts = mysqli_query($conn,"INSERT INTO `admin`(fname,lname,`username`, `email`, `password`) VALUES ('".$fname."','".$lname."','".$username."','".$email."','".$password."')");
			echo "Registered successfully";
		}
		else
		{
			echo "username already exists";
		}
	}
		?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
  	

	
  <form method="post" action="register.php" autocomplete="off">
   <div class="header">
   <h2>Register</h2>
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	 
  	  <input placeholder="Fullname" type="text" name="fname" >
  	</div>
	<div class="input-group">
  	 
  	  <input placeholder="Username" type="text" name="username" >
  	</div>
  	<div class="input-group">
  	
  	  <input placeholder="Email" type="email" name="email" >
  	</div>
  	<div class="input-group">
  	 
  	  <input placeholder="Password" type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  
  	  <input placeholder="Confirm password" type="password" name="password_2">
  	</div>
	<div class="input-group">

  	  <input  placeholder="Mobile" type="text" name="mobile" >
  	</div>
	<div class="input-group">
  	
  	  <input placeholder="Age" type="text" name="age" >
  	</div>
	<div class="input-group">
  	  
  	  <input  placeholder="Address" type="text" name="address" >
  	</div>
			Male<input type="radio" name="gender" value="male"><span class="checkmark"></span>
		
			Female<input type="radio" name="gender" value="female"><span class="checkmark"></span>
		

	

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	</div>
  </form>
</body>
</html>