<?php
	$con = mysql_connect("localhost", "cupcakes", "muffinman");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("Cupcakes", $con)
		or die("Unable to select database:" . mysql_error());

	$query = "SELECT EmailAddress FROM users WHERE EmailAddress='$_GET[email]'";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0){
?>
		<script type="text/javascript">
			alert("The email address <?php echo $_GET['email'] ?> is already in use");
			history.back();
		</script>
<?php		
	}
	else {
	$query = "INSERT INTO users VALUES(NULL,'$_GET[mailing]', 
		'$_GET[fname]','$_GET[lname]','$_GET[address]',
		'$_GET[city]','$_GET[state]','$_GET[zip]',
		'$_GET[email]','$_GET[password]','$_GET[phone]')";
	mysql_query($query);	
	header('Location: index.html');
}
?>