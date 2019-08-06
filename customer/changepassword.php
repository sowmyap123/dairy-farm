<?php
include('db.php');
session_start();
$query = mysqli_query($conn,"SELECT * FROM register WHERE id='".$_SESSION['id']."' ");
$results = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>change Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  <div id="headpart">
<a href="index.php">Home</a>
<a href="logout.php" style="float:right" >Logout</a>
</div>
  <img src="log.png" />
<h1>change Password</h1>
</div>

<form class="fcls" method="post" action="">
<div class="input-group">
<input type="password" name="oldpass" placeholder="Enter old password" />
</div>
<div class="input-group">
<input type="password" name="newpass" placeholder="Enter new password" />
</div>
<button type="submit" class="btn" name="update" >Submit</button>
</form>

<?php
if (isset($_POST['update'])) {
$oldpass = mysqli_real_escape_string($conn, $_POST['oldpass']);
$newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
$query = "SELECT * FROM register WHERE  password='".md5($oldpass)."'";
  	$results = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($results);
  	if (mysqli_num_rows($results) >= 1) {
$query = mysqli_query($conn,"UPDATE `register` SET `password`='".md5($newpass)."' where id='".$_SESSION['id']."'");
header("location:index.php");
	}
	else
	{
		echo "old password does not match";
	}
}
?>
</body>
</html>
