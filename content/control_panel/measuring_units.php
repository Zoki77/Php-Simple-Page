<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add measuring units</title>
</head>
<body>
<br>
<h3>ADD MEASURING UNITS</h3>
	<div id="measuring_units_forma">
		<form action="measuring_units.php" method="post">
			Measuring unit description:<br>
			<input type="text" name="measuring_unit_description"><br>
			Measuring unit abbreviation:<br>
			<input type="text" name="measuring_unit_abbr"><br>
			<input type="submit" value="Unesi">
		</form>	
	</div>
	<br><a href="Control_Panel.php">Control Panel</a><br>
<?php
	
	if(!isset($_POST['measuring_unit_description']) && !isset($_POST['measuring_unit_abbr']))
	{
		$bool = false;
		$description = NULL;
		$abbr = NULL;
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

		$description = mysql_real_escape_string($_POST['measuring_unit_description']);
		$abbr = mysql_real_escape_string($_POST['measuring_unit_abbr']);

        	mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Measuring_Units` (`measuring_unit_description`, `measuring_unit_abbr`) VALUES ('$description', '$abbr');");

		close_connection();
	}

	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Measuring unit description: '$description'<br>
			Measuring unit abbreviation: '$abbr'
		</div>";
	}
?>
</body>
</html>