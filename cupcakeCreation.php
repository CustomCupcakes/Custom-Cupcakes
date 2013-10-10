<!doctype html>
<!-- Carter Dewey 36041425 -->
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styleCC.css">
		<title> Create a Cupcake </title>
	</head>
	<body>
		<div id = "order">
			<h3>Order Summary</h3>
			<button type ="submit" class = "buttonCenter">Order</button>
		</div>
		<aside id = "favorites">
			<h3>Favorites</h3>
		</aside>
		<main id = "options">
			<div id = "flavor">
				<h3>Cupcake Flavor</h3>
				<?php include 'CakeBox.php'?>
			</div>
			<div id = "filling">
				<h3>Filling</h3>
			</div>
			<div id = "icing">
				<h3>Icing</h3>
			</div>
			<div id = "toppings">
				<h3>Toppings</h3>
				<button type="reset" class = "buttonCenter" id = "clearTop">Clear All Toppings</button>
			</div>
			<button type ="reset" id = "resetCup">Reset Cupcake</button>
			<button type ="button" id = "update">Update Order</button>
			<input type = "number" id = "stepper" min = "1" max = "99" value = "1" />
			<button type ="submit" class = "buttonCenter">Add to Favorites</button>
		</main>
		
	</body>
</html>