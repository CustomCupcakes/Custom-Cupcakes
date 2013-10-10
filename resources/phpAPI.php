<?php

########## The below returns JSON about a users favorite cupcake ############
#############################################################################
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if (!$con)
	{
	   die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("Cupcakes", $con)
	   or die("Unable to select database:" . mysql_error());

	$sth = mysql_query("SELECT * from users"); 
	$rows = array();
	while($r = mysql_fetch_assoc($sth)) 
	{
    		$rows[] = $r;
	}

	print $rows[10];
	print json_encode($rows);
	

## The below receives JSON for adding a registered user's new cupcake design ##
###############################################################################




#The below returns JSON which contains sales information for flavors, fillings, frosting, & toppings
################################################################################



?>
