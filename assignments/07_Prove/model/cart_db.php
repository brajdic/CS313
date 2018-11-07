<?php

function addToCart($product_id, $user_id) {
global $db;
$query = 'INSERT INTO cart (productID, usrID)
        VALUES (:product_id, :user_id)';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->bindValue(':user_id', $user_id);
$results = $statement->execute();
$statement->closeCursor();
$_SESSION['message'] = $results;
return $results;
}

function removeFromCart($product_id) {
    global $db;
    $query = 'DELETE FROM cart
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor(); 
    return $success;   
}
function removeAllFromCart($user_id) {
    global $db;
    $query = 'DELETE FROM cart
              WHERE usrID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $success = $statement->execute();
    $statement->closeCursor(); 
    return $success;   
}
function getCartByUserID($user_id) {
    global $db;
    $query = 'SELECT * FROM cart
              WHERE usrId = :user_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function getProductsByCart($user_id) {
   global $db;
   $query = 'SELECT * FROM cart
   INNER JOIN products
   ON cart.productID = products.productID
   WHERE cart.usrId = :user_id
   ORDER BY cart.productID'; 
   $statement = $db->prepare($query);
   $statement->bindValue(":user_id", $user_id);
   $statement->execute();
   $products = $statement->fetchAll();
   $statement->closeCursor();
   return $products;
}

function calculateTotal($cart, $onSale)
{
   $total = 0;
   foreach ($cart as $items)
   {
      if(!$items['onSale'])
      $total += $items['listPrice'] * $items['quantity'];
      else
         $total += $items['salePrice'] * $items['quantity'];
   }
   return $total;
}

function updateQuantity($product_id, $user_id, $quantity) {
    global $db;
    $query = 'UPDATE cart
              SET quantity = :quantity
              WHERE productID = :product_id AND usrId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}


