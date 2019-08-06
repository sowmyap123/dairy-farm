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
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $digits = 6;
$id=str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = $query = mysqli_query($conn,"INSERT INTO register (id,fname,username,email, password,mobile,gender,address,age) 
  			  VALUES('$id','$fname','$username', '$email', '$password','$mobile','$address','$gender','$age')");
			   $user_check_query = mysqli_query($conn,"SELECT * FROM register WHERE email='".$email."'");
			  $row = mysqli_fetch_array($user_check_query);
			  $to=$email;
			  $form = "Dairy";
	    $subject="Registration Mail";
	    $message="Thank you for registering with us.Please try to login by clicking the below link\r\n";
	    $message="localhost/sample/login.php\r\n";
	    $message="You UserId:'".$row['id']."'\r\n";
	    $headers =  "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	    mail($to,$subject,$message,$headers);
	    	//$_SESSION['success'] = "You have successfully register.Please check your mail";
  	header('location: login.php');
  }
}
// LOGIN USER
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
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>