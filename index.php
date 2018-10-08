<?php
session_start();
require("model/php/user_data.php"); 
$_SESSION["ip"] = getIP();
$_SESSION["country"] = getCountry();
require("view/header.php");
require("view/nav.php");
require("view/footer.php");
//todo hook to db
if(filter_input(INPUT_GET, 'action')) {
 $action  = filter_input(INPUT_GET, 'action');
} else {
   $action = filter_input(INPUT_POST, 'action');
}
switch($action) {
	case 'about':
	include("view/about.php");
	break;
	case 'assignments':
	include("view/assignments.php");
	break;
	case '03_Teach';
	header("Location:./assignments/03_Teach/index.php");
	break;
	case '03_Prove';
	header("Location:./assignments/03_Prove/");
	break;
	default:
	include("view/assignments.php");
	include("view/catfacts.php");
	break;
}
?>