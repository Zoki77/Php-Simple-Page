<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Measuring units edit</title>
</head>
<body>
<?php

		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['measuring_unit_ID']);
		$description = mysql_real_escape_string($_POST['measuring_unit_description']);
		$abbr = mysql_real_escape_string($_POST['measuring_unit_abbr']);

echo "<h3>EDIT MEASURING UNITS</h3>
	<div id='measuring_units_edit_forma'>
		<form action='measuring_units_ispis.php' method='post'>
			<input type='hidden' name='measuring_unit_ID' value='$id'>
			Measuring unit description:<br>
			<input type='text' name='measuring_unit_description' value='$description' ><br>
			Measuring unit abbreviation:<br>
			<input type='text' name='measuring_unit_abbr' value='$abbr'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>";
	close_connection();
?>
</body>
</html>