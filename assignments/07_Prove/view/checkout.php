<?php
   session_start();
   //$_SESSION['lastPage'] = $action;
   include 'header.php';
   include 'nav.php'; 
    if(isset($_SESSION['message']))
   {
      echo '<h1 class ="message">' . $_SESSION['message'] . "</h1>";
      $_SESSION['message'] = "";
   } 
?>
<main>
    <div><h1>Checkout</h1></div>
    <form action="." method="post" >
    <fieldset>
        <legend>Billing Information</legend>
        <label>Name on card:</label>
        <input type="text" name="firstname" 
               value="<?php echo $_SESSION['username'];?>" required>
        <br>
        <label>Street address:</label>
        <input type="text" name="address" 
               value="<?php echo $_SESSION['address'];?>" required>
        <br>
        <label>City:</label>
        <input type="text" name="city" 
               value="<?php echo $_SESSION['city'];?>" required>
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
               value="<?php echo($_SESSION['zip']); ?>" pattern="[^a-z\x22]+" maxlength ="5" title="Insert a valid zip code" placeholder="12345">
       <br>
    </fieldset>
    <fieldset>
        <legend>Finish Payment</legend>
        <label>&nbsp;</label>
        <input type="submit" value="Purchase">
		<input type="hidden" name="action" value="confirm">
		<button type="cancel" onclick="window.location='./?action=viewCart';return false;">Back to cart</button>
    </fieldset>
    </form>
</main>
<?php include 'footer.php'; ?>        
