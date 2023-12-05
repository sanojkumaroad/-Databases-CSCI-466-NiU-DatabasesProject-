<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Checkout Page</title>
        <link rel="stylesheet" href="stylesCheckout.css">
	</head>

	<body>
		<?php
			include 'connection.php';
            // $connection is available and connected to the database.
            // Perform your database operations using $connection.

			include 'cart_functions.php';

			$cartItems=getCartItems();
		?>

        <header>
            <div class="navbar" id="navbar">
                <a href="mainVRAMS.php"><img src = "VRAMSLogo.png" alt = "VRAMS logo" width = "200" height = "150"></a>
                <a href="shop.php">Shop</a>  
                <a href="InventoryCheck.php">Employee</a>
                <a href="AboutUs.php">About Us</a>
                <a href="Contact.php">Contact</a>
                <a href="Login.php">Login/Sign Up</a>
                <a href="cart.php">Cart</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
            </div>
        </header>

		<main>
			<h1>Checkout (<?php echo count($cartItems);?> items)</h1>
			<hr>
			<form method="post" action="confirmation.php">
				<h3>Contact Information</h3>
				<input type="email" placeholder="Email Address" size="25" name="email" required/> <br>
				<input type="tel" placeholder="Phone Number (123-456-7890)" size="25" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="number" required/><br>

				<h3>Delivery Information</h3>
				<input type="text" placeholder="First Name" name="fname" required/>
				<input type="text" placeholder="Last Name" name="lname" required/><br>
				<input type="text" placeholder="Shipping Address" size="46" name="address" required/><br>
				<input type="text" placeholder="City" size="12" name="city" required/>
				<input type="text" placeholder="State" size="12"name="state" required/>
				<input type="numeric" placeholder="Zip Code" size="10" name="zip" maxlength="5" required/><br>

				<h3>Payment Information</h3>
				<input type="numeric" placeholder="Card Number" size="30" name="cardnumber" maxlength="19" required/><br>
				<input type="text" placeholder="Exp. Date (MM/YY)" size="13" pattern = "[0-9]{2}/[0-9]{2}" name="expdate" maxlength="5" required/>
				<input type="numeric" placeholder="Security Code" size="11" name="code" maxlength="4" required/><br>
				<input type="text" placeholder="Name on card" size="30" name="cardname" required/>

				<h3>Billing Address</h3>
				<input type="text" placeholder="First Name" name="billingFName" required/>
               			<input type="text" placeholder="Last Name" name="billingLname" required/><br>
                		<input type="text" placeholder="Shipping Address" size="46" name="billingAddress" required/><br>
                		<input type="text" placeholder="City" size="12" name="billingCity" required/>
                		<input type="text" placeholder="State" size="12"name="billingState" required/>
                		<input type="numeric" placeholder="Zip Code" size="10" name="billingZip" maxlength="5" required/><br>

				<h3>Order Summary</h3>
				<p id="subtotal">Subtotal: $<?php echo number_format(calculateSubtotal(),2);?></p>
				<p id="discount"></p>
				<p id="shipping">Shipping & Handling: $0.00</p>
				<p id="total">Total: $<?php echo number_format(calculateTotal(),2); ?></p>

				<input type="submit" name="submit" value="Place Order" style="width:200px"><br>
			</form>
		</main>

		<footer>
			<div class="contact-us">
        			<h2>Contact Us</h2>
        			<p>Email: info@vramsshoestore.com</p>
        			<p>Phone: (555) 123-4567</p>
    			</div>
    			<p>All rights reserved. © 2023 VRAMS Shoe Store</p>
		</footer>
	</body>
</html>
