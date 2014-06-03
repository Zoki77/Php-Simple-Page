<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shop ispis</title>
</head>
<body>
<?php
		
		include_once "functions.php";
		open_connection();
	
		$res_id = mysql_real_escape_string($_POST['reseller_ID']);
        	$shop_id = mysql_real_escape_string($_POST['shop_ID']);
		$address = mysql_real_escape_string($_POST['shop_address']);
		$location = mysql_real_escape_string($_POST['shop_location']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Shops` SET reseller_ID = '$res_id' ,shop_address='$address' ,shop_location='$location' ,verification_status='$verification_status' ,verification_note='$verification_note' WHERE shop_ID='$shop_id';");

		close_connection();
?>
<h3>Napravljena promjena:</h3><br>

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
	open_connection();
	
	$shop = mysql_query("SELECT * FROM `arsiadan_dwa-projekt`.`Shops` WHERE shop_ID='$shop_id';");
	
	close_connection();

	while($row = mysql_fetch_array($shop))
  {
  echo "<tr>";
  echo "<td>" . $row['reseller_ID'] . "</td>";
  echo "<td>" . $row['shop_ID'] . "</td>";
  echo "<td>" . $row['shop_address'] . "</td>";
  echo "<td>" . $row['shop_location'] . "</td>";
  echo "<td>" . $row['verification_status'] . "</td>";
  echo "<td>" . $row['verification_note'] . "</td>";
  echo "</tr>";
  }
	
?>
</table>
<br><a href="Control_Panel.php">Control Panel</a>

</body>
</html>