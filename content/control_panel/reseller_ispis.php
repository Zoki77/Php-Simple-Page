<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reseller ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['reseller_ID']);
		$name = mysql_real_escape_string($_POST['reseller_name']);
		$website = mysql_real_escape_string($_POST['reseller_website']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Reseller` SET reseller_name='$name' ,reseller_website='$website' ,verification_status='$verification_status' ,verification_note='$verification_note' WHERE reseller_ID='$id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

<table width="750" border="1">
  <tr>
    <th>reseller_ID</th>
    <th>reseller_name</th>
    <th>reseller_website</th>
    <th>verification_status</th>
    <th>verification_note</th>
  </tr>
<?php
	open_connection();
	
	$reseller = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Reseller` WHERE reseller_ID='$id';");
	
	close_connection();

	while($row = mysql_fetch_array($reseller))
  {
  echo "<tr>";
  echo "<td>" . $row['reseller_ID'] . "</td>";
  echo "<td>" . $row['reseller_name'] . "</td>";
  echo "<td>" . $row['reseller_website'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>