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

    $sth = mysql_query("select Cakes.Flavor, Fillings.Flavor, Frosting.Flavor, Toppings.name, title from FavoriteCupcakes left join Cakes on FavoriteCupcakes.CupcakeID = Cakes.CakeID join Fillings on FavoriteCupcakes.CupcakeFillingID = Fillings.FillingID join Frosting on FavoriteCupcakes.FrostingID = Frosting.FrostingID join ToppingBridge on FavoriteCupcakes.FavoriteID = ToppingBridge.FavoriteID join Toppings on ToppingBridge.ToppingID = Toppings.ToppingID join FavoriteLookup on FavoriteCupcakes.FavoriteID = FavoriteLookup.FavoriteID where UserID ='$userID'");
   
    $rows = array();
    while($r = mysql_fetch_assoc($sth))
    {
            $rows[] = $r;
    }

    print json_encode($rows);
   }


## The below receives JSON for adding a registered user's new cupcake design ##
###############################################################################

   function receiveJSONdesign($JSONstring)
{
$data = json_decode($JSONstring,true);

$con = mysql_connect("localhost", "cupcakes", "muffinman");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("Cupcakes", $con)
or die("Unable to select database:" . mysql_error());

$userID = $data['userID'];
$flavor = $data['flavor'];
$flavor = mysql_query("Select CakeID from Cakes where Flavor = '$flavor'");
$flavorID = mysql_fetch_array($flavor);

$title = $data['title'];
$filling = $data['filling'];
$filling = mysql_query("Select FillingID from Fillings where Flavor = '$filling'");
$fillingID = mysql_fetch_array($filling);

$frosting = $data['frosting'];
$frosting = mysql_query("Select FrostingID from Frosting where Flavor = '$frosting'");
$frostingID = mysql_fetch_array($frosting);

$result = mysql_query("SELECT FavoriteID FROM FavoriteCupcakes
     ORDER BY FavoriteID desc LIMIT 1");
$favoriteID = mysql_fetch_array($result);
$favoriteID[0] = $favoriteID[0] + 1;
$query = "INSERT INTO FavoriteCupcakes (FavoriteID, UserID,
    CupcakeID, FrostingID, CupcakeFillingID)     
    values ('$favoriteID[0]', '$userID', '$flavorID[0]', '$frostingID[0]',
        '$fillingID[0]')";
mysql_query($query);

mysql_query("INSERT INTO FavoriteLookup (FavoriteID, title)
    values ('$favoriteID[0]', '$title')");

$topping = $data['toppings'];
$toppingCount = count($topping);

for($i = 0; $i < $toppingCount; $i++){
$toppingID = mysql_query("SELECT ToppingID FROM Toppings WHERE name = '$topping[$i]'");
$toppingID = mysql_fetch_array($toppingID);
mysql_query("INSERT INTO ToppingBridge(FavoriteID, ToppingID)
    values ('$favoriteID[0]', '$toppingID[0]')");
    }

}
  

#The below returns JSON which contains sales information for flavors, fillings, frosting, & toppings
################################################################################

   function returnJSONsales( )
   {
    $con = mysql_connect("localhost", "cupcakes", "muffinman");
    if (!$con)
    {
       die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("Cupcakes", $con)
       or die("Unable to select database:" . mysql_error());

    #$sth = mysql_query("SELECT * from FavoriteCupcakes where UserID = '$userID'");

    $cakeFlvrQry = mysql_query("SELECT Flavor, COUNT(CupcakeID) FROM FavoriteCupcakes f INNER JOIN Cakes c ON(f.CupcakeID = c.CakeID) group by Flavor;");

    $rows = array();
    while($r = mysql_fetch_assoc($sth))
    {
            $rows[] = $r;
    }

    return json_encode($rows);
   }
?>