<?php
    include_once "../../scripts/functions.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=windows-1250" />
        
        <script src="/new_version/scripts/frameworks/jquery-1.6.1.min.js"></script>
        <script src="/new_version/scripts/frameworks/jQuery_UI/js/jquery-ui-1.8.12.custom.min.js"></script>
        <script src="/new_version/scripts/add_new.js"></script>
        <script type="text/javascript">
            function delayer(){
                window.location = "../../start.php?page=news"
            }
        </script>

        <link type="text/css" rel="stylesheet" href="css/custom-theme/jquery-ui-1.8.13.custom.css" />
        <link type="text/css" rel="stylesheet" href="stylesheet_login.css" />
        </style>
    </head>
    <body onLoad="setTimeout('delayer()', 5000)">

        <div id="div_login_all">

            <div id="div_login_header">
                <img src="./login_header.png" alt="Skrti.ca Login Header" /><br>
                <hr />
            </div>
            <div id="div_login_content">
                <?php

                    if( user_logout() == TRUE)
                    {
                        print("
                            Odjavljeni ste sa Skrtice.
                            <br />
                            <br />
                            <a class='Button' href='../../start.php?page=news'>Početna stranica</a>
                        ");
                    }
                ?>
            </div>
        </div>

    </body>
</html>