<?php
	// Najprije pokreæemo session
	session_start();
	
	if ($_SESSION['valid'] == FALSE) // Uvjet koji provjerava je li superglobal variabla $_SESSION['valid'] postavljena na "true" nebitno koji korisnik je ulogiran.
	{
        // Funkcioja die() ispisuje poruku o grešci i zaustavlja izoðe daljnjih skripti.
        echo "
            Za pristup ovoj funkciji, potrebno je se prijaviti u sistem. <br />
            <p><a href='/new_version/content/login/login.php' class='Button'>Prijava</a></p>
            ";
        die ();
        // Za sluèaj da je došlo do greške u funkciji die () (šanse su 0.0001%) funkcija exit() zaustavlja daljnje izvoðenje skripti.
        exit();
	}
?>
    <div id="page_add_new">
        <form id="add_new_product" method="post">

        				<label class="form_label">Barkod</label>
        				<input class="form_input" type="text" id="barcode" />
        				<a href="#" class="Icon_Button" onclick="validate_barcode(this.value)"><div id="x" class='famfam active famfam-bullet_go'></div></a>

        				<br/><br/><label class="form_label">Proizvoðaè</label>
        				<select class="form_dropdown" style="width:250px" id="manufacturer" name="manufacturer_choice">
                            <option selected="selected" value="">-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
        				<a href="#" class="Icon_Button" onclick="validate_barcode(this.value)"><div id="x" class='famfam active famfam-add'></div></a>
        </form>



<script language='JavaScript'>
    var HashArray = new Array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    var Selected;
    function SelectHash() {
    	var Selected = document.testform.Hashref1.options[document.testform.Hashref1.selectedIndex].value;
    	var Num = 0;
    	while (Num < 26) {
    		var NewArray = new Array(26);
    		NewArray[Num] = (Selected + HashArray[Num]);
    		document.testform.Hashref2.options[Num] = new Option(NewArray[Num],NewArray[Num]);
    		Num++;
    	}
    	var Selected = null;
    }
    
    var Selected2;
    function SelectHash2() {
    		var Selected2 = document.testform.Hashref2.options[document.testform.Hashref2.options.selectedIndex].value;
    }

</script>

<form name='testform' method='post' action='somecgi'>
    <select name='Hashref1' onchange='SelectHash()'>
        <script language='JavaScript'>
            var Num = 0;
            while (Num < 26) {
            	document.testform.Hashref1.options[document.testform.Hashref1.options.length] = new Option(HashArray[Num],HashArray[Num]);
            	Num++;
        }
        </script>
    </select>
    <select name='Hashref2' onchange='SelectHash2()'>
    </select>





</div> <!-- PAGE_ADD_NEW END -->