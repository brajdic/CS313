<?php
if(!isset($_SESSION))
    session_start();
if(!$_SESSION['loggedIn'])
    header("Location: .");
   $_SESSION['lastPage'] = $action;
   include 'header.php';
   include 'nav.php'; 
?>
Thank you for your purchase, <?php echo($_SESSION['username']); ?>!
<br><br>
		Order shipped to:
		<?php
			$address = htmlspecialchars($_POST['address']);
			$city = htmlspecialchars($_POST['city']);
			$state = htmlspecialchars($_POST['state']);
			$zip = htmlspecialchars($_POST['zipcode']);
			echo $address . " " . $city . ", " . $state . " " . $zip;
		?>
		<br>
		<br>
		<a href=".">Back to store</a>
<?php foreach($cart as $items) : ?>
            <li><div>
                <br>
                        <?php echo $items['smallImagePath'] . $items['productName'] . " x " . $items['quantity']; ?>
                
            <?php endforeach; ?>
<?php 
include("footer.php");?>