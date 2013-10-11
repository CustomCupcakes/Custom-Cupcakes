<?php
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" . mysql_error());
	$query = "SELECT Flavor, img_url FROM Cakes";
	$result = mysql_query($query);
	//While loop that goes through all of the Flavor/img combinations
	while($row = mysql_fetch_array($result)){
		//echo $row['Flavor'] . " " . $row['img_url'];
		$url = "/resources/artwork/" . $row['img_url'];
		echo " <div>
				<img src = $url>
				<p>{$row['Flavor']}</p>
			</div>
			";
	}
	mysql_close($con);
?>
