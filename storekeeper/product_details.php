<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);
include("index.php");

?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-12 d-flex no-block align-items-center">
				<h4 class="page-title">View Products Details</h4>
				<div class="ml-auto text-right">
					<nav aria-label="breadcrumb">
					</nav>
				</div>
			</div>
		</div>
	</div>
			
            
       
	   <div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
				<tr>
					<th>ID</th>
					
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
				</tr>
				<?php 
				$query = mysqli_query($conn,"SELECT * FROM products where id='".$_GET['pid']."' ");
			$product = mysqli_fetch_array($query);

					?>
					<tr>
						<td><?php echo $product['id'];?></td>
						
						<td><?php echo $product['pname'];?></td>
						<td><?php echo $product['price'];?></td>
						<td><img src="img/<?php echo $product['filename'];?>" height="50" width="50"></td>

					</tr>
					<?php
				
				?>
			</table>
				
				</div>
			</div>
		</div>
</div>