<?php
   session_start();
   //$_SESSION['lastPage'] = $action;
   if (isset($_SESSION['loggedIn']))
   header("Location: .");
   include 'header.php';
   include 'nav.php'; 
    if(isset($_SESSION['message']))
   {
      echo '<h1 class ="message">' . $_SESSION['message'] . "</h1>";
      $_SESSION['message'] = "";
   } 
?>
<main>
    <div><h1>Register an account with us</h1></div>
    <form action="." method="post" >
    <fieldset>
        <legend>Account Information</legend>
         <label>Username:</label>
        <input type="text" name="regusername" 
               value="" pattern="[a-z, A-Z, 1-9].{5,}" title ="Username must be at least 6 characters long." required />
        <br>
        <label>E-Mail:</label>
        <input type="email" name="email" 
               value="" placeholder="example@example.com" required>
       <br>
        <label>Password:</label>
        <input type="password" name="password" 
               value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" require>
        <br> 
        <label>Verify Password:</label>
        <input type="password" name="vPassword" 
               value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="must match password" required>
        <br>
    </fieldset>
    <fieldset>
        <legend>Contact Information</legend>
        <label>First Name:</label>
        <input type="text" name="firstname" 
               value="" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastname" 
               value="" required>
        <br>
        <label>Address:</label>
        <input type="text" name="address" 
               value="" required>
        <br>
        <label>City:</label>
        <input type="text" name="city" 
               value="" required>
        <br>
        <label>State:</label>
        <select name ="state" required>
        <option selected disabled>Select state</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>		
        <br>
        <label>ZIP Code:</label>
        <input type="text" name="zipcode" 
               value="" pattern="[^a-z\x22]+" maxlength ="5" title="Insert a valid zip code" placeholder="12345">
       <br>
        <label>Phone Number:</label>
        <input type="text" name="phonenumber" 
               value="" pattern=".{10}" placeholder="1112221234" maxlength ="10" title="Please follow the format: 1112221234">
        <br>
    </fieldset>
    <fieldset>
        <legend>Submit Registration</legend>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Register"><br>
    </fieldset>
    </form>
</main>
<?php include 'footer.php'; ?>        
