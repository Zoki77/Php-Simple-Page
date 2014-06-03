<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shops edit</title>
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
		
		$query = "SELECT reseller_ID,reseller_name FROM `arsiadan_dwa-projekt`.`Reseller`";		
		$result = mysql_query($query);


echo"	<h3>EDIT SHOPS</h3>
	<div id='shop_edit_forma'>
		<form action='shops_ispis.php' method='post'>
			Reseller ID:<br>
			<select name = 'reseller_ID'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[reseller_ID]'"; if($row[reseller_ID]==$res_id){ echo" selected='selected'";}echo">$row[reseller_ID] ($row[reseller_name])</option>";
			}
		  echo" </select><br>
			<input type='hidden' name='shop_ID' value='$shop_id'>
                  	Shop address:<br>
			<input type='text' name='shop_address' value='$address'><br>
			Shop location:<br>
			<input type='text' name='shop_location' value='$location'><br>
			Vertification status:<br>
			<input type='text' name='verification_status' value='$verification_status'><br>
			Vertification note:<br>
			<input type='text' name='verification_note' value='$verification_note'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>";
	close_connection();
?>
</body>
</html>