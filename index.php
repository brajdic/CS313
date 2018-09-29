<?php
session_start();
require("view/header.php");
require("view/nav.php");
require("view/footer.php");
//$_SESSION["last_visitor"] = $country; to be continued

if(filter_input(INPUT_GET, 'action')) {
 $action  = filter_input(INPUT_GET, 'action');
}else {
   $action = filter_input(INPUT_POST, 'action');
}
switch($action) {
	case 'about':
	include("view/about.php");
	break;
	case 'assignments':
	include("view/assignments.php");
	break;
	default:
	break;
}
?>