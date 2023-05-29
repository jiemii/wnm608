<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Qalamate</title>

	<?php include "parts/meta.php"; ?>
</head>

<body class="flush">

	<?php include "parts/navbar.php"; ?>

	<div class="view-window" style="background-image:url(img/bg.jpg)">
	</div>

	<div class="container">
		<div class="card soft">
			<h2>Welcome</h2>
			<p>The shop should offer a wide range of products to cater to different calligraphy needs. This includes different types of pens (qalams), inks, papers, beginner's kits, etc.</p>
		</div>
	</div>

	<div class="container">
		<h2>Latest Pens</h2>
		<?php recommendedCategory("pen"); ?>
		<h2>Latest Tools</h2>
		<?php recommendedCategory("tool"); ?>
	</div>

</body>

</html>