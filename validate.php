<?php
$password = $_GET['pwd'];
if ($password == 'axo2013') {
	header("Location: recruitment.html");
} else {
	echo 'Password is incorrect. Go back and try again' ;
}
?>