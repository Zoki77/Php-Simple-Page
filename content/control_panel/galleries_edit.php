<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Galleries edit</title>
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

		$query = "SELECT barcode,product_name FROM `arsiadan_dwa-projekt`.`Product`";		
		$result = mysql_query($query);

echo "<h3>EDIT GALLERIES</h3>
	<div id='galleries_edit_forma'>
		<form action='galleries_ispis.php' method='post'>
			Barcode:<br>
			<select name = 'barcode'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[barcode]'"; if($row[barcode]==$barcode){ echo" selected='selected'";}echo">$row[barcode] ($row[product_name])</option>";
			}
		  echo" </select><br>
			<input type='hidden' name='picture_ID' value='$id'>
			Picture addres:<br>
			<input type='text' name='picture_address' value='$address' ><br>
			Picture priority:<br>
			<input type='text' name='picture_priority' value='$priority'><br>
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