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
    <?php foreach($products as $product) : ?>
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
                        ?>
                        <br>
            </ul>
            <?php endforeach; ?>
</main>
<?php
include("footer.php");
?>
