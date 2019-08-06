  <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password = md5($password);
			$query = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
			$results = mysqli_query($conn, $query);
			echo mysqli_num_rows($results);
			
			if (mysqli_num_rows($results) > 0)
			{
				$row = mysqli_fetch_array($results);
				$_SESSION['aid'] = $row['id'];
				$_SESSION['asuccess'] = "You are now logged in";
				header('location: dashboard.php');
			}
			else
			{
				echo "Wrong username/password combination";
			}
		
	}
	?>
  <!-- Bootstrap CSS -->
  <html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">

  </head>
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
<div class="container" >
<div class="col-sm-6 col-sm-offset-3">
  <h3 class="text-center"><strong>Login</strong></h3>
 </br>
  
 <form name="myForm" method="post" action="" onclick="validateForm()" > 
  <div class="row">

	    <div class="input-group">

      <span class="input-group-addon"><a href="#" class="glyphicon glyphicon-user"></a></span>
      <input id="User" type="User" style="border-radius: 3px;" class="form-control" name="username" placeholder="User Name">
    </div>
		</br>
    
 <div class="input-group">
      <span class="input-group-addon"><a href="#"  class="glyphicon glyphicon-envelope"></a></span>
      <input id="password" type="password" style="border-radius: 3px;" class="form-control" name="password" placeholder="Password">
    </div>
</br>
	<div class="col-sm-6 col-sm-offset-3">
<input type="submit" class="btn btn-success pl-5 pr-5" name="submit" value="login">
<a href="register.php"><input type="button" class="btn btn-success pl-5 pr-5" value="Register"></a>
</br>
</br>

</div>
</form>
</div>
</div>
</div>
