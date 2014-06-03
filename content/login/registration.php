<?php
    include_once "../../scripts/functions.php";

    session_cleanup();
    
	// Connects to Database
	db_open_connection();
	
    if( isset($_POST['username']) == TRUE ) // Provjerava je li se na ovu stranicu došlo klikom na gumb "Login" ili nije
    {
		// Registers the user
		if(user_registration() == 0)
		{
			// Tries to login user using provided info
			user_login();
		}
    }
	
	if( isset($_GET['u']) )
	{
		$id = $_GET['i'];
		$results = mysql_fetch_assoc(mysql_query("SELECT user_username, user_password, user_email, user_type FROM User WHERE user_ID=$id;"));
		if ($_GET['u'] == hash("sha256", $results['user_username'] . $results['user_password'] . $results['user_email'] . $results['user_type']))
		{
			mysql_query("UPDATE User SET user_type=1 WHERE user_ID=$id;") or die(mysql_error());
			unset($_GET);
			unset($_POST);
			header("Location: login.php");
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=windows-1250" />
        <script src="/new_version/scripts/frameworks/jquery-1.6.1.min.js"></script>
        <script src="/new_version/scripts/frameworks/jQuery_UI/js/jquery-ui-1.8.12.custom.min.js"></script>
        <script src="/new_version/scripts/add_new.js"></script>
        <link type="text/css" rel="stylesheet" href="css/custom-theme/jquery-ui-1.8.13.custom.css" />
        <link type="text/css" rel="stylesheet" href="stylesheet_login.css" />

    </head>
    <body>
	
		<script type="text/javascript">
			var RecaptchaOptions = {
				theme : 'white',
				tabindex : 5
			};
		</script>

        <div id="div_login_all">

            <div id="div_login_header">
                <img src="./login_header.png" alt="Skrti.ca Login Header" /><br>
                <hr />
            </div> <!--DIV_LOGIN_HEADER-->

            <div id="div_login_message">
                <?php
					// Displays error message if user registration has failed
					if( $_GET['regerror'] == 1 )
                    {
                        echo "Korisnik sa zadanim imenom veæ postoji";
                        echo "<hr>";
                    }
					else if( $_GET['regerror'] == 2 )
                    {
                        echo "Lozinke moraju biti jednake";
                        echo "<hr>";
                    }					
                    // Displays error message if user verification has failed
                    if( $_GET['error'] == 1 )
                    {
                        echo "Pogrešno korisnièko ime i/ili lozinka";
                        echo "<hr>";
                    }
                ?>
            </div> <!--DIV_LOGIN_MESSAGE-->

            <div id="div_login_content">
                <form name="login" action="registration.php" method="post">
                    <table width="100%" align="center">
                        <tr>
                            <td align="right"><label>Korisnièko ime: </label></td>
                            <td><input type="text" tabindex=1 name="username" /></td>
                        </tr>
                        <tr>
                            <td align="right"><label>Lozinka: </label></td>
                            <td><input type="password" tabindex=2 name="password" /></td>
                        </tr>
						<tr>
                            <td align="right"><label>Lozinka ponovo: </label></td>
                            <td><input type="password" tabindex=3 name="password2" /></td>
                        </tr>
						<tr>
                            <td align="right"><label>E-mail: </label></td>
                            <td><input type="email" tabindex=4 name="email" /></td>
                        </tr>
						<tr>
							<td colspan=2 align="center">
							<p>
    							<?php
    								require_once('../../scripts/recaptchalib.php');
    								$publickey = "6LeA2cQSAAAAABLBGkijzseNiAnFd3VEo0OEnnRj";
    								echo recaptcha_get_html($publickey);
    							?>
							</p>
							</td>
						</tr>
						<tr align="center">
							<td colspan=2>
                                <p>
                                    <br />
                                    <input type="submit" tabindex=6 value="Registriraj" class="Button"/></td>
                                </p>
						</tr>
                    </table>
                </form>
            </div> <!--DIV_LOGIN_CONTENT-->
        </div> <!--DIV_LOGIN_ALL-->

    </body>
</html>