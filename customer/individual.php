<?php
include('db.php');
include('menu.php');
date_default_timezone_set('Asia/Kolkata');
$query = mysqli_query($conn,"SELECT * FROM register WHERE id='".$_SESSION['id']."' ");
$results = mysqli_fetch_array($query);
$ipAddress = $_SERVER['REMOTE_ADDR'];
$cart = mysqli_query($conn,"SELECT * FROM cart WHERE ip='".$ipAddress."' ");
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['pid'];
$qun = $_POST['quantity'];
$result = mysqli_query($conn,"SELECT * FROM `products` WHERE `id`='$code'");
$row = mysqli_fetch_assoc($result);	
$cou = mysqli_query($conn,"SELECT * FROM `cart` WHERE `pid`='".$row['id']."'");
if(mysqli_num_rows($cou)<1)
{
$result1 = mysqli_query($conn,"INSERT INTO `cart`(`pid`, `date`, `ip`,count) VALUES ('".$row['id']."','".date('Y-m-d H:i:s')."','".$ipAddress."','".$qun."')");
echo "Item added to cart successfully";
}
else
{
	echo "Item already in the cart";
}
}
?>
<div class="container">
<div class="cart_div">
<a href="cart.php">
<img src="products/cart-icon.png" /> Cart
<span><?php echo mysqli_num_rows($cart); ?></span></a>
</div>
<h3>For individual products</h3>

<?php
$query = mysqli_query($conn,"SELECT * FROM products  ");
while($results = mysqli_fetch_array($query))
{
	?>
    	  <div class='product_wrapper'>
		    <form method='post' action=''>
<div class="productsec">
					<img class="proimg" src="admin/img/<?php echo $results['filename'];?>" alt=""  >
					<h1><?php echo $results['pname'];?></h1>
					<span><h3>Rs.<?php echo $results['price'];?> per liter</h3></span>
					<p>Quantity:<select name="quantity" selected="selected" value="" >
										<option>
										1
										</option>
										<option>
										2
										</option><option>
										3
										</option><option>
										4
										</option>
										</select>liters
					</p>
					<input type="hidden" value="<?php echo $results['id'];?>" name="pid">
				    <input type='submit' name="code" class="buy" value="Add To Cart" >
					</form>
					</div>
<?php } ?>
    </div>
	</div>

