<?php
	// Start the session
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
	//session_unset(); 
	//session_destroy();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
	</head>
	<body>
		<form action="cart.php" method="post">
			<button name="cart" value="Bird">Add</button> Bird<br>
			<button name="cart" value="Lizard">Add</button> Lizard<br>
			<button name="cart" value="Dog">Add</button> Dog<br>
			<button name="cart" value="Cat">Add</button> Cat<br><br>
			<input type="submit" name="cart" value="View Cart">
		</form>
	</body>
</html>