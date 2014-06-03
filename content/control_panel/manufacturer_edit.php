<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Manufacturer edit</title>
</head>
<body>
<?php

		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['manufacturer_ID']);
		$name = mysql_real_escape_string($_POST['manufacturer_name']);
		$website = mysql_real_escape_string($_POST['manufacturer_website']);
		$address = mysql_real_escape_string($_POST['manufacturer_address']);
		$phone = mysql_real_escape_string($_POST['manufacturer_phone']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

echo "<h3>EDIT MANUFACTURER</h3>
	<div id='manufacturer_edit_forma'>
		<form action='manufacturer_ispis.php' method='post'>
			<input type='hidden' name='manufacturer_ID' value='$id'>
			Manufacturer name:<br>
			<input type='text' name='manufacturer_name' value='$name' ><br>
			Manufacturer website:<br>
			<input type='text' name='manufacturer_website' value='$website'><br>
			Manufacturer address:<br>
			<input type='text' name='manufacturer_address' value='$address'><br>
			Manufacturer phone:<br>
			<input type='text' name='manufacturer_phone' value='$phone'><br>
			Vertification status:<br>
			<input type='text' name='verification_status' value='$verification_status'><br>
			Vertification note:<br>
			<input type='text' name='verification_note' value='$verification_note'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>";
	close_connection();
?>
</body>
</html>