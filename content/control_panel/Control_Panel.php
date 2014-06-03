<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Control Panel</title>
</head>
<body>
<h1>CONTROL PANEL</h1>
	<div id="menu">
		<a href="manufacturer.php">Add</a>/<a href="manufacturer_select.php">Edit</a>  Manufacturer<br><br>
        	<a href="galleries.php">Add</a>/<a href="galleries_select.php">Edit</a>  Galleries<br><br>
		<a href="categories.php">Add</a>/<a href="categories_select.php">Edit</a>  Categories<br><br>
		<a href="subcategories.php">Add</a>/<a href="subcategories_select.php">Edit</a>  Subcategories<br><br>
		<a href="reseller.php">Add</a>/<a href="reseller_select.php">Edit</a>  Reseller<br><br>
		<a href="shops.php">Add</a>/<a href="shops_select.php">Edit</a>  Shops<br><br>
		<a href="measuring_units.php">Add</a>/<a href="measuring_units_select.php">Edit</a>  Measuring Units<br>
	</div>

<?php
	include_once "functions.php";
	open_connection();

	$manufacturer = mysql_query("SELECT COUNT(manufacturer_ID) FROM `arsiadan_dwa-projekt`.`Manufacturer` WHERE verification_status='0';");
	$gallery = mysql_query("SELECT COUNT(picture_ID) FROM `arsiadan_dwa-projekt`.`Galleries` WHERE verification_status='0';");
	$reseller = mysql_query("SELECT COUNT(reseller_ID) FROM `arsiadan_dwa-projekt`.`Reseller` WHERE verification_status='0';");
	$shop = mysql_query("SELECT COUNT(shop_ID) FROM `arsiadan_dwa-projekt`.`Shops` WHERE verification_status='0';");
	
	$row_manufacturer = mysql_fetch_array($manufacturer);
	$row_gallery = mysql_fetch_array($gallery);
	$row_reseller = mysql_fetch_array($reseller);
	$row_shop = mysql_fetch_array($shop);

	close_connection();

	echo "<div id='control_panel_ispis' style='color:red;'>
		<h3>Need Verification:</h3>
			Manufacturer: "; if($row_manufacturer[0]==0){echo"$row_manufacturer[0]";} else{echo"<a href='manufacturer_verification.php'>$row_manufacturer[0]</a>";}echo"<br>
			Galleries: "; if($row_gallery[0]==0){echo"$row_gallery[0]";} else{echo"<a href='galleries_verification.php'>$row_gallery[0]</a>";}echo"<br>
			Reseller: "; if($row_reseller[0]==0){echo"$row_reseller[0]";} else{echo"<a href='reseller_verification.php'>$row_reseller[0]</a>";}echo"<br>
			Shops: "; if($row_shop[0]==0){echo"$shop[0]";} else{echo"<a href='shops_verification.php'>$row_shop[0]</a>";}echo"
		</div>";
?>
</body>
</html>