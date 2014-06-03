<?php
	session_start();
	include_once "scripts/functions.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>SKRTI.CA - Savez Korisnika Razmjenjivača Tržišnih Informacija</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />
		<link href="./images/icons/css/famfamfam-silk-sprite.css" rel="stylesheet" type="text/css">
		<link href="stylesheet.css" rel="stylesheet" type="text/css">
		<!--<link href="./scripts/frameworks/jQuery_UI/css/custom-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" type="text/css">-->
        <script src="./scripts/frameworks/jQuery_UI/js/jquery-1.5.1.min.js"></script>
        <script src="./scripts/frameworks/jQuery_UI/js/jquery-ui-1.8.13.custom.min.js"></script>
        <script src="./scripts/accordion/accordian.pack.js"></script>
        <script src="./scripts/add_new.js"></script>
        <script src="./scripts/js_validation/gen_validatorv4.js"></script>
	</head>

	<body>
		<div id="div_all">
            
            <div id="div_header_site_name">
                Savez Korisnika Razmjenjivača Tržišnih Informacija
            </div>

            <div id="div_header_container">

                <div id="div_header_site_menu">
                    <?php include("./content/headers/site_menu.php"); ?>
                </div>

                <div id="div_header_logo">
                </div>

                <div id="div_header_user_menu">
                    <?php include("./content/headers/user_menu.php"); ?>
                </div>
            </div> <!-- HEADER_MENU_CONTAINER END -->

			<div id="div_content">
                <?php
                    if( isset( $_GET["page"]) )
                    {
                        include "content/" . $_GET["page"] . ".php";
                    }
                    else include "content/news.php";
                ?>
			</div>
		</div>

	</body>
</html>