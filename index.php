<?php

include("_parts/header.php");

if(!isset($_GET['straat'])){
	$_GET['straat'] = "https://adamlink.nl/geo/street/jodenbreestraat/2158";
}
if(!isset($_GET['bron'])){
	//$bron = "diamantbewerkersbond";
}else{
	$bron = $_GET['bron'];
}

?>





<div id="map"></div>
<div id="layerlinks">
	toon historische kaart van  
	<a id="layer1876" href="">1876</a> | 
	<a id="layer1909" href="">1909</a> | 
	<a id="layer1943" href="">1943</a> | 
	<a id="layer1985" href="">1985</a>
	en klik op [spatiebalk] om onderliggende huidige kaart te tonen
</div>


<div id="searchbox">
	
	<form id="searchform" method="get" action="/">

		<span class="small">naam</span><br />

		<div class="input-group">
			<input style="width:80px; margin-right: 5px;" type="text" name="voornaam" placeholder="voornaam" class="form-control" />
			<input style="width:20px; margin-right: 5px;" type="text" name="tussenvoegsel" placeholder="tussenv." class="form-control" />
			<input style="width:80px;" type="text" name="achternaam" placeholder="achternaam" class="form-control" />
		</div>

		<span class="small">geboortedatum</span><br />
		<input style="width:130px; margin-bottom: 12px;" type="text" name="geboortedatum" placeholder="dd-mm-jjjj" class="form-control" />
		
		
		
		<span class="small">adres</span><br />

		<div class="input-group">
			<input style="width:180px; margin-right: 5px;" type="text" name="straat" placeholder="straat" class="form-control" />
			<input style="" type="text" name="huisnr" placeholder="huisnr" class="form-control" />
		</div>
		

		
		<input type="checkbox" name="marktkaarten" id="marktkaarten" />
		<label for="marktkaarten">in marktkaarten</label>
		
		<input type="checkbox" name="joodsmonument" id="joodsmonument" />
		<label for="joodsmonument">in joods monument</label>
		
		<br />

		<input type="checkbox" name="diamantwerkers" id="diamantwerkers" />
		<label for="diamantwerkers">in diamantwerkers</label>
		
		<input type="checkbox" name="beeldbank" id="beeldbank" />
		<label for="beeldbank">in beeldbank</label>
		
		<br style="clear:both" />

		<button class="btn btn-primary">zoek binnen kaartvenster</button>

	</form>


		
</div>


<div id="searchresults">
	<div id="searchinfo"></div>
	<div id="info-with-address"></div>
</div>


<script src="_assets/js/map.js"></script>
<script src="_assets/js/search.js"></script>

<?php

include("_parts/footer.php");

?>
