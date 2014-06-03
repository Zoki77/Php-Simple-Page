<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add shops</title>
</head>
<body>

<?php

	if(!isset($_POST['reseller_ID']) && !isset($_POST['shop_address']) && !isset($_POST['shop_location']) && !isset($_POST['verification_status']) && !isset($_POST['verification_note']))
	{
		$bool = false;
		$reseller_id = NULL;
		$address = NULL;
		$location = NULL;
		$verification_status = NULL;
		$verification_note = NULL;

		include_once "functions.php";
		open_connection();
		$query = "SELECT reseller_id,reseller_name FROM `arsiadan_dwa-projekt`.`Reseller`";		
		$result = mysql_query($query);
		close_connection();
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

		$reseller_id = mysql_real_escape_string($_POST['reseller_ID']);
        	$address = mysql_real_escape_string($_POST['shop_address']);
		$location = mysql_real_escape_string($_POST['shop_location']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

        	mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Shops` (`reseller_ID`, `shop_address`, `shop_location`, `verification_status`, `verification_note`) VALUES ('$reseller_id', '$address', '$location', '$verification_status', '$verification_note');");
		
		$query = "SELECT reseller_id,reseller_name FROM `arsiadan_dwa-projekt`.`Reseller`";		
		$result = mysql_query($query);
		close_connection();
	}

echo"	<h3>ADD SHOPS</h3>
	<div id='shop_forma'>
		<form action='shops.php' method='post'>
			Reseller ID:<br>
			<select name = 'reseller_ID'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[reseller_id]'>$row[reseller_id] ($row[reseller_name])</option>";
			}
		  echo" </select><br>
                  	Shop address:<br>
			<input type='text' name='shop_address'><br>
			Shop location:<br>
			<input type='text' name='shop_location'><br>
			Vertification status:<br>
			<input type='text' name='verification_status'><br>
			Vertification note:<br>
			<input type='text' name='verification_note'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>
	<br><a href='Control_Panel.php'>Control Panel</a><br>";

	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Reseller ID: '$reseller_id'<br>
			Shop address: '$address'<br>
			Shop location: '$location'<br>
			Vertification status: '$verification_status'<br>
			Vertification note: '$verification_note'
		</div>";	
	}

?>
</body>
</html>