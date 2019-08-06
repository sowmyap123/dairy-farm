<html>
	<head>
		<title>File Uploading</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<div class="container">
		<h1>File Uploading</h1>
		<?php 
		
session_start();
include('db.php');
include("menu.php");
			if(isset($_POST['submit']))
			{
				if(is_uploaded_file($_FILES['image']['tmp_name']))
				{
					$filename=$_FILES['image']['name'];
					$size=$_FILES['image']['size'];
					$type=$_FILES['image']['type'];
					$tmp=$_FILES['image']['tmp_name'];
					$error=$_FILES['image']['error'];
					
					$ext=substr($filename,strpos($filename,"."));
					$str="1234567890abcdefghijklmnopqrstuvwxyz";
					$uq=substr(str_shuffle($str),10,16)."_".time();
					
					
					
					//check file size
					if($size<(1024*1024))
					{
						if($ext==".jpg" || $ext==".png" || $ext==".gif" || $ext==".jpeg" )
						{
							if(move_uploaded_file($tmp,"profile/".$uq."_".$filename))
							{
						$stmt = mysqli_query($conn,"update register set profilepic='".$uq."_".$filename."'  where id='".$_SESSION['id']."' ");      

								echo "<p>FIle Uploaded Successfully</p>";
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
					echo "Please sleect a file to upload";
				}
				
			}
		?>
		
		
		<form class="upload"  action="" method="POST" enctype="multipart/form-data">
			
					
					<input  class="btn" type="file" name="image">
					<input class="btn" type="submit" name="submit"
					value="Register" >
			
		</form>
		</div>
	</body>
	</html>