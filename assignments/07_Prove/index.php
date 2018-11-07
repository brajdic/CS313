<?php
ini_set('display_errors', 0);
session_start();
//gets the model
require_once("model/database.php");
require('model/product_db.php');
require('model/category_db.php');
require('model/users_db.php');
require('model/cart_db.php');
if(!isset($_SESSION['cartNumber']))
{
   $cartNumber = 0;
   $_SESSION['cartNumber'] = $cartNumber;
}
else
$cartNumber = $_SESSION['cartNumber'];
if(filter_input(INPUT_GET, 'action')) {
 $action  = filter_input(INPUT_GET, 'action');
}else {
   $action = filter_input(INPUT_POST, 'action');
}
//switch case to make decisions based on what the user does

$categories = getCategories();
switch($action)
{
   case 'Register':
   $firstname = filter_input(INPUT_POST, 'firstname');
   $lastname = filter_input(INPUT_POST, 'lastname');
   $email = filter_input(INPUT_POST, 'email');
   $password = filter_input(INPUT_POST, 'password');
   $vPassword = filter_input(INPUT_POST, 'vPassword');
   $phonenumber = filter_input(INPUT_POST, 'phonenumber');
   $zipcode = filter_input(INPUT_POST, 'zipcode');
   $state = filter_input(INPUT_POST, 'state');
   $city = filter_input(INPUT_POST, 'city');
   $address = filter_input(INPUT_POST, 'address');
   $regusername = filter_input(INPUT_POST, 'regusername');
   //Validate inputs
   if(empty($firstname)   || empty($lastname) || empty($email) || empty($password) || empty($regusername)
   || empty($phonenumber) || empty($zipcode)  || empty($state) || empty($city)     || empty($address) || empty($vPassword)) 
   {
      $error = "<strong>Please enter valid data in all fields.</strong>
                <br>
                <br>
                Redirecting in 5 seconds..";
   }
    else if($vPassword != $password) {
      $error = "<strong>The passwords did not match.</strong>
                <br>
                <br>
                Redirecting in 5 seconds..";
      } else {
   $password = hash('sha256', $password);
      }
   
   //if there is an error send them to to for repair
   if(isset($error))
   {
      include('errors/error.php');
      header("refresh:5; ?action=" . $_SESSION['lastPage']);
      exit();
   }
   // is true if registerUser worked
   else if ($results = registerUser($firstname, $lastname, $email, $password, $phonenumber, $zipcode, $state, $city, $address, $regusername)) {
    //$_SESSION['message'] = "You are now registered, $regusername.<br>
                            //You may now login.";
      //header("Location: ?action=" . $_SESSION['lastPage']);
	  $username = $regusername;
	  goto login;
}
   // registerUser did not work
    else {
      $_SESSION['message'] = "Sorry, the registration failed. <br>
                              Please try again.";
      header("Location: ?action=" . $_SESSION['lastPage']);
   }
   exit();
   break;
   //show homepage
   case '':
      $products = getAllProducts();
      include("view/product_list.php");
   break;
   //log out
   case 'Logout':
      session_destroy();
      header("Location: ?action=" . $_SESSION['lastPage']);
	  die;
      break;
   case 'Tops':
    $category_ID = 1; 
    $products = getProductsByCategory($category_ID);
    include("view/product_list.php");
     break;
   case 'Bottoms':
    $category_ID = 2; 
    $products = getProductsByCategory($category_ID);
    include("view/product_list.php");
     break;
   case 'Dresses':
    $category_ID = 3; 
    $products = getProductsByCategory($category_ID);
    include("view/product_list.php");
     break;
   case 'Shoes':
    $category_ID = 4; 
    $products = getProductsByCategory($category_ID);
    include("view/product_list.php");
     break;
   case 'Accessories':
    $category_ID = 5; 
    $products = getProductsByCategory($category_ID);
    include("view/product_list.php");
     break;
   default:
    $product_id = $action; 
    $products = getProduct($product_id);
   if ($products != null)
   	include("view/product_view.php");
    $_SESSION['lastPage'] = $action;
   break;
    case 'registerPage':
    //header("Location: view/register.php");
    include("view/register.php");
    break;
    case 'Login':
      $username = filter_input(INPUT_POST, 'username');
      $password = filter_input(INPUT_POST, 'password');
      $password = hash('sha256', $password);
	  login:
      $user = login($username);
      if($password == $user['usrPasswd']) {
         $_SESSION['loggedIn'] = true;
         $_SESSION['username'] = $user['usrName'];
         $_SESSION['userID'] = $user['usrId'];
         $_SESSION['firstName'] = $user['usrFirstName'];
         $_SESSION['lastName'] = $user['usrLastName'];
         $_SESSION['city'] = $user['usrCity'];
         $_SESSION['state'] = $user['usrState'];
         $_SESSION['phone'] = $user['usrPhone'];
         $_SESSION['type'] = $user['usrType'];
         $_SESSION['email'] = $user['usrEmail'];
         $_SESSION['address'] = $user['usrAddress'];
         $_SESSION['zip'] = $user['usrZip'];
         if($user['usrType'] == 'admin')
         $_SESSION['admin'] = $user['usrType'];
         header("Location: ?action=" . $_SESSION['lastPage']);
         $cart = getCartByUserID($_SESSION['userID']);
         //defines the cart session
            foreach ($cart as $items)
            {
               $cartNumber += $items['quantity'];
            }
            $_SESSION['cartNumber'] = $cartNumber;
            header("Location: ?action=" . $_SESSION['lastPage']);
         exit();     
} else {
$error = "<br><strong>Please check the login information is valid and try again.</strong><br><br>
Redirecting in 5 seconds...";
}
   break;
   case 'addCart':
      $product_id = filter_input(INPUT_POST, 'product_id');
      $cart = getProductsByCart($_SESSION['userID']);
      $hasItem = false;
      foreach($cart as $items) {
	if ($items['productID'] == $product_id) {
		$hasItem = true;
		updateQuantity($items['productID'], $items['usrId'], $items['quantity'] + 1); 
            	$cartNumber++;
            	//todo actually count them..
            	$_SESSION['cartNumber'] = $cartNumber;
                header("Location: ?action=" . $_SESSION['lastPage']);
                $_SESSION['message'] = "Updated quantity";
	}
      }
      if($hasItem == false) {
         if(addToCart($product_id, $_SESSION['userID'])) {
            $cartNumber++;
            //todo actually count them..
            $_SESSION['message'] = "Product added to cart.";
            $_SESSION['cartNumber'] = $cartNumber;
            header("Location: ?action=" . $_SESSION['lastPage']);
         } else {
            $_SESSION['message'] = "Product could not be added.";
            header("Location: ?action=" . $_SESSION['lastPage']);
         }
      }
   break;
      case 'removeCart':
      $product_id = filter_input(INPUT_POST, 'product_id');
      if(removeFromCart($product_id))
      {
         $cartNumber = 0;
         $cart = getCartByUserID($_SESSION['userID']);
            foreach ($cart as $items)
            {
               $cartNumber++;
            }
            $_SESSION['cartNumber'] = $cartNumber;
            $_SESSION['message'] = "Product " . " removed from cart.";
            header("Location: ?action=" . $_SESSION['lastPage']);
      }
      else
      {
         $error = "We're sorry, there apprears to be a problem..";
      }
   break;
   case 'checkout':
	include("view/checkout.php");
   break;
   case 'confirm':
   $cart = getProductsByCart($_SESSION['userID']);
   $_SESSION['cartNumber'] = 0;
	include("view/confirm.php");
	removeAllFromCart($_SESSION['userID']);
   break;
   case 'viewCart':
   $cart = getProductsByCart($_SESSION['userID']);
   //get's total
   if($total = calculateTotal($cart, $onSale))
   {
      $total = number_format($total, 2);
   } else {
    
   }
   include("view/cart_list.php");
   break;
   //user profile
   case 'myProfile':
   include("view/myProfile_view.php");
   break;
   //update the user's profile
   case 'updateMyProfile':
   $firstname = filter_input(INPUT_POST, 'firstname');
   $lastname = filter_input(INPUT_POST, 'lastname');
   $email = filter_input(INPUT_POST, 'email');
   $password = filter_input(INPUT_POST, 'password');
   $vPassword = filter_input(INPUT_POST, 'vPassword');
   $phonenumber = filter_input(INPUT_POST, 'phonenumber');
   $zipcode = filter_input(INPUT_POST, 'zipcode');
   $state = filter_input(INPUT_POST, 'state');
   $city = filter_input(INPUT_POST, 'city');
   $address = filter_input(INPUT_POST, 'address');
   //Validate inputs
   if(empty($firstname)   || empty($lastname) || empty($email) || empty($password) ||
      empty($phonenumber) || empty($zipcode)  || empty($state) || empty($city) || empty($address) || empty($vPassword)) 
   {
      $error = "<strong>Please enter valid data in all fields.</strong>";
   } 
   else if($vPassword != $password) {
      $_SESSION['message'] = "<strong>The passwords did not match.</strong>";
      header("Location: ?action=" . $_SESSION['lastPage']); 
      } else {
      $password = hash('sha256', $password);
      if(updateProfile($firstname, $lastname, $email, $password, $phonenumber, $zipcode, $state, $city, $address, $_SESSION['userID']))
      {
         $_SESSION['firstName'] = $firstname;
         $_SESSION['lastName'] = $lastname;
         $_SESSION['city'] = $city;
         $_SESSION['state'] = $state;
         $_SESSION['phone'] = $phonenumber;
         $_SESSION['type'] = $zipcode;
         $_SESSION['email'] = $email;
         $_SESSION['address'] = $address;
         $_SESSION['zip'] = $zipcode;
         $_SESSION['message'] = "Account information has been updated, " . $_SESSION['username']. '.<br>';
      header("Location: ?action=" . $_SESSION['lastPage']);
      }
      
}
   include("view/myProfile.php");
   break;
   case 'listPrice':
   $onSale = filter_input(INPUT_POST, 'salePrice');
   $product_id = filter_input(INPUT_POST, 'product_id');
   echo "onSale is: " . $onSale . "<br>";
   echo "Product_id is: ". $product_id . "<br>";
   changePrice($onSale, $product_id);
   header('Location: ?action=' . $product_id);
   break;
}
  if(isset($error))
       {
         include('errors/error.php');
         header("refresh:5; ?action=" . $_SESSION['lastPage']);
         exit();
       }
