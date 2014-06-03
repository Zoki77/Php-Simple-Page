<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Edit Profile</title>
</head>
<body>

<?php
	include_once "functions.php";
	open_connection();
	
	$id = $_SESSION['logged_user_ID'];
	$password = mysql_real_escape_string($_POST['pass']);
	$mail = mysql_real_escape_string($_POST['mail']);
	$website = mysql_real_escape_string($_POST['website']);
	$occupation = mysql_real_escape_string($_POST['occupation']);
	$interests = mysql_real_escape_string($_POST['interests']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$day = mysql_real_escape_string($_POST['bday_day']);
	$month = mysql_real_escape_string($_POST['bday_month']);
	$year = mysql_real_escape_string($_POST['bday_year']);
	if($day=='0' || $month=='0' || $year=='0') 
	{
		$birthday = 'NULL';
		mysql_query("UPDATE `arsiadan_dwa-projekt`.`User` SET user_password = '$password' ,User_email='$mail' ,user_sex='$gender' ,user_date_of_birth=$birthday ,user_selfdescription='$interests' WHERE user_ID='$id';");
	}
	else 
	{
	$birthday = $year.'-'.$month.'-'.$day;
	mysql_query("UPDATE `arsiadan_dwa-projekt`.`User` SET user_password = '$password' ,User_email='$mail' ,user_sex='$gender' ,user_date_of_birth='$birthday' ,user_selfdescription='$interests' WHERE user_ID='$id';");
	}
	close_connection();
	
?>
<div style='text-align:center;font-size:24px;color:green;'>Profile changed
<br><a href="user_panel.php">User Panel</a></div>
</body>
</html>