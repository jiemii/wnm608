<?php
include_once "lib/php/functions.php";
resetCart();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Page</title>

	<?php include "parts/meta.php"; ?>
</head>
<body>

	<?php include "parts/navbar.php"; ?>

	<div class="container">
		<div class="card soft">
			<h2>Thank you for your purchase</h2>
			<p><a href="product_list.php">Continue Shopping</a></p>
		</div>
	</div>
	
</body>
</html>