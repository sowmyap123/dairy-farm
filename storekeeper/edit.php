 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array(); 
// connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
include("index.php");
if(isset($_POST['submit']))
	{
		$pname = ucfirst(mysqli_real_escape_string($conn, $_POST['pname']));
		$pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		if(is_uploaded_file($_FILES['pimage']['tmp_name']))
				{
					$filename=$_FILES['pimage']['name'];
					$size=$_FILES['pimage']['size'];
					$type=$_FILES['pimage']['type'];
					$tmp=$_FILES['pimage']['tmp_name'];
					$error=$_FILES['pimage']['error'];
					$ext=substr($filename,strpos($filename,"."));
					$str="1234567890abcdefghijklmnopqrstuvwxyz";
					$uq=substr(str_shuffle($str),10,16)."_".time();
					//check file size
					date_default_timezone_set('Asia/Kolkata');
		  // echo $curr_time = time(); echo "<br>";
			$curtime= date('Y-m-d H:i:s');
					if($size<(1024*1024))
					{
						if($ext==".jpg" || $ext==".png" || $ext==".gif" || $ext==".jpeg" )
						{
							if(move_uploaded_file($tmp,"img/".$uq."_".$filename))
							{
		$stmt = mysqli_query($conn,"update `products` set `pname`='".$pname."', `pdesc`='".$pdesc."', `price`='".$price."',filename='".$uq."_".$filename."' where id='".$_GET['id']."'");      
								echo "<p>Product Updated successfully</p>";
                                  
							}
							else
							{
								echo "<p>Sorry Unable to Upload</p>";
							}
						}
						else
						{
							echo "<p>Please Select a valid Image like 
							jpg, png, gif</p>";
						}
					}
					else
					{
						echo "<p>FIle size should below 1MB</p>";
					}
				}
				else
				{
				$stmt = mysqli_query($conn,"update `products` set `pname`='".$pname."', `pdesc`='".$pdesc."', `price`='".$price."' where id='".$_GET['id']."'");      
				$last_id = mysqli_insert_id($conn);
				$stmt = mysqli_query($conn,"INSERT INTO `storehistory`(`sid`, pid,`action`, `description`) VALUES ('".$_SESSION['sid']."','".$_GET['id']."','edit','edited the product')");
								
				echo "<p>Product Updated successfully</p>";
         
				}
	}
	$query = mysqli_query($conn,"SELECT * FROM products where id='".$_GET['id']."'");
	$res = mysqli_fetch_array($query);
?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="">Edit Product</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form method="post" enctype="multipart/form-data" >
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="pname" class="form-control" value="<?php echo $res['pname'];?>">
			</div>
			<div class="form-group">
				<label>Product Description</label>
				<textarea name="pdesc" class="form-control"><?php echo $res['pdesc'];?></textarea>
			</div>
			<div class="form-group">
				<label>Product Price</label>
				<input type="number" name="price" class="form-control" value="<?php echo $res['price'];?>">
			</div>
			<div class="form-group">
				<label>Upload Product Image</label>
				<input type="file" name="pimage" class="form-control">
				<img src="img/<?php echo $res['filename'];?>">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Update Product" class="btn btn-primary">
            
			</div>
			</form>
		</div>
		
	</div>
</div>
<style>
#page-wrapper {
    position: inherit;
    margin: 0 0 0 250px;
    padding: 0 30px;
    border-left: 1px solid #e7e7e7;
}
</style>