<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Measuring units ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['measuring_unit_ID']);
		$description = mysql_real_escape_string($_POST['measuring_unit_description']);
		$abbr = mysql_real_escape_string($_POST['measuring_unit_abbr']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Measuring_Units` SET measuring_unit_description='$description' ,measuring_unit_abbr='$abbr' WHERE measuring_unit_ID='$id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

<table width="450" border="1">
  <tr>
    <th>measuring_unit_ID</th>
    <th>measuring_unit_description</th>
    <th>measuring_unit_abbr</th>
  </tr>
<?php
	open_connection();
	
	$measuring_unit = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Measuring_Units` WHERE measuring_unit_ID='$id';");
	
	close_connection();

	while($row = mysql_fetch_array($measuring_unit))
  {
  echo "<tr>";
  echo "<td>" . $row['measuring_unit_ID'] . "</td>";
  echo "<td>" . $row['measuring_unit_description'] . "</td>";
  echo "<td>" . $row['measuring_unit_abbr'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>