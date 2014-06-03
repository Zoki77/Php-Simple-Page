<?php
    ob_start();
    include "scripts/functions.php";

    if ( isset($_GET["number"]) == TRUE )
    {
        $number = $_GET["number"];

        switch ($number) {
            case "1":

        		db_open_connection();
/*         		$res_id = mysql_real_escape_string($_POST['reseller_ID']);
                $shop_id = mysql_real_escape_string($_POST['shop_ID']);
        		$address = mysql_real_escape_string($_POST['shop_address']);
        		$location = mysql_real_escape_string($_POST['shop_location']);
        		$verification_status = mysql_real_escape_string($_POST['verification_status']);
        		$verification_note = mysql_real_escape_string($_POST['verification_note']); */
		
        		//$query = "SELECT reseller_ID,reseller_name FROM `arsiadan_dwa-projekt`.`Reseller`";
        		$query = "SELECT shop_ID, shop_address, shop_location FROM `arsiadan_dwa-projekt`.`Shops` WHERE reseller_ID = '5'";
        		$result = mysql_query($query);


                echo "<meta http-equiv='content-type' content='text/html; charset=windows-1250' />
                    <form>
                        Reseller ID:<br>
                        <select name = 'shop_ID'>\n";
    			while($row = mysql_fetch_array($result))
      			{
                    echo "<option value='$row[shop_ID]'>$row[shop_location] ($row[shop_address])</option>\n";
    			}
    			echo "</select></form>";
                db_close_connection();

                break;
            case "2":
                $return_value = 20;
                break;
            case "3":
                $return_value = 30;
                break;
            default:
                echo "Jebi ga, nece!";
        }
        echo "<script type='text/javascript'>window.parent.handleResponse($return_value);</script>";
    }
    ob_flush();
?>