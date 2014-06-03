<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Verification</title>
</head>
<body>

<?php
	include_once "functions.php";
	open_connection();
	
	$tablica = mysql_real_escape_string($_POST['tablica']);
	if($tablica=='Manufacturer')
	{
		$manufacturer_id = mysql_real_escape_string($_POST['manufacturer_ID']);
		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Manufacturer` SET verification_status='100' WHERE manufacturer_ID='$manufacturer_id';");
	}
	else if($tablica=='Galleries')
	{
		$picture_id = mysql_real_escape_string($_POST['picture_ID']);
		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Galleries` SET verification_status='100' WHERE picture_ID='$picture_id';");
	}
	else if($tablica=='Reseller')
	{
		$reseller_id = mysql_real_escape_string($_POST['reseller_ID']);
		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Reseller` SET verification_status='100' WHERE reseller_ID='$reseller_id';");
	}
	else if($tablica=='Shops')
	{
		$shop_id = mysql_real_escape_string($_POST['shop_ID']);
		mysql_query("UPDATE `arsiadan_dwa-projekt`.`Shops` SET verification_status='100' WHERE shop_ID='$shop_id';");
	}

	close_connection();
	

?>
<div style='text-align:center;font-size:24px;color:green;'>Data Verified
<br><a href="Control_Panel.php">Control Panel</a></div>


</body>
</html>