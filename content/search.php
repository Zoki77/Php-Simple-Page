<script type="text/javascript">
	function changeView(objShow, objHide){
		var arr = new Array();
		arr = document.getElementsByName(objShow);
		for(var i = 0; i < arr.length; i++)
		{
			var obj = document.getElementsByName(objShow).item(i);
			obj.style.display = 'inline-block';
		}
		arr = document.getElementsByName(objHide);
		for(var i = 0; i < arr.length; i++)
		{
			var obj = document.getElementsByName(objHide).item(i);
			obj.style.display = 'none';
		}
	}
</script>

<div id="page_search">
    <p>
    	<form action="start.php?page=search" name="search" method="post">
    		<input type="search" name="searched_string" value="<?php if(isset($_POST['submit'])) echo $_POST['searched_string']; ?>" />
    		<select name="category">
    			<option value="1" <?php if($_POST['category']==1) echo 'selected="selected"'; ?>>Title</option>
        		<option value="2" <?php if($_POST['category']==2) echo 'selected="selected"'; ?>>Description</option>
    			<option value="3" <?php if($_POST['category']==3) echo 'selected="selected"'; ?>>Barcode</option>
    			<option value="4" <?php if($_POST['category']==4) echo 'selected="selected"'; ?>>Manufacturer</option>
    			<option value="5" <?php if($_POST['category']==5) echo 'selected="selected"'; ?>>Reseller</option>
    		</select>
    		<input type="submit" name="submit" value="Search">
    	</form>
    </p>
	<p>
	
	<?php
	if(isset($_POST['submit'])) // Provjera je li se došlo na stranicu pritiskom na gumb "Search"
	{
		db_open_connection(); // Otvaram konekciju
		
		$search_string = mysql_real_escape_string(stripslashes($_POST['searched_string']));
		
		switch ($_POST['category']) {
			case 1:
				$results = mysql_query("SELECT barcode, product_name, product_description FROM Product WHERE product_name LIKE '%$search_string%';");
				break;
			case 2:
				$results = mysql_query("SELECT barcode, product_name, product_description FROM Product WHERE product_description LIKE '%$search_string%';");
				break;
			case 3:
				$results = mysql_query("SELECT barcode, product_name, product_description FROM Product WHERE barcode = $search_string;");
				break;
			case 4:
				$results = mysql_query("SELECT manufacturer_name, manufacturer_website FROM Manufacturer WHERE manufacturer_name LIKE '%$search_string%';");
				break;
			case 5:
				$results = mysql_query("SELECT reseller_name, reseller_website FROM Reseller WHERE reseller_name LIKE '%$search_string%';");
				break;
		}
		
		if(mysql_num_rows($results)==0)
		{
			echo "Niti jedan unos ne odgovara traženom pojmu.";
		}
		else
		{
			switch ($_POST['category']) {
				case 1:
				case 2:
				case 3:
					?>
					
					<form>
						<input type="radio" name="display_style" id="search_results_detail" checked="checked" OnClick="changeView('search_results_detail', 'search_results_thumbnails');" />
						<label for="search_results_detail">Show details</label>
						<input type="radio" name="display_style" id="search_results_thumbnails"  OnClick="changeView('search_results_thumbnails', 'search_results_detail');" />
						<label for="search_results_thumbnails">Show thumbnails</label>
					</form>
					
					<?php
					while ($product = mysql_fetch_assoc($results))
					{
					?>
					<span name="search_results_detail" style="display: inline-block; width: 724px;">
						<a href="http://www.google.com"> 
							<table>
								<tr>
									<th colspan="2"><?php echo $product['product_name']; ?></th>
								</tr>
								<tr>
									<td rowspan="2">
									<?php
										$product_barcode = $product['barcode'];
										$picture = mysql_fetch_assoc(mysql_query("SELECT picture_address FROM Galleries, Product WHERE Galleries.gallery_ID=Product.gallery_ID AND Product.barcode=$product_barcode;"));
										echo '<img src="' . $picture['picture_address'] . '" width="150" height="150" />';
									?>
									</td>
									<td>
										<?php echo substr($product['product_description'], 0, 250) . '...'; ?>
									</td>
								</tr>
								<tr>
									<td>
									<?php
										$price = mysql_fetch_assoc(mysql_query("SELECT price FROM Prices WHERE barcode=$product_barcode ORDER BY price ASC LIMIT 1;"));
										echo 'Najniža cijena: ' . $price['price'];
									?>
									</td>
								</tr>
							</table>
						</a>
					</span>
					<span name="search_results_thumbnails" style="display: none; width: 181px;">
						<a href="http://www.google.com"> 
							<table style="margin: auto;">
								<tr>
									<td>
									<?php
										$product_barcode = $product['barcode'];
										$picture = mysql_fetch_assoc(mysql_query("SELECT picture_address FROM Galleries, Product WHERE Galleries.gallery_ID=Product.gallery_ID AND Product.barcode=$product_barcode;"));
										echo '<img src="' . $picture['picture_address'] . '" width="150" height="150" />';
									?>
									</td>
								</tr>
								<tr>
									<th><?php echo $product['product_name']; ?></th>
								</tr>
							</table>
						</a>
					</span>
					<?php
					}
					break;
				case 4:
					while ($manufacturer = mysql_fetch_assoc($results))
					{
					?>
						<p><a href="<?php echo 'http://' . $manufacturer['manufacturer_website']; ?>" target="_blank"><?php echo $manufacturer['manufacturer_name']; ?></a></p>
					<?php
					}
					break;
				case 5:
					while ($reseller = mysql_fetch_assoc($results))
					{
					?>
						<p><a href="<?php echo 'http://' . $reseller['reseller_website']; ?>" target="_blank"><?php echo $reseller['reseller_name']; ?></a></p>
					<?php
					}
					break;
			}
		}
	}
	?>
	
	</p>
</div>