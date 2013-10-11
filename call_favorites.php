<?php
include 'resources/phpAPI.php';
$userID = $_GET['user'];
echo returnJSONFavoriteCupcake($userID);
?>