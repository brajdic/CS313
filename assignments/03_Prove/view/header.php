<?php
$timeFrame = 1209600;
session_set_cookie_params($timeFrame, '/');
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ashton's Fashions</title> 
    <link rel="stylesheet" type="text/css" href="css/format.css">
</head>
<body>
<div><a href="."><img class="banner" src="images/banner.jpg" alt="Banner Image"/></a></div>
<header>
<?php if(!isset($_SESSION['loggedIn']))
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

else
{
echo '<p>Welcome: <a href = "?action=myProfile">' . ($_SESSION['username']) . "</a> | <a href = '?action=viewCart' >My Cart</a>: ". ($_SESSION['cartNumber'])."</p>";
echo '<form action ="." method = post>
<p><input type="submit" name ="action" value="Logout"></p>
</form>';
}
?>
