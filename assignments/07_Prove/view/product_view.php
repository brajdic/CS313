<?php
   session_start();
   $_SESSION['lastPage'] = $action;
   include("header.php");
   include("nav.php");
   if(isset($_SESSION['message']))
   {
      echo '<h1 class ="message">' . $_SESSION['message'] . "</h1>";
      $_SESSION['message'] = "";
   }
   echo "<br><br>";
   echo "<div><ul>" . "Product name: " . $products['productName'] . "<br>";
   echo  $products['fullImagePath'] . "<br>";
   //echo the product info
   if($products['onSale'])
   {
      echo "Price: $" . "<strike>". $products['listPrice'] . "</strike><br>";
      echo "<p class='sale'>On SALE: $" . $products['salePrice'] . "</p><br>";
   }  else
   echo "Price: $" . $products['listPrice'] . "<br>";
   echo "Size: " . $products['productSize'] . "<br>";
   echo "Code: " . $products['productCode'] ."</ul></div>";
?>
      <form action="." method="post">
       <div><ul>
      <input type="submit" value="Add to cart">
      <input type="hidden" name="product_id" value = "<?php if(isset($_SESSION['loggedIn'])) 
       echo $products['productID']; ?>">
      <input type="hidden" name="user_id" value = "<?php echo $_SESSION['userID']; ?>">
      <input type="hidden" name="action" value = <?php if(isset($_SESSION['loggedIn'])) 
                                               echo "addCart"; 
                                               else 
                                               echo "registerPage"?>>
      </ul></div>
      </form>
      <form action="." method="post">
       <div><ul>
      <?php if(isset($_SESSION['admin'])) 
      echo 
      '<fieldset><legend>Admin Product Panel</legend>
	  <br>
	  <label>List Price</label>
        <select name="salePrice" required>
		<option value="0">Full Price</option>
		<option value="1">On Sale</option>
		</select>
		<br>
		<br>
		<input type="submit" value="Submit">
		</fieldset>';
      ?>
      <input type="hidden" name="product_id" value = "<?php echo $products['productID']; ?>">
      <input type="hidden" name="action" value="listPrice">
      </ul></div>
      </form>
<?php 
include("footer.php"); 
?>

