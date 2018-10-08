<?php
include("header.php");
include("nav.php");
session_start();
   if(!$_SESSION['loggedIn'])
    header("Location: .");
   $_SESSION['lastPage'] = $action;
   if(isset($_SESSION['message']))
   echo '<h1 class ="message">' . $_SESSION['message'] . '</h1>';
   $_SESSION['message'] = "";
?>
<main>
   <div>
   <h1>
   <?php 
	if(!empty($total))
	echo("Your cart: " . $_SESSION['cartNumber']); 
    else
	echo("Your cart is empty!");
	?>
	</h1>
   </div>
    <?php foreach($cart as $items) : ?>
            <li><div>
                <br>
<a href="?action=<?php echo $items['productID']; ?>">
                        <?php echo $items['smallImagePath'] . $items['productName'] . " x " . $items['quantity']; ?>
                </a>       
<br>
      <form action="." method="post">
       <div><ul>
      <input type="submit" value="Remove from cart">
      <input type="hidden" name="product_id" value = "<?php echo $items['productID']; ?>">
      <input type="hidden" name="user_id" value = "<?php echo $_SESSION['userID']; ?>">
      <input type="hidden" name="action" value="removeCart">
      </ul></div>
      </form>
            </div></li>
            <?php endforeach; ?>
      </main>
           <hr>
		<div>
		<h1>
		<?php 
		//display checkout button and total
		if(!empty($total)) {
			echo ("Your total is: $" . $total . "<br>" . '<form action="." method="post">
      <input type="submit" value="Checkout">
      <input type="hidden" name="action" value="checkout">
      </form>'); 
		}
		   ?>
		</h1>
		</div>	
      </form>	  
<?php
include("footer.php");
?>
