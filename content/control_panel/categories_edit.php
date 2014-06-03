<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Categories edit</title>
</head>
<body>
<?php

		include_once "functions.php";
		open_connection();

		$id = mysql_real_escape_string($_POST['category_ID']);
		$name = mysql_real_escape_string($_POST['category_name']);
		$description = mysql_real_escape_string($_POST['category_description']);

echo "<h3>EDIT CATEGORIES</h3>
	<div id='categories_edit_forma'>
		<form action='categories_ispis.php' method='post'>
			<input type='hidden' name='category_ID' value='$id'>
			Category name:<br>
			<input type='text' name='category_name' value='$name' ><br>
			Category website:<br>
			<input type='text' name='category_description' value='$description'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>";
	close_connection();
?>
</body>
</html>