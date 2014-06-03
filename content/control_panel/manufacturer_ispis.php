<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Manufacturer ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['manufacturer_ID']);
		$name = mysql_real_escape_string($_POST['manufacturer_name']);
		$website = mysql_real_escape_string($_POST['manufacturer_website']);
		$address = mysql_real_escape_string($_POST['manufacturer_address']);
		$phone = mysql_real_escape_string($_POST['manufacturer_phone']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Manufacturer` SET manufacturer_name='$name' ,manufacturer_website='$website' ,manufacturer_address='$address' ,manufacturer_phone='$phone' ,verification_status='$verification_status' ,verification_note='$verification_note' WHERE manufacturer_ID='$id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

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
	open_connection();
	
	$manufacturer = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Manufacturer` WHERE manufacturer_ID='$id';");
	
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
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>