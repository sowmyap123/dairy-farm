<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
$conn = mysqli_connect($servername, $username, $password, $dbname);
include("index.php");
$query = mysqli_query($conn,"SELECT * FROM orders ");
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
if(mysqli_num_rows($query)>0)
		{
		
		?>
		<h3>Order History Of Today</h3>
		<table border=1>
			<tr>
				<th>Id</th>
				<th>Item name</th>
				<th>Item price</th>
				<th>Order id</th>
				<th>Order By</th>
				<th>Order Date</th>
				<th>Order Time</th>
			</tr>
		
			<?php 
				$i = 1;
			while($row=mysqli_fetch_array($query))
			{
			date_default_timezone_set('Asia/Kolkata');
			$curtime= date('Y-m-d H:i:s');
               $curr_time =  strtotime($curtime);
                $bid_time = strtotime($row['created']);
                $secs = $curr_time - $bid_time;
                $dys = floor($secs / 86400);
                if ($dys < 1)
				{
					$date = $row['created'];
				$datee = date('Y-m-d', strtotime($date));
				$time = date('H:i:s', strtotime($date));
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['item_name']?></td>
						<td><?php echo $row['item_price']?></td>
						<td><?php echo $row['txn_id']?></td>
						<td><?php echo $row['name']?></td>
						<td><?php echo $datee ;?></td>
						<td><?php echo $time ;?></td>
						
					</tr>
				<?php
				$i++;
				}
			}
			?>
			
		</table>
		<?php
		}
		else
		{
			?>
				<p>Sorry! No Records Found</p>
			<?php
		}
?>
        </div>
                    </div>
                </div>
            </div>