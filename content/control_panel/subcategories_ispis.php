<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Subategories ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$category_id = mysql_real_escape_string($_POST['category_ID']);
		$subcategory_id = mysql_real_escape_string($_POST['subcategory_ID']);
		$name = mysql_real_escape_string($_POST['subcategory_name']);
		$description = mysql_real_escape_string($_POST['subcategory_description']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Subcategories` SET category_ID='$category_id' ,subcategory_name='$name' ,subcategory_description='$description' WHERE subcategory_ID='$subcategory_id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

<table width="600" border="1">
  <tr>
    <th>category_ID</th>
    <th>subcategory_ID</th>
    <th>subcategory_name</th>
    <th>subcategory_description</th>
  </tr>
<?php
	open_connection();
	
	$subcategory = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Subcategories` WHERE subcategory_ID='$subcategory_id';");
	
	close_connection();

	while($row = mysql_fetch_array($subcategory))
  {
  echo "<tr>";
  echo "<td>" . $row['category_ID'] . "</td>";
  echo "<td>" . $row['subcategory_ID'] . "</td>";
  echo "<td>" . $row['subcategory_name'] . "</td>";
  echo "<td>" . $row['subcategory_description'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>