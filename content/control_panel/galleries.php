<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add galleries</title>
</head>
<body>

<?php
	
	if(!isset($_POST['barcode']) && !isset($_POST['picture_address']) && !isset($_POST['picture_priority']) && !isset($_POST['verification_status']) && !isset($_POST['verification_note']))
	{
		$bool = false;
		$barcode = NULL;
		$address = NULL;
		$priority = NULL;
		$verification_status = NULL;
		$verification_note = NULL;

		include_once "functions.php";
		open_connection();
		$query = "SELECT barcode, product_name FROM `arsiadan_dwa-projekt`.`Product`";		
		$result = mysql_query($query);
		close_connection();
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

		$barcode = mysql_real_escape_string($_POST['barcode']);
        	$address = mysql_real_escape_string($_POST['picture_address']);
		$priority = mysql_real_escape_string($_POST['picture_priority']);
		$verification_status = mysql_real_escape_string($_POST['verification_status']);
		$verification_note = mysql_real_escape_string($_POST['verification_note']);

       		mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Galleries` (`barcode`, `picture_address`, `picture_priority`, `verification_status`, `verification_note`) VALUES ('$barcode', '$address', '$priority', '$verification_status', '$verification_note');");
	

		$query = "SELECT barcode, product_name FROM `arsiadan_dwa-projekt`.`Product`";		
		$result = mysql_query($query);
		close_connection();
	}

echo"   <h3>ADD GALLERIES</h3>
	<div id='galleries_forma'>
		<form action='galleries.php' method='post'>
			Barcode:<br>
			<select name = 'barcode'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[barcode]'>$row[barcode] ($row[product_name])</option>";
			}
		  echo" </select><br>
			Picture address:<br>
			<input type='text' name='picture_address'><br>
			Picture priority:<br>
			<input type='text' name='picture_priority'><br>
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
			Barcode: '$barcode'<br>
			Picture address: '$address'<br>
			Picture priority: '$priority'<br>
			Vertification status: '$verification_status'<br>
			Vertification note: '$verification_note'
		</div>";
	}
?>
</body>
</html>