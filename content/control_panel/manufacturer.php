<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add manufacturer</title>
</head>
<body>
<br>
<h3>ADD MANUFACTURER</h3>
	<div id="manufacturer_forma">
		<form action="manufacturer.php" method="post">
			Manufacturer name:<br>
			<input type="text" name="manufacturer_name"><br>
			Manufacturer website:<br>
			<input type="text" name="manufacturer_website"><br>
			Manufacturer address:<br>
			<input type="text" name="manufacturer_address"><br>
			Manufacturer phone:<br>
			<input type="text" name="manufacturer_phone"><br>
			Vertification status:<br>
			<input type="text" name="verification_status"><br>
			Vertification note:<br>
			<input type="text" name="verification_note"><br>
			<input type="submit" value="Unesi">
		</form>	
	</div>
	<br><a href="Control_Panel.php">Control Panel</a><br>
<?php
	
	if(!isset($_POST['manufacturer_name']) && !isset($_POST['manufacturer_website']) && !isset($_POST['manufacturer_address']) && !isset($_POST['manufacturer_phone']) && !isset($_POST['verification_status']) && !isset($_POST['verification_note']))
	{
		$bool = false;
		$name = NULL;
		$website = NULL;
		$address = NULL;
		$phone = NULL;
		$verification_status = NULL;
		$verification_note = NULL;
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

		$name = mysql_real_escape_string($_POST['manufacturer_name']);
		$website = mysql_real_escape_string($_POST['manufacturer_website']);
		$address = mysql_real_escape_string($_POST['manufacturer_address']);
		$phone = mysql_real_escape_string($_POST['manufacturer_phone']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

		mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Manufacturer` (`manufacturer_name`, `manufacturer_website`, `manufacturer_address`, `manufacturer_phone`, `verification_status`, `verification_note`) VALUES ('$name', '$website', '$address', '$phone', '$verification_status', '$verification_note');");

		close_connection();
	}

	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Manufacturer name: '$name'<br>
			Manufacturer website: '$website'<br>
			Manufacturer address: '$address'<br>
			Manufacturer phone: '$phone'<br>
			Vertification status: '$verification_status'<br>
			Vertification note: '$verification_note'
		</div>";
	}
?>
</body>
</html>