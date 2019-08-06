<?php
session_start();
include('db.php');
include("menu.php");
$query = mysqli_query($conn,"SELECT * FROM orders WHERE uid='".$_SESSION['id']."' ");
if(mysqli_num_rows($query)>0)
		{
		
		?>
		<h3>Order History</h3>
		<table border=1>
			<tr>
				<th>Id</th>
				<th>Item name</th>
				<th>Item price</th>
				<th>Quantity</th>
				<th>Total price</th>
				<th>Order id</th>
				<th>Order Date</th>
			</tr>
		
			<?php 
				$i = 1;
			while($row=mysqli_fetch_array($query))
			{
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['item_name']?></td>
						<td><?php echo $row['item_price']?></td>
						<td><?php echo $row['quantity']?> litres</td>
						<td><?php echo $row['total']?> Rs</td>
						<td><?php echo $row['txn_id']?></td>
						<td><?php echo $row['created']?></td>
						
					</tr>
				<?php
				$i++;
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