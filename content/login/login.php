<?php
    include_once "../../scripts/functions.php";

    session_cleanup();
    
    if( isset($_POST['username']) == TRUE ) // Provjerava je li se na ovu stranicu do�lo klikom na gumb "Login" ili nije
    {
        // Connects to Database
        db_open_connection();
        // Tries to login user using provided info
        user_login();
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

        <div id="div_login_all">

            <div id="div_login_header">
                <img src="./login_header.png" alt="Skrti.ca Login Header" /><br>
                <hr />
            </div> <!--DIV_LOGIN_HEADER-->

            <div id="div_login_message">
                <?php
                    // Displays error message if user verification has failed
                    if( $_GET['error'] == 1 )
                    {
                        echo "Pogre�no korisni�ko ime i/ili lozinka";
                        echo "<hr>";
                    }
                ?>
            </div> <!--DIV_LOGIN_MESSAGE-->

            <div id="div_login_content">
                <form name="login" action="login.php" method="post">
                    <table width="100%" align="center">
                        <tr>
                            <td align="right"><label>Korisni�ko ime: </label></td>
                            <td><input type="text" tabindex=1 name="username" /></td>
                            <td rowspan=2><input type="submit" tabindex=3 value="Prijava" class="Button"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label>Lozinka: </label></td>
                            <td><input type="password" tabindex=2 name="password" /></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
                <hr />
                <p>Niste �lan?</p>
                <a href='registration.php' class='Button'>Registracija</a>
            </div> <!--DIV_LOGIN_CONTENT-->
        </div> <!--DIV_LOGIN_ALL-->

    </body>
</html>