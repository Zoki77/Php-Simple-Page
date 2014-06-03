<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Measuring units select</title>
</head>
<body>
<table width="450" border="1">
  <tr>
    <th>measuring_unit_ID</th>
    <th>measuring_unit_description</th>
    <th>measuring_unit_abbr</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$measuring_units = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Measuring_Units`;");
	

	close_connection();
	
	while($row = mysql_fetch_array($measuring_units))
  {
  echo "<tr>";
  echo "<td>" . $row['measuring_unit_ID'] . "</td>";
  echo "<td>" . $row['measuring_unit_description'] . "</td>";
  echo "<td>" . $row['measuring_unit_abbr'] . "</td>";
  echo "<td><form action='measuring_units_edit.php' method='post'>
	<input type='hidden' value='$row[measuring_unit_ID]' name='measuring_unit_ID'>
	<input type='hidden' value='$row[measuring_unit_description]' name='measuring_unit_description'>
	<input type='hidden' value='$row[measuring_unit_abbr]' name='measuring_unit_abbr'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[measuring_unit_ID]' name='measuring_unit_ID'>
	<input type='hidden' value='Measuring_Units' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>