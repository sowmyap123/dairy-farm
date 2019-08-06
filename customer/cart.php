<?php
session_start();
include('db.php');
include('menu.php');
date_default_timezone_set('Asia/Kolkata');

$ipAddress = $_SERVER['REMOTE_ADDR'];
$cart = mysqli_query($conn,"SELECT * FROM cart WHERE ip='".$ipAddress."' ");

$status="";
if (isset($_POST['remove']) && $_POST['remove']!=""){
$code = $_POST['pid'];
$cartd = mysqli_query($conn,"delete from cart where pid='".$code."'");
header("location:cart.php");
}

?>
<html>
<head>
<title> Shopping Cart</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">
<h2> Shopping Cart</h2>   
<div class="cart_div">
<a href="cart.php">
<img src="products/cart-icon.png" /> Cart
<span><?php echo mysqli_num_rows($cart); ?></span></a>
</div>


<div class="cart">
<?php

if(mysqli_num_rows($cart)>0){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
while($row = mysqli_fetch_array($cart)){
	$results = mysqli_query($conn,"SELECT * FROM `products` WHERE `id`='".$row['pid']."'");
$product = mysqli_fetch_assoc($results);
?>
<tr>
<td><img src='products/<?php echo $product["filename"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["pname"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='pid' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<input type='submit' class='remove' name="remove" value="Remove Item">
</form>
</td>
<td><?php echo $row["count"]; ?> Liters </td>
<td><?php echo $product["price"]; ?>rs per liter</td>
<td>Rs <?php echo $product["price"]*$row["count"]; ?> </td>
</tr>
<?php
$total_price += ($product["price"]*$row["count"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: Rs <?php echo $total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
	<?php 
	if(mysqli_num_rows($cart) > 0) 
	{?>
<button style="color:#fff;
    background-color: #28a745;
    border-color: #28a745;float:right">

<a href="checkout.php">
Proceed to pay</a>
</button>
	<?php } ?>




</div>
</body>
</html>