<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add subcategories</title>
</head>
<body>

<?php

	if(!isset($_POST['category_ID']) && !isset($_POST['subcategory_name']) && !isset($_POST['subcategory_description']))
	{
		$bool = false;
		$category_id = NULL;
		$name = NULL;
		$description = NULL;
		
		include_once "functions.php";
		open_connection();
		$query = "SELECT category_id,category_name FROM `arsiadan_dwa-projekt`.`Categories`";		
		$result = mysql_query($query);
		close_connection();
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

		$category_id = mysql_real_escape_string($_POST['category_ID']);
       		$name = mysql_real_escape_string($_POST['subcategory_name']);
		$description = mysql_real_escape_string($_POST['subcategory_description']);

        	mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Subcategories` (`category_ID`, `subcategory_name`, `subcategory_description`) VALUES ('$category_id', '$name', '$description');");

		$query = "SELECT category_id,category_name FROM `arsiadan_dwa-projekt`.`Categories`";		
		$result = mysql_query($query);
		close_connection();
	}

echo"	<h3>ADD SUBCATEGORIES</h3>
	<div id='subcategories_forma'>
		<form action='subcategories.php' method='post'>
			Category ID:<br>
			<select name = 'category_ID'>";
			while($row = mysql_fetch_array($result))
  			{
			echo"	<option value='$row[category_id]'>$row[category_id] ($row[category_name])</option>";
			}
		  echo" </select><br>
			Subcategory name:<br>
			<input type='text' name='subcategory_name'><br>
			Subcategory description:<br>
			<input type='text' name='subcategory_description'><br>
			<input type='submit' value='Unesi'>
		</form>	
	</div>
	<br><a href='Control_Panel.php'>Control Panel</a><br>";
	
	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Category ID: '$category_id'<br>
			Subcategory name: '$name'<br>
			Subcategory description: '$description'
		</div>";
	}
?>
</body>
</html>