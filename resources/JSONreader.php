<?php

	$JSONstring = file_get_contents("data/menu.json");
	$data = json_decode($JSONstring,true);

	$con = mysql_connect("localhost", "cupcakes", "muffinman");
   	if (!$con)
   	{
		die('Could not connect: ' .mysql_error());
   	}

   	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" .mysql_error());

	for($a = 0; $a < 14; $a++)
	{
		mysql_query("INSERT INTO Cakes (CakeID, Flavor, img_url) values ('$a', '".$data['menu']['cakes'][$a]['flavor']."', '".$data['menu']['cakes'][$a]['img_url']."')");
	}

	for($b = 0; $b < 24; $b++)
	{
		mysql_query("INSERT INTO Frosting (FrostingID, Flavor, img_url) values ('$b', '".$data['menu']['frosting'][$b]['flavor']."', '".$data['menu']['frosting'][$b]['img_url']."')");
	}

	for($c = 0; $c < 9; $c++)
	{
		mysql_query("INSERT INTO Fillings (FillingID, Flavor, rgb) values ('$c', '".$data['menu']['fillings'][$c]['flavor']."', '".$data['menu']['fillings'][$c]['rgb']."')");
	}
	
	for($d = 0; $d < 15; $d++)
	{
		mysql_query("INSERT INTO Toppings (ToppingID, name) values ('$d', '".$data['menu']['Toppings'][$d]."')");
	}

	
		/*$hello = "INSERT INTO Cakes (CakeID, Flavor, img_url) values ('0', '".$data['menu']['cakes'][0]['flavor']."', '".$data['menu']['cakes'][0]['img_url']."')";
	
print $hello;
		print $data['menu']['cakes'][0]['img_url'];
	print "hello";*/
	
	

   	//mysql_close($con);
?>
   
