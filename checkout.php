<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Checkout Page</title>
	<link rel="stylesheet" href="css/stylesCheckout.css">
</head>

<body>
	<header>
		<div class="navbar" id="navbar">
			<a href="mainVRAMS.php"><img src="VRAMS Logo.png" alt="VRAMS logo" width="200" height="150"></a>
			<a href="shop.php">Shop</a>
			<a href="InventoryCheck.php">Inventory</a>
			<a href="AboutUs.php">About Us</a>
			<a href="Contact.php">Contact</a>
			<a href="Login.php">Login/Sign Up</a>
			<a href="cart.php">Cart</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
		</div>
	</header>

	<main>

		<?php
		include 'connection.php';
		// $connection is available and connected to the database.
		// Perform your database operations using $connection.

		include 'cart_functions.php';
		$cartItems = getCartItems();

		// Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get user input values
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $number = isset($_POST['number']) ? $_POST['number'] : '';
			$fName = isset($_POST['fname']) ? $_POST['fname'] : '';
			$lName = isset($_POST['lname']) ? $_POST['lname'] : '';
			
			$street = isset($_POST['address']) ? $_POST['address'] : '';
			$city = isset($_POST['city']) ? $_POST['city'] : '';
			$state = isset($_POST['state']) ? $_POST['state'] : '';
			$zip = isset($_POST['zip']) ? $_POST['zip'] : '';
			$completeAddress = $street .', '. $city .', '. $state .', '. $zip;

			/* Inserting Data into User_Customer Table */

			// Preparing Query
            $sql = "INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) 
					VALUES ('$completeAddress', 'null', '$email', '$number', '$fName', '$lName');";
			
			// Executes the Query and Checks for Errors
            $result = $connection->query($sql);
			if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			/* Getting Customer ID */

			// Preparing Query
			$sql = "SELECT * FROM User_Customer WHERE Email = '$email' ";
			// Executes the Query and Checks for Errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			$customerId = -1;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$customerId = $row['CustomerID'];
			}

			if ($customerId == -1) {
				die("Error: customerId is not set correctly.");
			}

			/* Getting Order Date and Time */
			
			// Current date and time
			$currentTime = new DateTime();

			// Formats the order Date and Time
			$orderDate = $currentTime->format("M d, Y \a\t h:i A");
			
			/* Gets Order Total */
			// Order Total
			$orderTotal = calculateTotal();

			/* Inserting Data into Order_Info Table */
			// Prepares the Query for Order_Info
			$sql = "INSERT INTO Order_Info(CustomerID, OrderDate, OrderTotal)
					VALUES ($customerId, '$orderDate', $orderTotal);";
			
			// Executes the query and checks for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			/* Gets Order Id */
			// Prepares the Query for execution
			$sql = "SELECT * FROM Order_Info WHERE CustomerID = '$customerId' AND OrderDate = '$orderDate';";
			
			// Executes the query and checks for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			$orderId = -1;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$orderId = $row['OrderID'];
			}

			if ($orderId == -1) {
				die("Error: OrderId is not set correctly.");
			}

			// Order_Item
			//Order_Item Order_Item(OrderItemID auto, OrderID, ProductID, ItemQty, SUBTOTAL FLOAT);
			// Finsih OrderItem Later

			/* Inserting Data into Order_Tracking Table */
			// Creates a Tracking Id based on the OrderId
			$tracking = "Sp00".$orderId;

			// Prepares query for execution
			$sql = "INSERT INTO Order_Tracking(TrackingID, OrderID, TrackingStatus)
					VALUES ('$tracking', $orderId, 'Not Shipped');";
			
			// Executes the query and checks for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			
			/* Inserting Data into Customer_Billing Table */

			// Gets the Billing Details from the user input
			$cardName = isset($_POST['cardname']) ? $_POST['cardname'] : '';
			$cardNumber = isset($_POST['cardnumber']) ? $_POST['cardnumber'] : '';
			$expDate = isset($_POST['expdate']) ? $_POST['expdate'] : '';
			$securityCode = isset($_POST['code']) ? $_POST['code'] : '';

			// Gets Billing Address
			$street = isset($_POST['billingAddress']) ? $_POST['billingAddress'] : '';
			$city = isset($_POST['billingCity']) ? $_POST['billingCity'] : '';
			$state = isset($_POST['billingState']) ? $_POST['billingState'] : '';
			$zip = isset($_POST['billingZip']) ? $_POST['billingZip'] : '';
			$completeAddress = $street .', '. $city .', '. $state .', '. $zip;

			// Prepares the query for execution
			$sql = "INSERT INTO Customer_Billing(OrderID, CustomerID, CardName, CardNumber, CardExpiration, CVV, BillingAddress)
					VALUES ($orderId, $customerId, '$cardName', '$cardNumber', '$expDate', '$securityCode', '$completeAddress');";

            // Executes the query and checks for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

			// Close the database connection
			$connection->close();

			// Loads Confirmation Page after the data insertion into the database
			header("Location: confirmation.php");
            exit();
        }
		?> 

		<h1>Checkout (
			<?php echo count($cartItems); ?> items)
		</h1>
		<hr>
		<form method="post" action="confirmation.php">
			<h3>Contact Information</h3>
			<input type="email" placeholder="Email Address" size="25" name="email" required /> <br>
			<input type="tel" placeholder="Phone Number (123-456-7890)" size="25" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
				name="number" required /><br>

			<h3>Delivery Information</h3>
			<input type="text" placeholder="First Name" name="fname" required />
			<input type="text" placeholder="Last Name" name="lname" required /><br>
			<input type="text" placeholder="Shipping Address" size="46" name="address" required /><br>
			<input type="text" placeholder="City" size="12" name="city" required />
			<input type="text" placeholder="State" size="12" name="state" required />
			<input type="numeric" placeholder="Zip Code" size="10" name="zip" maxlength="5" required /><br>

			<h3>Payment Information</h3>
			<input type="numeric" placeholder="Card Number" size="30" name="cardnumber" maxlength="19" required /><br>
			<input type="text" placeholder="Exp. Date (MM/YY)" size="13" pattern="[0-9]{2}/[0-9]{2}" name="expdate"
				maxlength="5" required />
			<input type="numeric" placeholder="Security Code" size="11" name="code" maxlength="4" required /><br>
			<input type="text" placeholder="Name on card" size="30" name="cardname" required />

			<h3>Billing Address</h3>
			<input type="text" placeholder="First Name" name="billingFName" required />
			<input type="text" placeholder="Last Name" name="billingLname" required /><br>
			<input type="text" placeholder="Shipping Address" size="46" name="billingAddress" required /><br>
			<input type="text" placeholder="City" size="12" name="billingCity" required />
			<input type="text" placeholder="State" size="12" name="billingState" required />
			<input type="numeric" placeholder="Zip Code" size="10" name="billingZip" maxlength="5" required /><br>

			<h3>Order Summary</h3>
			<p id="subtotal">Subtotal: $
				<?php echo number_format(calculateSubtotal(), 2); ?>
			</p>
			<p id="discount"></p>
			<p id="shipping">Shipping & Handling: $0.00</p>
			<p id="total">Total: $
				<?php echo number_format(calculateTotal(), 2); ?>
			</p>

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
