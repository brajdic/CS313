<?php
$timeFrame = 1209600;
session_set_cookie_params($timeFrame, '/');
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
$country = $xml->geoplugin_countryName;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CS 313</title>
<link rel="stylesheet" href="css/c.css">
</head>
<body>
<header>
<a href="."><img src="images/byu.png" alt="BYU-Idaho logo"></a>
</div>
</header>

