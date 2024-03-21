<?php

include("_parts/header.php");




?>






<div class="container-fluid" id="main">

	<div class="row">

		<div class="col-md-4">
			<div class="personblock">
				<h2>Aan het juiste adres</h2>

				
				<p>
					Aan het juiste adres is een project van Stadsarchief Amsterdam om historische bronnen met een locatie omschrijving via de kaart toegankelijk te maken. Daarvoor zijn de <a href="https://adamlink.nl/geo/addresses/start/">historische adressen</a> op Adamlink verder uitgebreid, zijn de hiernaast genoemde bronnen met die adressen verbonden en is een <a href="https://aanhetjuisteadres.nl/">kaartviewer</a> gemaakt om te tonen hoe je de gegevens met behulp van die verbindingen kunt doorzoeken.
				</p>

				<p>
					Het project kwam tot stand met financiële steun van het Mondriaan Fonds en inhoudelijke ondersteuning van de <a href="https://www.amsterdamtimemachine.nl/">Amsterdam Time Machine</a> (onderzoeksproject van de Humanities Labs van de UvA). Een gedeelte van de gekoppelde bronnen is gerealiseerd via een NDE-project van het Joods Cultureel Kwartier. De gebruikte historische locatiepunten zijn gemaakt door Mark Raat en Bram Boonstra. Deze site is gemaakt door Menno den Engelse (Islands of Meaning) met medewerking van Leon van Wissen (UvA) en verschillende medewerkers van het Stadsarchief Amsterdam.
				</p>


				<h2>Code en data</h2>

				
				<p>
					De code van de kaartviewer is te vinden op <a href="https://github.com/mmmenno/saa-kaartviewer">GitHub</a>. De kaartviewer is nadrukkelijk een prototype - er is vooral gekeken naar manieren waarop bronnen geografisch te ontsluiten zijn. De viewer is niet geoptimaliseerd voor kleine schermen en het aantal velden waarop gezocht kan worden is beperkt - er kan bijvoorbeeld niet in beeldbankbeschrijvingen gezocht worden, of naar standplaatsen van marktkooplieden.
				</p>

				<p>
					Het Stadsarchief migreert haar data momenteel naar nieuwe systemen. Zodra dat mogelijk is zullen ook de resultaten van Aan het juiste adres worden opgenomen in deze systemen. Voor de realisatie van dit prototype konden we dankbaar gebruik maken van de <a href="https://lod.uba.uva.nl/ATM/ATM-KG">Amsterdam Time Machine Knowledge Graph</a>, gehost door de Universiteitsbibliotheek Amsterdam.
				</p>

				<p>
					De kaartviewer bevraagt de <a href="https://lod.uba.uva.nl/ATM/ATM-KG/sparql">SPARQL endpoint</a> op die knowledge graph om steeds de gewenste informatie op te halen. Qua snelheid en mogelijkheden is ongetwijfeld nog wel wat winst te behalen met een fulltext search engine. Maar deze opzet was in dit stadium heel geschikt om bronnen, zodra verbindingen met adressen een feit waren, snel voor de kaartviewer beschikbaar te maken.
				</p>

				<p>
					Bovendien is deze api voor iedereen benaderbaar (net zoals de <a href="https://druid.datalegend.net/andb/ANDB-ADB-all/sparql/default">Druid ANDB SPARQL endpoint</a>, waar de diamantwerkers te vinden zijn). Wil je zelf iets maken waar de standplaatsen van de marktkooplieden wel in te doorzoeken zijn, of weer worden gegeven in een specifiek kleurenpalet, dan kan dat nu.
				</p>

				
			</div>

		</div>

		<div class="col-md-4">
			<div class="personblock">
				<h2>Bronnen</h2>

				
				<p>
					Op dit moment zijn de volgende bronnen doorzoekbaar:
				</p>

				<ul>
					<li><strong>Marktkaarten</strong>: zo'n 16.000 vergunningen met een adresvermelding voor het houden van een vaste standplaats op een markt in Amsterdam uit de periode 1922-1954.<br />
					<a href="https://archief.amsterdam/uitleg/indexen/48-marktkaarten-1922-1954">Marktkaarten 1922-1954 - Stadsarchief Amsterdam</a></li>

					<li><strong>Beeldmateriaal</strong>: zo’n 300.000 afbeeldingen die een locatie in de beschrijving hadden en niet auteursrechtelijk beschermd zijn, zijn opgenomen in deze applicatie.<br />
					<a href="https://archief.amsterdam/uitleg/beeldbank/13-zoeken-in-de-beeldbank">Zoeken in de Beeldbank - Stadsarchief Amsterdam</a></li>

					<!--<li><strong>Bevolkingsregisters 1864-1874</strong>: registratie van alle adressen en wie daar woonden in de periode 1864-1874. Het gaat om ruim 1 miljoen persoonsvermeldingen.<br />
					<a href="https://archief.amsterdam/uitleg/indexen/39-bevolkingsregister-1864-1874">Bevolkingsregister 1864-1874 - Stadsarchief Amsterdam</a></li>-->

					<li><strong>Bevolkingsregisters 1874-1893</strong>: registratie van alle adressen en wie daar woonden in de periode 1874-1893. Het gaat om zo’n 2,7 miljoen persoonsvermeldingen.<br />
					<a href="https://archief.amsterdam/uitleg/indexen/37-bevolkingsregister-1874-1893">Bevolkingsregister 1874-1893 - Stadsarchief Amsterdam</a></li>

					<li><strong>Woningkaarten</strong>: ruim 770.000 kaarten met gegevens over de bewoners van een woning uit de periode 1924-1989, geordend op adres.<br />
					<a href="https://archief.amsterdam/uitleg/indexen/25-woningkaarten-1924-1989">Woningkaarten 1924-1989 - Stadsarchief Amsterdam</a></li>

					<li><strong>Verpondingskohieren 1802</strong>: registratie van alle panden binnen een wijk met een zogenoemd verpondingsnummer, dat werd gebruikt om belasting te innen.</li>

					<li><strong>Joods monument</strong>: online monument voor de meer dan 104.000 mensen die in Nederland als Joden werden vervolgd en de Holocaust niet overleefden. Op deze site worden daarvan de 63.164 personen met Amsterdamse adressen getoond.<br />
					<a href="https://www.joodsmonument.nl/nl/page/571160/over-het-joods-monument">Over het Joods Monument</a></li>

					<li><strong>Diamantwerkers</strong>: de Algemene Nederlandse Diamantbewerkersbond (ANDB), opgericht in 1894, is de eerste moderne vakbond van Nederland. De ledenkaarten van de bond zijn gedigitaliseerd, getranscribeerd en toegankelijk gemaakt.<br />
					<a href="https://hdl.handle.net/10622/ARCH00210">Collection Summary: Archief ANDB (iisg.amsterdam)</a></li>



				</ul>

				
			</div>

		</div>

		<div class="col-md-4">
			<div class="personblock">
				<h2>Zoeken</h2>

				<p>
					Een druk op de knop 'Zoek binnen kaartvenster' toont resultaten van <strong>aangevinkte</strong> bronnen die binnen het kaartvenster vallen. Er kunnen maximaal een paar duizend resultaten op de kaart getoond worden - als er meer resultaten zijn verschijnt de melding 'zoom in voor meer'.
				</p>

				<p>
					Naast inzoomen kun je de resultaten ook verfijnen met behulp van één of meer zoekvelden.
				</p>

				
				<p>
					Je kunt zoeken op een adres, opgedeeld in <strong>straat</strong> en <strong>huisnummer</strong>. Bij zoeken op een straatnaam wordt alleen letterlijk en op hele woorden (en geen delen van) gezocht. Wel kan op in het <a href="https://adamlink.nl/geo/streets/list">Adamlink stratenregister</a> opgenomen alternatieve namen ('Stalinlaan') en schrijfwijzen ('Calver Straet') gezocht worden. Huisnummertoevoegingen worden niet meegenomen in deze applicatie.
				</p>

				<p>
					Het resultaat wordt getoond via rode stipjes op de kaart. Als je met de muis over zo’n stipje gaat zie je hoeveel bronnen er zijn die aan je zoekopdracht voldoen. Klik je op een rood stipje, dan verschijnen de resultaten aan de rechterzijde. Hier zie je kort de informatie uit de bron met een link naar de scan of de bron bij de betreffende instelling én een link naar het adres in Adamlink. Bij de instelling is meer informatie te vinden over de (context van) de bron en op Adamlink vind je informatie over de plek, de historie en eventuele naamswijzigingen of spellingsvarianten.
				</p>

				<p>
					Bijzonder bij het zoekveld adres is dat bij een verpondingskohier (dit is een bron van vóór de introductie van adressen) het straatveld gebruikt wordt voor het <strong>wijknummer</strong> en het huisnummerveld voor het <strong>verpondingsnummer</strong>:
				</p>

				<img src="_assets/img/wijk-40.jpg" />

				<p class="small">
					<em>Zoeken binnen de verpondingskohieren op ‘straat’ 40 toont de gekoppelde verpondingsnummers in 1802 in wijk nummer 40 (de <a href="https://adamlink.nl/geo/districts">zestig burgerwijken</a> zijn binnen dit project beschikbaar gemaakt).</em>
				</p>

				<p>
					Je kunt zoeken op een <strong>persoonsnaam</strong> (of alleen een voor- of achternaam). Wanneer je een <strong>geboortedatum</strong> toevoegt, kun je (hoogstwaarschijnlijk) in één oogopslag op de kaart zien op welke locatie deze persoon woonde of werkte.
				</p>

				<p>
					Bijzonder is dat bij het beeldmateriaal de naam van de <strong>vervaardiger</strong> (bijvoorbeeld fotograaf of kunstenaar) is opgenomen in het naamveld. Door te zoeken op zo’n kunstenaarsnaam en te filteren op beeldbank, kun je bijvoorbeeld direct zien van welke plekken hij een werk gemaakt heeft.
				</p>

				<img src="_assets/img/eilers.jpg" />
				
				<p class="small">
					<em>Voorbeeld van de plekken waar Bernard F. Eilers fotografeerde, met rechts de resultaten bij de aangeklikte locatie op de Rozengracht in detail.</em>
				</p>

				<p>
					Het veld geboortedatum is vooral van belang als je naar een specifiek persoon zoekt.
				</p>

				<img src="_assets/img/milgens.jpg" />
				
				<p class="small">
					<em>Voorbeeld van de 7 adressen waar Gesina Antonia Milgens (<a href="https://nl.wikipedia.org/wiki/Tonia_Stieltjes">Tonia Stieltjes</a>) volgens het bevolkingsregister 1874-1893 woonde.</em>
				</p>

				

				<p>
					Er is keuze in historische kaartlagen uit circa 1876, 1909, 1943 en 1985. Deze zijn onderin het scherm te selecteren. Een moderne kaartlaag wordt getoond wanneer je de spatiebalk indrukt.
				</p>

				
			</div>

		</div>

	</div>

</div>


<?php

include("_parts/footer.php");

?>
