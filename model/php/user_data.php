<?php
function getIP() { return $_SERVER['REMOTE_ADDR']; }
function getCountry(){
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getIP());
$country = $xml->geoplugin_countryName;	
return $country;
}
?>