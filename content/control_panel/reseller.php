<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add reseller</title>
</head>
<body>
<br>
<h3>ADD RESELLER</h3>
	<div id="reseller_forma">
		<form action="reseller.php" method="post">
			Reseller name:<br>
			<input type="text" name="reseller_name"><br>
			Reseller website:<br>
			<input type="text" name="reseller_website"><br>
			Vertification status:<br>
			<input type="text" name="verification_status"><br>
			Vertification note:<br>
			<input type="text" name="verification_note"><br>
			<input type="submit" value="Unesi">
		</form>	
	</div>
	<br><a href="Control_Panel.php">Control Panel</a><br>
<?php

	if(!isset($_POST['reseller_name']) && !isset($_POST['reseller_website']) && !isset($_POST['verification_status']) && !isset($_POST['verification_note']))
	{
		$bool = false;
		$name = NULL;
		$website = NULL;
		$verification_status = NULL;
		$verification_note = NULL;
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

       		$name = mysql_real_escape_string($_POST['reseller_name']);
		$website = mysql_real_escape_string($_POST['reseller_website']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

        	mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Reseller` (`reseller_name`, `reseller_website`, `verification_status`, `verification_note`) VALUES ('$name', '$website', '$verification_status', '$verification_note');");

	close_connection();
	}

	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Reseller name: '$name'<br>
			Reseller website: '$website'<br>
			Vertification status: '$verification_status'<br>
			Vertification note: '$verification_note'
		</div>";
	}
?>
</body>
</html>