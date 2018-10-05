<?php
	session_start();
?>
<html>
	<head>
	</head>
	<body>
		<?php
			$value = $_POST['cart'];
			if ($value != "View Cart") {
				$items = array();
				if (!empty($_SESSION['cartItems']))
					$items = $_SESSION["cartItems"];
				array_push($items, $value);
				$_SESSION["cartItems"] = $items;

				echo $value . " was added to the cart.";
			} else {
				if (!empty($_SESSION['cartItems'])) {
					$itemNames = "";
					$length = count($_SESSION["cartItems"]);
					for($i = 0; $i < $length; $i++) {
						if ($length - 1 == $i)
							$itemNames .= $_SESSION["cartItems"][$i];
						else
							$itemNames .= $_SESSION["cartItems"][$i] . ", ";	
					}
					echo "Items in the cart: " . $itemNames . "<br><br>";
					echo "
					<form action=\"checkout.php\" method=\"post\">
						<input type=\"submit\" name=\"cart\" value=\"Check Out\">
					</form>
					";
				} else {
					echo "Your cart is empty";
				}
			}
		?>
		<br><a href="index.php">Back to items</a>
	</body>
</html>