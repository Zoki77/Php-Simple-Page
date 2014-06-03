<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Galleries verification</title>
</head>
<body>
<table width="875" border="1">
  <tr>
    <th>barcode</th>
    <th>picture_ID</th>
    <th>picture_address</th>
    <th>picture_priority</th>
    <th>verification_status</th>
    <th>verification_note</th>
  </tr>
<?php
	include_once "functions.php";
	open_connection();

	$galleries = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Galleries` WHERE verification_status='0';");
	

	close_connection();
	
	while($row = mysql_fetch_array($galleries))
  {
  echo "<tr>";
  echo "<td>" . $row['barcode'] . "</td>";
  echo "<td>" . $row['picture_ID'] . "</td>";
  echo "<td>" . $row['picture_address'] . "</td>";
  echo "<td>" . $row['picture_priority'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "<td><form action='galleries_edit.php' method='post'>
	<input type='hidden' value='$row[barcode]' name='barcode'>
	<input type='hidden' value='$row[picture_ID]' name='picture_ID'>
	<input type='hidden' value='$row[picture_address]' name='picture_address'>
	<input type='hidden' value='$row[picture_priority]' name='picture_priority'>
	<input type='hidden' value='$row[verification_status]' name='verification_status'>
	<input type='hidden' value='$row[verification_note]' name='verification_note'>
	<input type='submit' value='edit'>
</form></td>";
  echo "<td><form action='verify.php' method='post'>
	<input type='hidden' value='$row[picture_ID]' name='picture_ID'>
	<input type='hidden' value='Galleries' name='tablica'>
	<input type='submit' value='verify'>
</form></td>";
  echo "<td><form action='delete.php' method='post'>
	<input type='hidden' value='$row[picture_ID]' name='picture_ID'>
	<input type='hidden' value='Galleries' name='tablica'>
	<input type='submit' value='delete'>
</form></td>";
  echo "</tr>";
  }
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>


</body>
</html>