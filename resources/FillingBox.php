<?php
	$con = mysql_connect("localhost", "root", "password");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" . mysql_error());
	$query = "SELECT Flavor, rgb FROM Fillings";
	$result = mysql_query($query);
	//While loop that goes through all of the Flavor/img combinations
	while($row = mysql_fetch_array($result)){
		echo $row['Flavor'] . " " . $row['rgb'];
		echo "<br>";
	}
	mysql_close($con);
	?>
