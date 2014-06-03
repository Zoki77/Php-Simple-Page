<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reseller select</title>
</head>
<body>
<table width="750" border="1">
  <tr>
    <th>reseller_ID</th>
    <th>reseller_name</th>
    <th>reseller_website</th>
    <th>verification_status</th>
    <th>verification_note</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$reseller = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Reseller`;");
	

	close_connection();
	
	while($row = mysql_fetch_array($reseller))
  {
  echo "<tr>";
  echo "<td>" . $row['reseller_ID'] . "</td>";
  echo "<td>" . $row['reseller_name'] . "</td>";
  echo "<td>" . $row['reseller_website'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "<td><form action='reseller_edit.php' method='post'>
	<input type='hidden' value='$row[reseller_ID]' name='reseller_ID'>
	<input type='hidden' value='$row[reseller_name]' name='reseller_name'>
	<input type='hidden' value='$row[reseller_website]' name='reseller_website'>
	<input type='hidden' value='$row[verification_status]' name='verification_status'>
	<input type='hidden' value='$row[verification_note]' name='verification_note'>	
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[reseller_ID]' name='reseller_ID'>
	<input type='hidden' value='Reseller' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>