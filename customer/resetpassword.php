<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	   <img src="log.png" />
		<h2>Reset Password</h2>
			  </div>
			
				<form  class="fcls" method="post" >
					<div class="input-group">
						
							<input type="password" name="password1" id="password1" placeholder="New Password" /> 
						</div>
							<div class="input-group">
						<input type="password" name="password2" id="password2" placeholder="Confirm New Password" />
						</div>
					
					<input type="hidden" value="<?php echo $_GET['hash'];?>" name="gen" id="gen" />
					 <button type="submit" class="btn" name="resetpass"> Reset Password</button>
				</form>
			


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST['resetpass']))
			{
  $pass1=$_POST['password1'];
  $pass2=$_POST['password2'];
  $gen_hashd=$_POST['gen'];
  echo $gen_hashd;
  if($pass1 == $pass2)
  {
  $query = "update register set password='".md5($pass2)."' where id='".$gen_hashd."'";
  mysqli_query($conn,$query);
  header("location:login.php");
  }
			}	
?>
</body>
</html>