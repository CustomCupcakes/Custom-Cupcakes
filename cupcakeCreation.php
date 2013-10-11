<!doctype html>
<!-- Carter Dewey 36041425 -->
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styleCC.css">
		<script language="javascript" type="text/javascript" src="createCupcakeJS.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

		<title> Create a Cupcake </title>
	</head>
	<?php session_start();
	$UserID = $_SESSION['UserID']?>
	<body>
		<div id = "order">
			<form action = "analytics.html">
			<h3>Order Summary</h3>
			<button type ="submit" id = 'order_button' class = "buttonCenter">Order</button>
			</form>
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
				<?php include 'FillingBox.php'?>
			</div>
			<div id = "frosting">
				<h3>Frosting</h3>
				<?php include 'FrostingBox.php'?>
			</div>
			<div id = "toppings">
				<h3>Toppings</h3>
				<?php include 'ToppingBox.php'?>
				<button type="reset" class = "buttonCenter" id = "clearTop">Clear All Toppings</button>
			</div>
			<button type ="reset" id = "resetCup">Reset Cupcake</button>
			<button type ="button" id = "update">Update Order</button>
			<input type = "number" id = "stepper" min = "1" max = "99" value = "1" />
			<button type ="submit" id = 'favorites_button' class = "buttonCenter">Add to Favorites</button>
		</main>
		
	</body>
</html>