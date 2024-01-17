<?php


$sparql = '

PREFIX mem: <http://memorix.io/ontology#>
PREFIX bag: <http://bag.basisregistraties.overheid.nl/def/bag#>
PREFIX skos: <http://www.w3.org/2004/02/skos/core#>
PREFIX hg: <http://rdf.histograph.io/>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX bif: <http://www.openlinksw.com/schemas/bif#>
PREFIX geo: <http://www.opengis.net/ont/geosparql#>
PREFIX schemahttp: <http://schema.org/>
PREFIX schema: <https://schema.org/>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX saa: <https://data.archief.amsterdam/ontology#>
PREFIX rico: <https://www.ica.org/standards/RiC/ontology#>
PREFIX dct: <http://purl.org/dc/terms/>
PREFIX pnv: <https://w3id.org/pnv#>
PREFIX rt: <https://ams-migrate.memorix.io/resources/recordtypes/>

SELECT ?aladr ?label (MIN(?wkt) AS ?wkt) (COUNT(?bbrec) AS ?bbcount) WHERE {
  ?bbrec a rt:Image .
  ';

  if(strlen($_GET['voornaam']) || strlen($_GET['achternaam']) || strlen($_GET['tussenvoegsel'])){

  	$naam = array();
  	if(strlen($_GET['voornaam'])){ 
  		$naam[] = $_GET['voornaam'];
  	}
  	if(strlen($_GET['tussenvoegsel'])){ 
  		$naam[] = $_GET['tussenvoegsel'];
  	}
  	if(strlen($_GET['achternaam'])){ 
  		$naam[] = $_GET['achternaam'];
  	}
  	$searchname = implode(" ",$naam);

  	$sparql .= '?bbrec saa:hasCreator ?creator .
							  ?creator saa:hasAgent ?agent .
							  ?agentcontext mem:hasRecord ?agent .
							  ?agentcontext dct:title ?agentrectitle .
							  FILTER (bif:contains (?agentrectitle, "\'' . $searchname . '\'")) .
				';
  }
  
  $sparql .= ' ?bbrec schemahttp:thumbnailUrl ?thumb .
  ?bbrec saa:hasOrHadSubjectAddress ?aladr .
  #?aladr hg:liesIn <"' . $_GET['straat'] . '"> .
  ?aladr rdfs:label ?label .
  ?aladr schema:geoContains ?lp .
  ?lp geo:asWKT ?wkt .
  ';

  $sparql .= ' bind (bif:st_geomfromtext(xsd:string(?wkt)) as ?x)
  bind (bif:st_geomfromtext("POLYGON((' . $_GET['bbox'] . '))") as ?y)
  FILTER (bif:st_intersects(?x, ?y)) 
} 
GROUP BY ?aladr ?label limit ' . ($limitperbron + 1) . '
';

//echo $sparql;
//die;
$endpoint = 'https://api.lod.uba.uva.nl/datasets/ATM/ATM-KG/services/ATM-KG/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);

//print_r($data);
//echo count($data['results']['bindings']);

if(isset($data['results']['bindings']) && count($data['results']['bindings']) > $limitperbron){
	$limitbereikt = true;
}


if(isset($data['results']['bindings'])){
	foreach ($data['results']['bindings'] as $key => $value) {

	  $adr = str_replace("https://adamlink.nl/geo/address/","",$value['aladr']['value']);

	  $wkt = $value['wkt']['value'];
	  if(!isset($points[$wkt])){
	    $points[$wkt] = array(
	      "cnt" => $value['bbcount']['value'],
	      "labels" => array($value['label']['value']),
	      "adressen" => array($adr)
	    );
	  }else{
	    $points[$wkt]['cnt'] = $points[$wkt]['cnt'] + $value['bbcount']['value'];
	    
	    $points[$wkt]['labels'][] = $value['label']['value'];
	    $points[$wkt]['labels'] = array_unique($points[$wkt]['labels']);

	    $points[$wkt]['adressen'][] = $adr;
	    $points[$wkt]['adressen'] = array_unique($points[$wkt]['adressen']);

	  }
	}
}

//print_r($points);


?>