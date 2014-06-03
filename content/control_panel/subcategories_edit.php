<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Subcategories edit</title>
</head>
<body>
<?php

		include_once "functions.php";
		open_connection();

		$category_id = mysql_real_escape_string($_POST['category_ID']);
		$subcategory_id = mysql_real_escape_string($_POST['subcategory_ID']);
		$name = mysql_real_escape_string($_POST['subcategory_name']);
		$description = mysql_real_escape_string($_POST['subcategory_description']);

		$query = "SELECT category_ID,category_name FROM `arsiadan_dwa-projekt`.`Categories`";		
		$result = mysql_query($query);

echo "<h3>EDIT SUBCATEGORIES</h3>
	<div id='subcategories_edit_forma'>
		<form action='subcategories_ispis.php' method='post'>
			Category ID:<br>
			<select name = 'category_ID'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[category_ID]'"; if($row[category_ID]==$category_id){ echo" selected='selected'";}echo">$row[category_ID] ($row[category_name])</option>";
			}
		  echo" </select><br>			
			<input type='hidden' name='subcategory_ID' value='$subcategory_id'>
			Category name:<br>
			<input type='text' name='subcategory_name' value='$name' ><br>
			Category website:<br>
			<input type='text' name='subcategory_description' value='$description'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>";
	close_connection();
?>
</body>
</html>