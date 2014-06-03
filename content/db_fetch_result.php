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
        
        <div id="accordian_add_new" ><!--Parent of the Accordion-->

            <div id="form_add_new_Barcode-header" class="accordion_headings header_highlight" >Barkod</div>
            <div id="form_add_new_Barcode-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Unesite Barkod. Prihvaæeni tipovi: EAN-8, EAN-13, UPC.</p>
        				<label class="form_label">Barkod</label>
        				<input class="form_input" type="text" id="barcode" />
        				<a href="#" class="Icon_Button" onclick="validate_barcode(this.value)"><div id="x" class='famfam active famfam-bullet_go'></div></a>
                        <div class="form_status"><p></p></div>
                    </div>
                </div>
            </div>

            <div id="form_add_new_Name-header" class="accordion_headings">Robna marka i naziv proizvoda</div>
            <div id="form_add_new_Name-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Unesite robnu marku; robna marka i proizvoðaè ne moraju biti isti.</p>
        				<label class="form_label">Robna marka</label>
        				<input class="form_input" type="text" id="brand" />
        			</div>
        			<div class="form_group">
                        <p class="form_instructions">Unesite naziv proizvoda.</p>
        				<label class="form_label">Naziv</label>
        				<input class="form_input" type="text" id="product_name" size="60" maxlength="50"/>
                        <div class="form_status"><p></p></div>
                    </div>
                </div>
            </div>
            
            <div id="form_add_new_Manufacturer-header" class="accordion_headings" >Proizvoðaè</div>
            <div id="form_add_new_Manufacturer-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Odaberite proizvoðaèa. Ukoliko ne postoji, dodajte novog klikom na ikonu kraj izbornika.</p>
        				<label class="form_label">Proizvoðaè</label>
        				<select class="form_dropdown" style="width:250px" id="manufacturer" name="manufacturer_choice">
                            <option selected="selected" value="">-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
        				<a href="#" class="Icon_Button" onclick="validate_barcode(this.value)"><div id="x" class='famfam active famfam-add'></div></a>
                        <div class="form_status"><p></p></div>
                    </div>
                </div>
            </div>

            <div id="form_add_new_Packaging-header" class="accordion_headings" >Pakiranje</div>
            <div id="form_add_new_Packaging-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Unesite kolièinu i odaberite mjernu jedinicu kao što su navedene na pakiranju proizvoda.</p>
                        <label class="form_label">Kolièina</label>
        				<input class="form_input" type="text" id="quantity" size="15" maxlength="10"/>
        			</div>
        			<div class="form_group">
                        <label class="form_label">Mjerna jedinica</label>
        				<select class="form_dropdown" style="width:50px" id="measuring_unit" name="measuring_unit_choice">
                            <option selected="selected" value="">-</option>
                            <option>kg</option>
                            <option>lit.</option>
                            <option>g</option>
                        </select>
                    </div>
                    <div class="form_status"><p></p></div>
                </div>
            </div>
            
            <div id="form_add_new_Price-header" class="accordion_headings" >Cijena</div>
            <div id="form_add_new_Price-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Unesite cijenu proizvoda na datum kupnje i odaberite datum kupnje.</p>
                        <label class="form_label">Cijena</label>
        				<input class="form_input" type="text" id="price" size="12" maxlength="8"/> kn
        			</div>
        			<div class="form_group">
                        <label class="form_label">Datum kupnje</label>
                        <input class="form_input" type="text" id="purchase_date" size="15" maxlength="10"/>
                    </div>
                    <div class="form_status"><p></p></div>
                </div>
            </div>
            
            <div id="form_add_new_AddInfo-header" class="accordion_headings" >Opis i dodatne informacije</div>
            <div id="form_add_new_AddInfo-content" class="accordion_contents">
                <div class="accordion_child">
                    <div class="form_group">
                        <p class="form_instructions">Unesite opis proizvoda i druge informacije koje smatrate relevantnima.</p>
                        <label class="form_label">Opis i informacije</label>
        				<textarea id="description" name="description_text" rows="4"/></textarea>
        			</div>
                    <div class="form_status"><p></p></div>
                </div>
            </div>

        </div><!--End of accordion parent-->

    	<script>
            new Accordian('accordian_add_new',5,'header_highlight');
        </script>

</div> <!-- PAGE_ADD_NEW END -->