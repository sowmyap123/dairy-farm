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
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="bootbox.min.js"></script>
<div class="page-wrapper">

          <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">View Products</h4>
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
		<?php 
		$query = mysqli_query($conn,"SELECT * FROM products  ");

		if(mysqli_num_rows($query) > 0){?>
			<table class="table">
				<tr>
					<th>ID</th>
					
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<?php 
			while($product = mysqli_fetch_array($query))
{
					?>
					<tr>
						<td><?php echo $product['id'];?></td>
						
						<td><?php echo $product['pname'];?></td>
						<td><?php echo $product['price'];?></td>
						<td><img src="img/<?php echo $product['filename'];?>" height="50" width="50"></td>
						<td><a href="edit.php?id=<?php echo $product['id'];?>">Edit</a> | <a href="deleterecord.php?id=<?php echo $product['id'];?>">Delete</a></td>

					</tr>
					<?php
				}
				?>
			</table>
		<?php }
		else
		{
			echo "<div class='alert alert-success'>No Products found.Please <a href='addproduct.php'>Add Product</a></div>";
		}
		
		?>
		</div>


</div>
</div>
</div>
<script>
	function deleteRecord(id)
	{
		bootbox.confirm({
			message: "Do you want to delete record?",
			buttons: {
				confirm: {
					label: 'Delete',
					className: 'btn-danger'
				},
				cancel: {
					label: 'Cancel',
					className: 'btn-default'
				}
			},
			callback: function (result) {
				if(result==true)
				{
					window.location="deleterecord.php?id="+id";
				}
			}
		});
	}
</script>
