<?php
include("header.php");
   include("nav.php");
session_start();
   $_SESSION['lastPage'] = $action;
   if(isset($_SESSION['message']))
   echo $_SESSION['message'];
   $_SESSION['message'] = "";
?>
<main>
    <?php foreach($products as $product) : //list the products ?>
            <ul class="list">
               <br>
                <br>
                <a href="?action=<?php echo $product['productID']; ?>">
                        <?php echo $product['smallImagePath']; ?>
                        <br>
                        <?php echo "<div>" . $product['productName'] . "</div>"; ?>
                        <br>
                        <br>
                        </a>
                        <?php
                        if(!$product['onSale']) 
                        echo "<div>$" . $product['listPrice'] . "</div>";
                        else 
                        echo "<div>$" . $product['salePrice'] . "</div>";
						//add button for product if user is logged in
						echo ('<form action="." method="post">
							<div>
							<ul>
							<input type="submit" value="Add to cart">
							<input type="hidden" name="product_id" value = ');
							echo ($product['productID'] . '>');
							echo('<input type="hidden" name="user_id" value = ');
							echo $_SESSION['userID'];
							echo('>');
							echo('<input type="hidden" name="action" value= ');
							if(isset($_SESSION['loggedIn'])) 
                            echo ('addCart>'); 
                            else 
                            echo ('registerPage>');
							echo('</ul>
							</div>
							</form>');
						//stop
                        ?>
                        <br>
            </ul>
            <?php endforeach; ?>
</main>
<?php
include("footer.php");
?>
