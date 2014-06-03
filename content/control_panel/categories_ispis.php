<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Categories ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['category_ID']);
		$name = mysql_real_escape_string($_POST['category_name']);
		$description = mysql_real_escape_string($_POST['category_description']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Categories` SET category_name='$name' ,category_description='$description' WHERE category_ID='$id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

<table width="450" border="1">
  <tr>
    <th>category_ID</th>
    <th>category_name</th>
    <th>category_description</th>
  </tr>
<?php
	open_connection();
	
	$category = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Categories` WHERE category_ID='$id';");
	
	close_connection();

	while($row = mysql_fetch_array($category))
  {
  echo "<tr>";
  echo "<td>" . $row['category_ID'] . "</td>";
  echo "<td>" . $row['category_name'] . "</td>";
  echo "<td>" . $row['category_description'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>