<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Manufacturer verification</title>
</head>
<body>
<table width="1000" border="1">
  <tr>
    <th>manufacturer_ID</th>
    <th>manufacturer_name</th>
    <th>manufacturer_website</th>
    <th>manufacturer_address</th>
    <th>manufacturer_phone</th>
    <th>verification_status</th>
    <th>verification_note</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$manufacturer = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Manufacturer` WHERE verification_status='0';");
	

	close_connection();
	
	while($row = mysql_fetch_array($manufacturer))
  {
  echo "<tr>";
  echo "<td>" . $row['manufacturer_ID'] . "</td>";
  echo "<td>" . $row['manufacturer_name'] . "</td>";
  echo "<td>" . $row['manufacturer_website'] . "</td>";
  echo "<td>" . $row['manufacturer_address'] . "</td>";
  echo "<td>" . $row['manufacturer_phone'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "<td><form action='manufacturer_edit.php' method='post'>
	<input type='hidden' value='$row[manufacturer_ID]' name='manufacturer_ID'>
	<input type='hidden' value='$row[manufacturer_name]' name='manufacturer_name'>
	<input type='hidden' value='$row[manufacturer_website]' name='manufacturer_website'>
	<input type='hidden' value='$row[manufacturer_address]' name='manufacturer_address'>
	<input type='hidden' value='$row[manufacturer_phone]' name='manufacturer_phone'>
	<input type='hidden' value='$row[verification_status]' name='verification_status'>
	<input type='hidden' value='$row[verification_note]' name='verification_note'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='verify.php' method='post'>
	<input type='hidden' value='$row[manufacturer_ID]' name='manufacturer_ID'>
	<input type='hidden' value='Manufacturer' name='tablica'>
	<input type='submit' value='verify'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[manufacturer_ID]' name='manufacturer_ID'>
	<input type='hidden' value='Manufacturer' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>