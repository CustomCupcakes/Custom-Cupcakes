<?php
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
   	if (!$con)
   	{
		die('Could not connect: ' .mysql_error());
   	}

   	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" .mysql_error());

	$email = $_GET['email'];
	echo $email;
	$get_user_id_query = "SELECT UserID from users u where u.EmailAddress = '$email'";
	$id_query_result = mysql_query($get_user_id_query);
	while ($row = mysql_fetch_assoc($id_query_result))	{
		$id = $row ['UserID'];
					}
	//session_start();
	//$_SESSION['UserID']=$id;

	$userID = $id; 
	$password = $_GET['password'];

	$query = "select Password from users where userID = '$userID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result))	{
		$database_password = $row ['Password'];
					}
	echo $database_password;

	if ($password != $database_password) {
		header ('Location: error.html');
	} else {
		//$_SESSION['var'] = $result['user_id'];
		header ('Location: cupcakeCreation.php');
	}

	mysql_close($con);
	?>