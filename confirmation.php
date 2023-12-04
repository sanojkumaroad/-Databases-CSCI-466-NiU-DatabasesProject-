<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Order Confirmation </title>
	<link rel="stylesheet" href="css/stylesConfirmation.css">
</head>
<body>
	<?php
		include 'connection.php';
		include 'cart_functions.php';

        	$cartItems=getCartItems();

	?>

<header>
	<div class="navbar" id="navbar">
      	    <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a>
	    <a href="shop.php">Shop</a>
	    <a href="InventoryCheck.php">Inventory</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="cart.php">Cart</a>
	</div>
</header>
<main>
	<?php
		if(isset($_POST['fname']))
		{
			$thankYou = "Thank you for your order, " . $_POST['fname'] . "!";
		}
		else
		{
			$thankYou = "Thank you for your order!";
		}

		if(isset($_POST['email']) && isset($_POST['number']) && isset($_POST['fname']) && isset($_POST['address']) && isset($_POST['lname']) && isset($_POST['city']) && isset($_POST['state']))
		{
			$email = $_POST['email'];
			$number = $_POST['number'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
		}
		else
		{
			$email = "Email: -";
                        $number = "Phone number: -";
                        $fname = "First name: - <br><br>";
                        $lname = "Last name: -";
                        $address = "Address: -";
                        $city = "City: -<br><br>";
                        $state = "State: -<br><br>";
			$zip = "Zip: -";
		}
	?>
	<h1><?php echo $thankYou; ?></h1>
	<hr>
	<h2 class="info-header">Order Confirmation</h2>
	<div class="user-info">
		<div class="info-section">
			<h3>Contact Information</h3>
			<p class="info-data"><?php echo $email;?></p>
			<p class="info-data"><?php echo $number;?></p>
		</div>
		<div class="info-section">
			<h3>Delivery Information</h3>
			<p class="info-data"><?php echo $fname;?> <?php echo $lname;?></p>
			<p class="info-data"><?php echo $address;?></p>
			<p class="info-data"><?php echo $city;?>, <?php echo $state;?> <?php echo $zip;?></p>
		</div>
		<div class="info-section">
			<h3>Order Summary</h3>
			<p class="info-data">Subtotal: <?php echo number_format(calculateSubtotal(), 2);?></p>
			<p class="info-data">Shipping: $0.00</p>
			<p class="info-data">Tax: <?php echo number_format(calculateTax(), 2); ?></p>
			<p class="info-data">Total: <?php echo number_format(calculateTotal(),2);?></p>
			<p class="info-data">Items: <?php echo count($cartItems);?></p>
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
