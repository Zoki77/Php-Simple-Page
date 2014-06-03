<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reseller edit</title>
</head>
<body>
<?php

		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['reseller_ID']);
		$name = mysql_real_escape_string($_POST['reseller_name']);
		$website = mysql_real_escape_string($_POST['reseller_website']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

echo "<h3>EDIT RESELLER</h3>
	<div id='reseller_edit_forma'>
		<form action='reseller_ispis.php' method='post'>
			<input type='hidden' name='reseller_ID' value='$id'>
			Reseller name:<br>
			<input type='text' name='reseller_name' value='$name' ><br>
			Reseller website:<br>
			<input type='text' name='reseller_website' value='$website'><br>
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