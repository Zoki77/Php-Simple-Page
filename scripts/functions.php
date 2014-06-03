<?php // Ovo je datoteka u kojoj su definirane sve funkcije.
    session_start();

    /* #################### FUNKCIJE ZA RAD S BAZOM #################### */
    
    $db_connection;
    
    // Funkcija otvara konekciju prema bazi podataka.
    function db_open_connection()
    {
        // Database connection info [full privileges!]
        $db_hostname = 'localhost';
        $db_username = 'arsiadan_dwa';
        $db_password = 'D0br4_Sh1fr4';

        // Connects to the Database; error if fails
        $db_connection = mysql_connect($db_hostname, $db_username, $db_password) or die('Error connecting to MySQL!');
    
        // Sets the default database; error if fails
        $db_name = 'arsiadan_dwa-projekt';
        mysql_select_db($db_name) or die('Error accessing database!');
    
        // Fix za hrvatske znakove (neki ludi bug u PHP-u)
        mysql_query("SET NAMES utf8;");
    }
    
    

    // Funkcija zatvara konekciju prema bazi.
    function db_close_connection()
    {
        mysql_close() or die('Error closing database connection');
    }
    
    function log_visit()
    {
            if ($_SESSION['valid'] == FALSE)
        	{
                header("location: ./content/login/login.php");
        	}

            db_open_connection();
            $user_ID = $_SESSION['logged_user_ID'];

            mysql_query("
                INSERT INTO Visits
                        (`visit_ID`,  `user_ID`,  `visit_date_time`) VALUES
                        ('', '$user_ID', NOW())
            ");

            db_close_connection();
    }

    function change_log_make_entry($action_type, $entry_type, $entry_ID)
    {
        // VALID ARGUMENTS::
        // $action_type = 'INSERT' / 'UPDATE' / 'DELETE'  (all in UPPERCASE)
        // $entry_type = 'manufacturer' / 'product' / etc. (just put table name)
        // $entry_ID = (primary_key of the entry that was inserted/updated/deleted, see below)
        //
        //
        // *immediatelly* after executing the SQL Query of INSERT or UPDATE type, place this line:
        //          $entry_ID = mysql_insert_id();
        // (only then validate if the entry was successful)
        //
        // Call this function afterwards, for example:
        //          change_log_make_entry('INSERT', 'manufacturer', $entry_ID);
        //
        // In case of a DELETE, just call the function with the $entry_ID you used in DELETE.

        if ($action_type == "INSERT" || $action_type == "UPDATE" || $action_type == "DELETE")
        {
            $user_ID = $_SESSION['logged_user_ID'];
            db_open_connection();
            mysql_query("
                INSERT INTO Change_Log
                        (`user_ID`,  `action_type`,  `entry_type`,  `entry_ID`, `date_time_of change`) VALUES
                        ('$user_ID', '$action_type', '$entry_type', '$entry_ID', NOW())
            ");
            db_close_connection();
            
            return TRUE;
        }
        else
        {
            die("Wrong parameters for the change_log_entry function!");
        }

    }



function barcode_exsists($barcode)
    {
        // VALID ARGUMENTS::
        // $barcode = barcode (INT)


	    $count=0;
            db_open_connection();
            	$query = "SELECT barcode FROM `arsiadan_dwa-projekt`.`Product`";		
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result))
  		{
			$bar = $row[barcode];
			if($barcode==$bar)
			{
				$count= $count +1;
				
			}
		}
	    db_close_connection();

	    if($count!=0)
		{
			return true;
		}
	    else
		{
			return false;
		}
            
    }

    /* #################### FUNKCIJE ZA RAD SA SESSION-IMA #################### */
    
    // Funkcija provjerava postoji li korisnik u bazi
    function user_login()
    {
    	$db_users_table = "User";
    
        // Puts variables from POST data into local variables
        $tried_username = $_POST['username'];
    	$tried_password = $_POST['password'];
    
    	//Protection against injection
    	$username = stripslashes($tried_username);
    	$password = stripslashes($tried_password);
    	// Escaping special characters
    	$username = mysql_real_escape_string($username);
    	$password = mysql_real_escape_string($password);
    
    	$query = "SELECT * FROM $db_users_table WHERE user_username = '$username' and user_password = '$password'";
    	$result = mysql_query($query);

    	// Mysql_num_rows counts table rows returned in the result
    	$count = mysql_num_rows($result);
    	$result_array = mysql_fetch_array($result, MYSQL_ASSOC);
    	// Query should return a single match for an existing user, and
        // zero for non-existing user or wrong username/password combination
    
        if ($count == 1)
        {
            // Register $username, $password and redirect to file "login_success.php"
    		session_start();
            $_SESSION['valid'] = TRUE;
            $_SESSION['logged_username'] = $result_array["user_username"]; // Stores currently logged user
            $_SESSION['logged_user_ID'] = $result_array["user_ID"];
            $_SESSION['logged_user_type'] = $result_array["user_type"];

            $username = $result_array['user_username'];
            mysql_query("
                UPDATE  $db_users_table
                SET     user_last_visit = NOW()
                WHERE   user_username = $username
            ");
            $redirect = "Location: ../../start.php?page=news";
    	}
    	else
        {
            $_SESSION['error_detection'] = TRUE;
            $redirect = "Location: login.php?error=1";
    	}
    	header($redirect);
    	exit();
    }
	
	// Link trenutaène stranice
	function curPageURL()
	{
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on")
		{
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}
		else
		{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	// Funkcija koja registrira korisnika
	function user_registration()
	{
		// reCAPTCHA code
		require_once('recaptchalib.php');
		$privatekey = "6LeA2cQSAAAAAJwwAYo2bBGhflQpxtqpUGRBpe6E";
		$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
			 "(reCAPTCHA said: " . $resp->error . ")");
		} else {
		// Your code here to handle a successful verification
			$db_users_table = "User";
    
			if($_POST['password'] != $_POST['password2'])
			{
				header("Location: registration.php?regerror=2");
				exit;
			}
			
			// Puts variables from POST data into local variables
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
		
			//Protection against injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$email = stripslashes($email);
			
			// Escaping special characters
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$email = mysql_real_escape_string($email);
			
			// Provjera postoji li korisnik s tim imenom
			if(mysql_num_rows(mysql_query("SELECT user_ID FROM User WHERE user_username = '$username';"))>0)
			{
				header("Location: registration.php?regerror=1");
				exit;
			}
			
			// Ubacivanje podataka u bazu
			$current_datetime = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO User VALUES (NULL, '$username', '$password', '$email', NULL, NULL, NULL, 0, '$current_datetime', '$current_datetime')") or die(mysql_error());
			$result = mysql_fetch_assoc(mysql_query("SELECT user_ID FROM User WHERE user_username = '$username';"));

			$subject = "SKRTI.ca Registration";
			$link = curPageURL() . "?u=" . hash("sha256", $username . $password . $email . "0") . "&i=" . $result['user_ID'];
			$content = $username . ",\n\nThank you for registering at www.SKRTI.ca. To confirm your e-mail please click the following link:\n\n" . $link ."\n\nWith regards,\nThe Dev Team!";
			mail($email, $subject, $content);
		}
		return 0;
	}

    function user_check_validation()
    {
        // Uvjet koji provjerava je li superglobal variabla $_SESSION['valid'] postavljena na "true" nebitno koji korisnik je ulogiran.
        if ($_SESSION['valid'] == FALSE)
    	{
            header("location: login.php");
    	}
    }

    // Funkcija koja se poziva nakon uspješnog logiranja korisnika
    function user_validate()
    {
    
    }
    
    function session_cleanup()
    {
        $_SESSION = array(); // Uništava sve podatke koji su do tad bili zapisanu u $_SESSION.
        session_destroy(); // Uništava session.
    }

    function user_logout()
    {
        if ($_SESSION['valid'] == TRUE)
    	{
            $db_users_table = "User";
            $username = $_SESSION['logged_username'];

            db_open_connection();
            mysql_query("
                UPDATE  $db_users_table
                SET     user_last_visit = NOW()
                WHERE   user_username = '$username'
            ");
            db_close_connection();
        }
        session_cleanup();
        return true;
    }
?>