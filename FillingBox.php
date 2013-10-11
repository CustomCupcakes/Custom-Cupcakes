<?php
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
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
		//echo $row['Flavor'] . " " . $row['rgb'];
		$id = $row['rgb'];
		echo " <div>
			<canvas id= $id ></canvas>
			<p>{$row['Flavor']}</p>
			</div>
			";
		
	}
	mysql_close($con);
	?>
