<?php

########## The below returns JSON about a users favorite cupcakes############
#############################################################################
   function returnJSONFavoriteCupcake($userID)
   {
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
	   die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("Cupcakes", $con)
	   or die("Unable to select database:" . mysql_error()); #need toppingID and title

	$sth = mysql_query("select FavoriteCupcakes.FavoriteID, UserID, CupcakeID, ToppingID, FrostingID,CupcakeFillingID, title from FavoriteCupcakes left join ToppingBridge on FavoriteCupcakes.FavoriteID = ToppingBridge.FavoriteID join FavoriteLookup on FavoriteCupcakes.FavoriteID = FavoriteLookup.FavoriteID where UserID = 3;
"); 
	
	$rows = array();
	while($r = mysql_fetch_assoc($sth)) 
	{
    		$rows[] = $r;
	}

	return json_encode($rows);
   }


## The below receives JSON for adding a registered user's new cupcake design ##
###############################################################################

   /*function receiveJSONdesign($JSONstring)
   {
	$data = json_decode($JSONstring,true);

	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
	   die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("Cupcakes", $con)
	   or die("Unable to select database:" . mysql_error());

	for($a = 0; $a < 14; $a++)
	{
		mysql_query("INSERT INTO Cakes (CakeID, Flavor, img_url) values ('$a', '".$data['menu']['cakes'][$a]['flavor']."', '".$data['menu']['cakes'][$a]['img_url']."')");
	}
   }
   

#The below returns JSON which contains sales information for flavors, fillings, frosting, & toppings
################################################################################

   function returnJSONsales($ )
   {
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
	   die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("Cupcakes", $con)
	   or die("Unable to select database:" . mysql_error());

	$sth = mysql_query("SELECT * from FavoriteCupcakes where UserID = '$userID'"); 
	$rows = array();
	while($r = mysql_fetch_assoc($sth)) 
	{
    		$rows[] = $r;
	}

	return json_encode($rows);
   }*/

   returnJSONFavoriteCupcake(3);


?>
