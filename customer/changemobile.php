<?php
include('db.php');
session_start();
$query = mysqli_query($conn,"SELECT * FROM register WHERE id='".$_SESSION['id']."' ");
$results = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Mobile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<div id="headpart">
<a href="index.php">Home</a>
<a href="logout.php" style="float:right" >Logout</a>
</div>
<img src="log.png" />
  <h2>Change Mobile</h2>
  </div>

<form class="fcls" method="post" action="">

<div class="input-group">
<input type="text" name="username" value="<?php echo $results['mobile'];?>">
</div>

<button type="submit" class="btn" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
$username = mysqli_real_escape_string($conn, $_POST['username']);
$query = mysqli_query($conn,"UPDATE `register` SET `mobile`='".$username."' where id='".$_SESSION['id']."' ");
header("location:index.php");
}
?>
</body>
</html>