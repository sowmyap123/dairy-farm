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

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">History</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               
        
                                
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			
			     
       <div class="container-fluid">
                
            <div class="row">
                    <div class="col-md-8">
					<?php 
		$query = mysqli_query($conn,"SELECT * FROM storehistory where sid='".$_SESSION['sid']."'  ");

		if(mysqli_num_rows($query) > 0){?>
			<table class="table">
				<tr>
					<th>id</th>
					<th>pid</th>
					<th>Action</th>
					<th>date</th>
				</tr>
				<?php 
			while($product = mysqli_fetch_array($query))
{
					?>
					<tr>
						<td><?php echo $product['id'];?></td>
						<td><a href="product_details.php?pid=<?php echo $product['pid'];?>"><?php echo $product['pid'];?></a></td>
						<td><?php echo $product['action'];?></td>
						<td><?php echo $product['date'];?></td>
						

					</tr>
					<?php
				}
				?>
			</table>
		<?php }
		else
		{
			echo "<div class='alert alert-success'>No History found.</div>";
		}
		
		?>
					</div>
					</div>
					</div>
					</div>