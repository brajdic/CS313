<?php
// Get the DB connection
require_once ('database.php');

function registerUser($firstname, $lastname, $email, $password, $phonenumber, $zipcode, $state, $city, $address, $regusername) {
global $db;
$sql = 'INSERT INTO users (usrFirstName, usrLastName, usrEmail, usrPasswd, usrPhone, usrZip, usrState, usrCity, usrAddress, usrName)
                    VALUES (:firstname, :lastname, :email, :password, :phonenumber, :zipcode, :state, :city, :address, :username)';
$statement = $db->prepare($sql);
$statement->bindValue(':firstname', $firstname);
$statement->bindValue(':lastname', $lastname);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->bindValue(':phonenumber', $phonenumber);
$statement->bindValue(':zipcode', $zipcode);
$statement->bindValue(':state', $state);
$statement->bindValue(':city', $city);
$statement->bindValue(':address', $address);
$statement->bindValue(':username', $regusername);
$results = $statement->execute();
$statement->closeCursor();
return $results;
}

function login($username) {
global $db;
$query = "SELECT * FROM users WHERE usrName = :username";
$statement = $db->prepare($query);
$statement->bindValue(":username", $username);
$statement->execute();
$user = $statement->fetch();
$statement->closeCursor();
return $user;
}

function changePrice($onSale, $product_id) {
    global $db;
    $query = 'UPDATE products
              SET onSale = :onSale
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':onSale', $onSale);
    $statement->execute();
    $statement->closeCursor();
}

function updateProfile($firstname, $lastname, $email, $password, $phonenumber, $zipcode, $state, $city, $address, $user_id) {
global $db;
$query = 'UPDATE users 
          SET usrFirstName = :firstname, 
            usrLastName = :lastname,
            usrEmail = :email,
            usrPasswd = :password,
            usrPhone = :phonenumber,
            usrZip = :zipcode,
            usrState = :state,
            usrCity = :city,
            usrAddress = :address
          WHERE usrId = :user_id';
$statement = $db->prepare($query);
$statement->bindValue(':user_id', $user_id);
$statement->bindValue(':firstname', $firstname);
$statement->bindValue(':lastname', $lastname);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->bindValue(':phonenumber', $phonenumber);
$statement->bindValue(':zipcode', $zipcode);
$statement->bindValue(':state', $state);
$statement->bindValue(':city', $city);
$statement->bindValue(':address', $address);
$results = $statement->execute();
$statement->closeCursor();
return $results;
}
