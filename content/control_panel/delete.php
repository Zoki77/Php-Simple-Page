<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Delete</title>
</head>
<body>

<?php
	include_once "functions.php";
	open_connection();
	
	$tablica = mysql_real_escape_string($_POST['tablica']);
	if($tablica=='Manufacturer')
	{
		$manufacturer_id = mysql_real_escape_string($_POST['manufacturer_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Manufacturer` WHERE manufacturer_ID='$manufacturer_id';");
	}
	else if($tablica=='Galleries')
	{
		$picture_id = mysql_real_escape_string($_POST['picture_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Galleries` WHERE picture_ID='$picture_id';");
	}
	else if($tablica=='Reseller')
	{
		$reseller_id = mysql_real_escape_string($_POST['reseller_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Reseller` WHERE reseller_ID='$reseller_id';");
	}
	else if($tablica=='Shops')
	{
		$shop_id = mysql_real_escape_string($_POST['shop_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Shops` WHERE shop_ID='$shop_id';");
	}
	else if($tablica=='Categories')
	{
		$category_id = mysql_real_escape_string($_POST['category_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Categories` WHERE category_ID='$category_id';");
	}
	else if($tablica=='Subcategories')
	{
		$subcategory_id = mysql_real_escape_string($_POST['subcategory_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Subcategories` WHERE subcategory_ID='$subcategory_id';");
	}
	else if($tablica=='Measuring_Units')
	{
		$measuring_unit_id = mysql_real_escape_string($_POST['measuring_unit_ID']);
		mysql_query("DELETE FROM `arsiadan_dwa-projekt`.`Measuring_Units` WHERE measuring_unit_ID='$measuring_unit_id';");
	}

	close_connection();
	

?>
<div style='text-align:center;font-size:24px;color:green;'>Data Deleted
<br><a href="Control_Panel.php">Control Panel</a></div>


</body>
</html>