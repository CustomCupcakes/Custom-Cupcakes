<?php
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" . mysql_error());
	$query = "SELECT name FROM Toppings";
	$result = mysql_query($query);
	$radio = "radio";
	//While loop that goes through all of the Flavor/img combinations
	while($row = mysql_fetch_array($result)){
		//echo $row['name'];
		$name = $row['name'];
		echo "<input type=$radio value= $name>{$row['name']}";
	}
	mysql_close($con);
	?>
