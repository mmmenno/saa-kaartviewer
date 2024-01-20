<?php


$sparql = '
PREFIX geo: <http://www.opengis.net/ont/geosparql#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX bif: <http://www.openlinksw.com/schemas/bif#>
PREFIX schema: <https://schema.org/>
PREFIX adbandb: <https://iisg.amsterdam/vocab/adb-andb/>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ?lp ?wkt (GROUP_CONCAT(DISTINCT ?adreslabel;SEPARATOR=",") as ?labels) (count(DISTINCT ?resident) as ?residents) WHERE {
  ?adres adbandb:street ?andbstraat .
  ?adres rdfs:label ?adreslabel .
  ?adres owl:sameAs ?lp .
  ?lp geo:hasGeometry/geo:asWKT ?wkt .
  ?residency schema:address ?adres .
  ?resident adbandb:inhabits ?residency .
	bind (bif:st_geomfromtext(xsd:string(?wkt)) as ?x)
  bind (bif:st_geomfromtext("POLYGON((' . $_GET['bbox'] . '))") as ?y)
  FILTER (bif:st_intersects(?x, ?y)) 
} 
GROUP BY ?lp ?wkt limit ' . ($limitperbron + 1) . '
';

//echo $sparql;
$endpoint = 'https://api.druid.datalegend.net/datasets/andb/ANDB-ADB-all/services/default/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);

//print_r($data);
//echo count($data['results']['bindings']);

if(isset($data['results']['bindings']) && count($data['results']['bindings']) > $limitperbron){
	$limitbereikt = true;
}


if(isset($data['results']['bindings'])){
	foreach ($data['results']['bindings'] as $key => $value) {

	  $adr = str_replace("https://iisg.amsterdam/resource/andb/lp/","",$value['lp']['value']);

	  $labels = explode(",",$value['labels']['value']);
	  for($i=0; $i < count($labels); $i++){
	  	$labels[$i] = trim($labels[$i]);
	  }
	  $ulabels = array_unique($labels);

	  $wkt = $value['wkt']['value'];
	  if(!isset($points[$wkt])){
	    $points[$wkt] = array(
	      "cnt" => $value['residents']['value'],
	      "labels" => $ulabels,
	      "adressen" => array($adr)
	    );
	  }else{
	    $points[$wkt]['cnt'] = $points[$wkt]['cnt'] + $value['nr']['value'];
	    
	    $points[$wkt]['labels'] = array_merge($ulabels,$points[$wkt]['labels']);
	    $points[$wkt]['labels'] = array_unique($points[$wkt]['labels']);

	    $points[$wkt]['adressen'][] = $adr;
	    $points[$wkt]['adressen'] = array_unique($points[$wkt]['adressen']);

	  }
	}
}

//print_r($points);


?>