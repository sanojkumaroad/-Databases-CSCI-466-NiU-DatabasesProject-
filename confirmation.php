<?php
include 'connection.php';
include 'confirmation_functions.php';

$cartItems = getCartItems();
$subtotal = calculateSubtotal();
$total = calculateTotal();
$trackingId = generateTrackingId();

// Handle the AJAX request
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
	$completeAddress = $street . ', ' . $city . ', ' . $state . ', ' . $zip;

	/* Inserting Data into User_Customer Table */
	// Preparing Query
	$sql = "INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) 
				VALUES ('$completeAddress', 'null', '$email', '$number', '$fName', '$lName');";

	// Executes the Query and Checks for Errors
	$result = $connection->query($sql);
	if (!$result) {
		die("Error in SQL query: Inserting in User_Customer table failed");
	}

	/* Getting Customer ID */
	// Preparing Query
	$sql = "SELECT * FROM User_Customer WHERE Email = '$email'; ";
	// Executes the Query and Checks for Errors
	$result = $connection->query($sql);
	if (!$result) {
		die("Error in SQL query: Getting Customer ID failed");
	}

	$customerId = -1;
	$row = $result->fetch_assoc();
	if ($row['CustomerID'] > 0) {
		$customerId = $row['CustomerID'];
	}

	/* Getting Order Date and Time */
	// Current date and time
	$currentTime = new DateTime();
	$orderDate = $currentTime->format("M d, Y \a\t h:i A");
	$orderTotal = $total;

	/* Inserting Data into Order_Info Table */
	// Prepares the Query for Order_Info
	$sql = "INSERT INTO Order_Info(CustomerID, OrderDate, OrderTotal)
				VALUES ($customerId, '$orderDate', '$orderTotal')";

	// Executes the query and checks for errors
	$result = $connection->query($sql);
	if (!$result) {
		die("Error in SQL query: Order_Info data insertion failed");
	}

	/* Gets Order Id */
	// Prepares the Query for execution
	$sql = "SELECT * FROM Order_Info WHERE CustomerID = '$customerId' AND OrderDate = '$orderDate';";

	// Executes the query and checks for errors
	$result = $connection->query($sql);
	$orderId = -1;
	if (($row = $result->fetch_assoc()) > 0) {
		// die("Error in SQL query: " . $connection->error);
		$orderId = $row['OrderID'];
	}

	if ($orderId == -1) {
		die("Error: OrderId is not set correctly.");
	}

	// Order_Item
	//Order_Item Order_Item(OrderItemID auto, OrderID, ProductID, ItemQty, SUBTOTAL FLOAT);
	// Finsih OrderItem Later

	/* Inserting Data into Order_Tracking Table */
	$sql = "INSERT INTO Order_Tracking(TrackingID, OrderID, TrackingStatus)
				VALUES ('$trackingId', '$orderId', 'Processing');";

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
	$completeAddress = $street . ', ' . $city . ', ' . $state . ', ' . $zip;

	// Prepares the query for execution
	$sql = "INSERT INTO Customer_Billing(OrderID, CustomerID, CardName, CardNumber, CardExpiration, CVV, BillingAddress)
				VALUES ($orderId, $customerId, '$cardName', '$cardNumber', '$expDate', $securityCode, '$completeAddress');";

	// Executes the query and checks for errors
	$result = $connection->query($sql);
	if (!$result) {
		die("Error in SQL query: " . $connection->error);
	}
	// // Loads Confirmation Page after the data insertion into the database
	// header("Location: confirmation.php?id=$trackingId");
	// exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title> Order Confirmation </title>
	<link rel="stylesheet" href="css/stylesConfirmation.css">
</head>

<body>
	<header>
		<div class="navbar" id="navbar">
			<a href="mainVRAMS.php"><img src="VRAMSLogo.png" alt="VRAMS logo" width="200" height="150"></a>
			<a href="product_list.php">Shop</a>
			<a href="orderTracking.php">Track Order</a>
			<a href="AboutUs.php">About Us</a>
			<a href="Contact.php">Contact</a>
			<a href="Login.php">Login/Sign Up</a>
			<a href="Employee_Verify.php">Employee</a>
			<a href="cart.php">Cart</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
		</div>
	</header>

	<main>
		<?php
		if (isset($_POST['fname'])) {
			$thankYou = "Thank you for your order, " . $_POST['fname'] . "!";
		} else {
			$thankYou = "Thank you for your order!";
		}

		if (isset($_POST['email']) && isset($_POST['number']) && isset($_POST['fname']) && isset($_POST['address']) && isset($_POST['lname']) && isset($_POST['city']) && isset($_POST['state'])) {
			$email = $_POST['email'];
			$number = $_POST['number'];
			$fName = $_POST['fname'];
			$lName = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
		} else {
			$email = "Email: -";
			$number = "Phone number: -";
			$fName = "First name: - <br><br>";
			$lName = "Last name: -";
			$address = "Address: -";
			$city = "City: -<br><br>";
			$state = "State: -<br><br>";
			$zip = "Zip: -";
		}
		?>
		<h1>
			<?php echo $thankYou; ?>
		</h1>
		<hr>
		<h2 class="info-header">Order Confirmation</h2>
		<div class="order-tracking-section">
			<p class="info-data-tracking">Order Tracking ID:
				<?php echo $trackingId; ?>
			</p>

			<!-- Copy button -->
			<button onclick="copyToClipboard('<?php echo $trackingId; ?>')">Copy</button>
		</div>

		<!-- Add a reminder line -->
		<p>Please don't forget to copy the above ID number!</p>

		<!-- function to copy to clipboard -->
		<script>
			function copyToClipboard(text) {
				var input = document.createElement('textarea');
				input.value = text;
				document.body.appendChild(input);
				input.select();
				document.execCommand('copy');
				document.body.removeChild(input);

				// Provide a visual indication
				alert('Order Tracking ID copied to clipboard: ' + text);
			}
		</script>
		<div class="user-info">
			<div class="info-section">
				<h3>Contact Information</h3>
				<p class="info-data">
					<?php echo $email; ?>
				</p>
				<p class="info-data">
					<?php echo $number; ?>
				</p>
			</div>
			<div class="info-section">
				<h3>Delivery Information</h3>
				<p class="info-data">
					<?php echo $fName; ?>
					<?php echo $lName; ?>
				</p>
				<p class="info-data">
					<?php echo $completeAddress; ?>
				</p>
				<p class="info-data">
					<?php echo $city; ?>,
					<?php echo $state; ?>
					<?php echo $zip; ?>
				</p>
			</div>
			<div class="info-section">
				<h3>Order Summary</h3>
				<!-- Order Summary without item details -->
				<p class="info-data">Subtotal: $
					<?php echo number_format(calculateSubtotal(), 2); ?>
				</p>
				<p class="info-data">Shipping: $0.00</p>
				<p class="info-data">Tax: $
					<?php echo number_format(calculateTax(), 2); ?>
				</p>
				<p class="info-data">Total: $
					<?php echo number_format(calculateTotal(), 2); ?>
				</p>


				<!-- link to orderTracking.php -->
				<p class="info-data"><a href="orderTracking.php">Track Your Order</a></p>

			</div>
		</div>
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
