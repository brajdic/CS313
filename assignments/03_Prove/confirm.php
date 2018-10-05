<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
?>
<html>
	<head>
	</head>
	<body>
		Thank you for your purchase!<br>
		Items purchased: 
		<?php
			if (!empty($_SESSION['cartItems'])) {
				$itemNames = "";
				$length = count($_SESSION["cartItems"]);
				for($i = 0; $i < $length; $i++) {
					if ($length - 1 == $i)
						$itemNames .= $_SESSION["cartItems"][$i];
					else
						$itemNames .= $_SESSION["cartItems"][$i] . ", ";	
				}
				echo $itemNames;
			}
		?>
		<br><br>
		Order shipped to 
		<?php
			$street = htmlspecialchars($_POST['street']);
			$apt = htmlspecialchars($_POST['apt']);
			$city = htmlspecialchars($_POST['city']);
			$state = htmlspecialchars($_POST['state']);
			$zip = htmlspecialchars($_POST['area']);
			echo $street . " #" . $apt . " " . $city . ", " . $state . " " . $zip;
		?>
		<br>
		<br>
		<a href="index.php">Back to store</a>
	</body>
</html>

<?php
	session_unset(); 
	session_destroy();
?>

