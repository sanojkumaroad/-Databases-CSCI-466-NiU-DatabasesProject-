<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Checkout Page</title>
	<link rel="stylesheet" href="css/stylesCheckout.css">
</head>

<body>
	<?php
	include 'connection.php';
	include 'checkout_functions.php';

	$cartItems = getCartItems();
	$subtotal = calculateSubtotal();
	$total = calculateTotal();

	// Handle the AJAX request
	// Check if the form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Get user input values
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$number = isset($_POST['number']) ? $_POST['number'] : '';
		$fName = isset($_POST['fname']) ? $_POST['fname'] : '';
		$lName = isset($_POST['lname']) ? $_POST['lname'] : '';

		$street = isset($_POST['address']) ? $_POST['address'] : '';
		$city = isset($_POST['city']) ? $_POST['city'] : '';
		$state = isset($_POST['state']) ? $_POST['state'] : '';
		$zip = isset($_POST['zip']) ? $_POST['zip'] : '';
		$completeAddress = $street.', '.$city.', '.$state.', '.$zip;

		/* Inserting Data into User_Customer Table */
		// Preparing Query
		$sql = "INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) 
				VALUES ('$completeAddress', 'null', '$email', '$number', '$fName', '$lName');";

		// Executes the Query and Checks for Errors
		$result = $connection->query($sql);
		if(!$result) {
			die("Error in SQL query: Inserting in User_Customer table failed");
		}

		/* Getting Customer ID */
		// Preparing Query
		$sql = "SELECT * FROM User_Customer WHERE Email = '$email' ";
		// Executes the Query and Checks for Errors
		$result = $connection->query($sql);
		if(!$result) {
			die("Error in SQL query: Getting Customer ID failed");
		}

		$customerId = -1;
		$row = $result->fetch_assoc();
		if($row["CustomerID"] > 0) {
			$customerId = $row['CustomerID'];
		}

		// $customerId = -1;
		// if ($result->num_rows > 0) {
		// 	$row = $result->fetch_assoc();
		// 	$customerId = $row['CustomerID'];
		// }
	
		/* Getting Order Date and Time */

		// Current date and time
		$currentTime = new DateTime();
		$orderDate = $currentTime->format("M d, Y \a\t h:i A");
		$orderTotal = $total;

		/* Inserting Data into Order_Info Table */
		// Prepares the Query for Order_Info
		$sql = "INSERT INTO Order_Info(CustomerID, OrderDate, OrderTotal)
				VALUES ($customerId, '$orderDate', $orderTotal);";

		// Executes the query and checks for errors
		$result = $connection->query($sql);
		if(!$result) {
			die("Error in SQL query: Order_Info data insertion failed");
		}

		/* Gets Order Id */
		// Prepares the Query for execution
		$sql = "SELECT * FROM Order_Info WHERE CustomerID = '$customerId' AND OrderDate = '$orderDate';";

		// Executes the query and checks for errors
		$result = $connection->query($sql);
		$orderId = -1;
		if(($row = $result->fetch_assoc()) > 0) {
			// die("Error in SQL query: " . $connection->error);
			$orderId = $row['OrderID'];
		}

		// $orderId = -1;
		// if ($result->num_rows > 0) {
		// 	$row = $result->fetch_assoc();
		// 	$orderId = $row['OrderID'];
		// }
	
		if($orderId == -1) {
			die("Error: OrderId is not set correctly.");
		}

		// Order_Item
		//Order_Item Order_Item(OrderItemID auto, OrderID, ProductID, ItemQty, SUBTOTAL FLOAT);
		// Finsih OrderItem Later
	
		/* Inserting Data into Order_Tracking Table */
		// Generate a unique tracking ID
		$trackingId = generateTrackingId();

		// Prepares query for execution
		$sql = "INSERT INTO Order_Tracking(TrackingID, OrderID, TrackingStatus)
				VALUES ('$trackingId', $orderId, 'Processing');";

		// Executes the query and checks for errors
		$result = $connection->query($sql);
		if(!$result) {
			die("Error in SQL query: ".$connection->error);
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
		$completeAddress = $street.', '.$city.', '.$state.', '.$zip;

		// Prepares the query for execution
		$sql = "INSERT INTO Customer_Billing(OrderID, CustomerID, CardName, CardNumber, CardExpiration, CVV, BillingAddress)
				VALUES ($orderId, $customerId, '$cardName', '$cardNumber', '$expDate', '$securityCode', '$completeAddress');";

		// Executes the query and checks for errors
		$result = $connection->query($sql);
		if(!$result) {
			die("Error in SQL query: ".$connection->error);
		}

		// Loads Confirmation Page after the data insertion into the database
		header("Location: confirmation.php?id=$trackingId");
		exit();
	}
	?>
	<header>
		<div class="navbar" id="navbar">
			<a href="mainVRAMS.php"><img src="VRAMSLogo.png" alt="VRAMS logo" width="200" height="150"></a>
			<a href="product_list.php">Shop</a>
			<a href="orderTracking.php">Track Order</a>
			<a href="AboutUs.php">About Us</a>
			<a href="Contact.php">Contact</a>
			<a href="Login.php">Login/Sign Up</a>
			<a href="InventoryCheck.php">Employee</a>
			<a href="cart.php">Cart</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
		</div>
	</header>
	<main>
		<h1>Checkout (
			<?php echo count($cartItems); ?> items)
		</h1>
		<hr>
		<?php echo '<form method="post" action="confirmation.php?id=' . $trackingId . '">'; ?>
		<!-- <form method='post' action='confirmation.php?id=$trackingId'> -->

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

			<!-- Summary Section -->
			<div class="summary-section">
				<!-- Subtotal, Shipping, Tax, and Total -->
				<div id="order-summary-html">
					<p>Subtotal: $
						<?php echo number_format($subtotal, 2); ?>
					</p>
					<p>Estimated Shipping & Handling: $0.00</p>
					<p>Estimated Tax: $
						<?php echo number_format(calculateTax(), 2); ?>
					</p>
					<p>Total: $
						<?php echo number_format($total, 2); ?>
					</p>
				</div>

				<!-- Checkout Link -->
				<input type="submit" name="submit" value="Place Order" style="width:200px"><br>
			</div>

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
