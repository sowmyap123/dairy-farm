  <?php
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
  if (isset($_SESSION['sid'])) {
  	
  	header('location: dashboard.php');
  }
  ?>
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="E:\Html\boostrap website\Javascript.js"></script>
<script src="some.js" type="text/javascript"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
  
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
.container{border:2px solid gray
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
  <h3 class="text-center"><strong>Create Account</strong></h3>
 </br>
  
 <form name="myForm" method="post" onclick="validateForm()" > 
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
</br>
</br>

</div>
</form>
</div>
</div>
</div>
<?php
if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		if (empty($username))
		{
			echo "username is required";
		}
		elseif(empty($password))
		{
			echo "Password is required";
		}
		else
		{
			$password = md5($password);
			$query = "SELECT * FROM store WHERE username='".$username."' AND password='".$password."'";
			$results = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($results);
			if (mysqli_num_rows($results) == 1)
			{
				$_SESSION['sid'] = $row['id'];
				header('location: dashboard.php');
			}
			else
			{
				echo "Wrong username/password combination";
			}
		}
	}
	?>