<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add categories</title>
</head>
<body>
<br>
<h3>ADD CATEGORIES</h3>
	<div id="categories_forma">
		<form action="categories.php" method="post">
			Category name:<br>
			<input type="text" name="category_name"><br>
			Category description:<br>
			<input type="text" name="category_description"><br>
			<input type="submit" value="Unesi">
		</form>	
	</div>
	<br><a href="Control_Panel.php">Control Panel</a><br>
<?php
	
	if(!isset($_POST['category_name']) && !isset($_POST['category_description']))
	{
		$bool = false;
		$name = NULL;
		$description = NULL;
	}
	else
	{
	
		$bool = true;
		include_once "functions.php";
		open_connection();

        	$name = mysql_real_escape_string($_POST['category_name']);
		$description = mysql_real_escape_string($_POST['category_description']);

        	mysql_query("INSERT INTO `arsiadan_dwa-projekt`.`Categories` (`category_name`, `category_description`) VALUES ('$name', '$description');");

		close_connection();
	}

	if($bool)
	{
	echo "<h3>Dodan je novi unos u bazu:</h3>
		<div id='galleries_ispis' style='color:green;'>
			Category name: '$name'<br>
			Category description: '$description'
		</div>";
	}
?>
</body>
</html>