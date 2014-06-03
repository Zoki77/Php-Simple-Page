<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Categories select</title>
</head>
<body>
<table width="450" border="1">
  <tr>
    <th>category_ID</th>
    <th>category_name</th>
    <th>category_description</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$categories = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Categories`;");
	

	close_connection();
	
	while($row = mysql_fetch_array($categories))
  {
  echo "<tr>";
  echo "<td>" . $row['category_ID'] . "</td>";
  echo "<td>" . $row['category_name'] . "</td>";
  echo "<td>" . $row['category_description'] . "</td>";
  echo "<td><form action='categories_edit.php' method='post'>
	<input type='hidden' value='$row[category_ID]' name='category_ID'>
	<input type='hidden' value='$row[category_name]' name='category_name'>
	<input type='hidden' value='$row[category_description]' name='category_description'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[category_ID]' name='category_ID'>
	<input type='hidden' value='Categories' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>