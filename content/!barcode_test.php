<?php
    include_once "../scripts/functions.php";
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
        <script src="../scripts/add_new.js"></script>
	</head>

	<body>

    <script>
        function validation(function_request)
        {
            alert("funkcija!");
            switch(function_request)
            {
            case 1: //barcode
                status = IsNumeric(2);
                if (status == TRUE)
                {
                    document.getElementById("message").innerHTML="Barcode is numeric.";
                }
                else
                {
                    document.getElementById("message").innerHTML="Barcode must contain only numbers!";
                }
              break;
            case 2:
              break;
            default:
                document.getElementById("message").innerHTML="Ja ništa ne napravi... :/";

            }
       }


	</script>

	   <p>
    	   <label>Barcode: </label><br/>
           <input type="text" id="barcode"></input>
           <a href="javascript:validation(1)">Validate</a>
       </p>
       <p>
           <div id="message">
           </div>
        </p>
	</body>
</html>