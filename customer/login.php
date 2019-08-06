<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);// LOGIN USER
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "id or username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM register WHERE (id='".$username."' OR username='".$username."') AND password='".$password."' and email_verify='1'";
  	$results = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['id'] = $row['id'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: dashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  <img src="log.png" />
  	<h2>Login</h2>
 </div>
	 
  <form  class="fcls" method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		
  		<input placeholder="Username" type="text" name="username" >
  	</div>
  	<div class="input-group">
  	
  		<input placeholder="Password" type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="submit">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
   
</body>
</html>