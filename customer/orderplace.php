<?php
session_start();
include('db.php');
include('menu.php');
?>
<div style="text-align:center">
<img src="products/thanks.png">
<h1>Order Placed Successfully<h1>
<h3>Thanks for your order.</h3>
<h1 style="font-weight:bold">Your Order Id is # <?php echo $_GET['id']; ?></h1>
</div>