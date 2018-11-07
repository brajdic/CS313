<?php
$timeFrame = 1209600;
session_set_cookie_params($timeFrame, '/');
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>CS 313</title> 
    <link rel="stylesheet" type="text/css" href="css/format.css">
</head>
<body>
	<header>
<a href="."><img src="images/banner.png" alt="BYU-Idaho logo"></a>
<?php if(!isset($_SESSION['loggedIn'])){
echo '<p class="nav"><b>'. " <a href = '?action=viewCart' >My Cart</a>: ". ($_SESSION['cartNumber'])."</b></p>";
echo '<form action ="." method = post>
  <p><input type="text" name="username" value="" placeholder="username" required>
  <input type="password" name="password" value="" placeholder="password" required>  
<input type="submit" name ="action" value="Login">
</p></form> 
<form action ="." method = post>
<p>
<input type="submit" value="Register">
<input type="hidden" name ="action" value="registerPage">
</p></form>';
}
else
{
echo '<p class="nav"><b>Welcome: <a href = "?action=myProfile">' . ($_SESSION['username']) . " | <a href = '?action=viewCart' >My Cart</a>: ". ($_SESSION['cartNumber'])."</b></p>";
echo '<form action ="." method = post>
<p><input type="submit" name ="action" value="Logout"></p>
</form>';
}
?>
