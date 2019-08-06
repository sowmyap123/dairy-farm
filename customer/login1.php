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

