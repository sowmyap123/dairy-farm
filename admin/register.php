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

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">

  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<body>
<style>

.container {

 background-color: #F0F0F0;
}
.container{
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 9px 40px;

  text-decoration: none;
  display: inline-block;
border-radius: 3px;
  font-size: 15px;

}

</style>
</body>
<div class="container" >
<div class="col-sm-6 col-sm-offset-3">
  <h3 class="text-center"><strong>Create Account</strong></h3>
 </br>
  
 <form name="myForm" method="post" onclick="validateForm()" > 
  <div class="row">
  <div class="input-group">

      <span class="input-group-addon"><a href="#" class="glyphicon glyphicon-user"></a></span>
      <input id="fUser" type="User" style="border-radius: 3px;" class="form-control" name="fname" placeholder="First Name">
    </div>
	</br>
	 <div class="input-group">

      <span class="input-group-addon"><a href="#" class="glyphicon glyphicon-user"></a></span>
      <input id="lUser" type="User" style="border-radius: 3px;" class="form-control" name="lname" placeholder="Last Name">
    </div>
	<br>
	    <div class="input-group">

      <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
      <input id="User" type="User" style="border-radius: 3px;" class="form-control" name="username" placeholder="User Name">
    </div>
		</br>
    <div class="input-group">
      <span class="input-group-addon"><a href="#"  class="glyphicon glyphicon-envelope"></a></span>
      <input id="email" type="text" style="border-radius: 3px;" class="form-control" name="email" placeholder="Email">
    </div>
</br>
 <div class="input-group">
      <span class="input-group-addon"><a href="#"  class="glyphicon glyphicon-envelope"></a></span>
      <input id="password" type="password" style="border-radius: 3px;" class="form-control" name="password" placeholder="Password">
    </div>
</br>
	<div class="col-sm-6 col-sm-offset-3">
<input type="submit" class="btn btn-success pl-5 pr-5" name="submit" value="register">
<a href="login.php"><input type="button" class="btn btn-success pl-5 pr-5" value="Login"></a>
</br>
</br>
</div>

</form>
</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</body>
</html>