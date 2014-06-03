<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shops select</title>
</head>
<body>
<table width="875" border="1">
  <tr>
    <th>reseller_ID</th>
    <th>shop_ID</th>
    <th>shop_address</th>
    <th>shop_location</th>
    <th>verification_status</th>
    <th>verification_note</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$shops = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Shops`;");
	

	close_connection();
	
	while($row = mysql_fetch_array($shops))
  {
  echo "<tr>";
  echo "<td>" . $row['reseller_ID'] . "</td>";
  echo "<td>" . $row['shop_ID'] . "</td>";
  echo "<td>" . $row['shop_address'] . "</td>";
  echo "<td>" . $row['shop_location'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "<td><form action='shops_edit.php' method='post'>
	<input type='hidden' value='$row[reseller_ID]' name='reseller_ID'>
	<input type='hidden' value='$row[shop_ID]' name='shop_ID'>
	<input type='hidden' value='$row[shop_address]' name='shop_address'>
	<input type='hidden' value='$row[shop_location]' name='shop_location'>
	<input type='hidden' value='$row[verification_status]' name='verification_status'>
	<input type='hidden' value='$row[verification_note]' name='verification_note'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[shop_ID]' name='shop_ID'>
	<input type='hidden' value='Shops' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>