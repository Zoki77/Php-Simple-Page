<?php
    if ( $_SESSION['valid'] == TRUE )
    {
        print "Dobrodošao<br/>";
        echo $_SESSION['logged_username'];
        echo "<br/>User_ID: ";
        echo $_SESSION['logged_user_ID'];
        print "<br/><a href='./content/login/logout.php' class='Button'>Odjava</a> ";
        print "<br/><a href='./content/user_panel/user_panel.php' class='Button'>User Panel</a>";
        
        if ($_SESSION['logged_user_type'] == 666)
        {
            print "<br/><a href='./content/control_panel/Control_Panel.php' class='Button'>Control Panel</a>";
        }
    }
    else
    {
        print "<a href='./content/login/login.php' class='Button'>Prijava</a></p>";
    }
?>