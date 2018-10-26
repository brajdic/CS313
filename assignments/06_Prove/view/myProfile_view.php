<?php
include("header.php");
include("nav.php");
if (!isset($_SESSION['loggedIn']))
   header("Location: .");
   if(isset($_SESSION['message']))
   {
      echo '<h1 class ="message">' . $_SESSION['message'] . "</h1>";
      $_SESSION['message'] = "";
   }
   echo $_SESSION['usrId'] . "<br>";
?>
<main>
    <div><h1>Update your account info</h1></div>
    <form action="." method="post" >
    <fieldset>
        <legend>Account Information</legend>
         <label>Username:</label>
        <?php echo $_SESSION['username'];?>
        <br>
        <label>E-Mail:</label>
        <input type="text" name="email" 
               placeholder="<?php echo $_SESSION['email'];?>" value ="" required>
       <br>
        <label>New Password:</label>
        <input type="password" name="password" 
               value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <br>
        <label>Verify Password:</label>
        <input type="password" name="vPassword" 
               value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="must match new password" required>
        <br>
    </fieldset>
    <fieldset>
        <legend>Contact Information</legend>
        <label>First Name:</label>
        <input type="text" name="firstname" 
               placeholder="<?php echo $_SESSION['firstName'];?>" value="" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastname" 
               placeholder="<?php echo $_SESSION['lastName'];?>" value="" required>
        <br>
        <label>Address:</label>
        <input type="text" name="address" 
               placeholder="<?php echo $_SESSION['address'];?>" value="" required>
        <br>
        <label>City:</label>
        <input type="text" name="city" 
               placeholder="<?php echo $_SESSION['city'];?>" value="" required>
        <br>
        <label>State:</label>
        <select name ="state" required>
        <option value="<?php echo $_SESSION['state']; ?>"><?php echo $_SESSION['state'];?></option>
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
               placeholder="<?php echo $_SESSION['zip'];?>" pattern="[^a-z\x22]+" maxlength ="5" title="Insert a valid zip code" value="" required>
       <br>
        <label>Phone Number:</label>
        <input type="text" name="phonenumber" 
               placeholder="<?php echo $_SESSION['phone'];?>" pattern=".{10}" maxlength ="10" title="Please follow the format: 1112221234" value="" required>
        <br>
    </fieldset>
    <fieldset>
        <legend>Update profile</legend>
        <label>&nbsp;</label>
        <input type="submit" value="Update"><br>
        <input type="hidden" name="action" value="updateMyProfile">
    </fieldset>
    </form>
</main>
<?php include 'footer.php'; ?>        


