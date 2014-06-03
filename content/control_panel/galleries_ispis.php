<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Galleries ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();

		$barcode = mysql_real_escape_string($_POST['barcode']);
		$id = mysql_real_escape_string($_POST['picture_ID']);
        	$address = mysql_real_escape_string($_POST['picture_address']);
		$priority = mysql_real_escape_string($_POST['picture_priority']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Galleries` SET barcode='$barcode' ,picture_address='$address' ,picture_priority='$priority' ,verification_status='$verification_status' ,verification_note='$verification_note' WHERE picture_ID='$id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

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
	open_connection();
	
	$gallery = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Galleries` WHERE picture_ID='$id';");
	
	close_connection();

	while($row = mysql_fetch_array($gallery))
  {
  echo "<tr>";
  echo "<td>" . $row['barcode'] . "</td>";
  echo "<td>" . $row['picture_ID'] . "</td>";
  echo "<td>" . $row['picture_address'] . "</td>";
  echo "<td>" . $row['picture_priority'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>