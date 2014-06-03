<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Subategories select</title>
</head>
<body>
<table width="600" border="1">
  <tr>
    <th>category_ID</th>
    <th>subcategory_ID</th>
    <th>subcategory_name</th>
    <th>subcategory_description</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$subcategories = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Subcategories`;");
	

	close_connection();
	
	while($row = mysql_fetch_array($subcategories))
  {
  echo "<tr>";
  echo "<td>" . $row['category_ID'] . "</td>";
  echo "<td>" . $row['subcategory_ID'] . "</td>";
  echo "<td>" . $row['subcategory_name'] . "</td>";
  echo "<td>" . $row['subcategory_description'] . "</td>";
  echo "<td><form action='subcategories_edit.php' method='post'>
	<input type='hidden' value='$row[category_ID]' name='category_ID'>
	<input type='hidden' value='$row[subcategory_ID]' name='subcategory_ID'>
	<input type='hidden' value='$row[subcategory_name]' name='subcategory_name'>
	<input type='hidden' value='$row[subcategory_description]' name='subcategory_description'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[subcategory_ID]' name='subcategory_ID'>
	<input type='hidden' value='Subcategories' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>