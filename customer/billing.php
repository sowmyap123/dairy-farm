<?php
include('db.php');
session_start();
$query = mysqli_query($conn,"SELECT * FROM orders WHERE uid='".$_SESSION['id']."' ");
if(mysqli_num_rows($query)>0)
		{
		
		?>
<html>
<title>Billing</title>
 <link rel="stylesheet" type="text/css" href="style.css" />
<body>
<div class="headertable">

<div class="headpart">
<a href="index.php">Home</a>
<a href="logout.php" style="float:right" >Logout</a>
</div>

<h2>Billing history</h2>
		
		<table class="tab">
			<tr class="chaild">
				<th class="listone">Id</th>
				<th class="listone">Item name</th>
				<th class="listone">Item price</th>
				<th class="listone">Item number</th>
				<th class="listone">transaction id</th>
				<th class="listone">Payment Mode</th>
				<th class="listone">Status</th>
			</tr>
			
			<?php 
			while($row=mysqli_fetch_array($query))
			{
				?>
					<tr>
						<td class="listone"><?php echo $row['id']?></td>
						<td class="listone"><?php echo $row['item_name']?></td>
						<td class="listone"><?php echo $row['item_price']?></td>
						<td class="listone"><?php echo $row['item_number']?></td>
						<td class="listone"><?php echo $row['txn_id']?></td>
						<td>COD</td>
						<td>Delivered</td>
				    </tr>
				<?php
			}
			?>
			</table>
		<?php
		}
		else
		{
			?>
				<p>Sorry! No Bills Found</p>
			<?php
		}
?>
</div>
</body>
</html>