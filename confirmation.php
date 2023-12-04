<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Order Confirmation </title>
	<style>
		body {
            		font-family: Arial, sans-serif;
            		margin: 0;
            		padding: 0;
            		background-color: #f4f4f4;
        	}

		header {
         	        background-color: #333;
            		color: #fff;
            		text-align: center;
            		padding: 1em 0;
        	}

		header a {
            		color: #fff;
            		text-decoration: none;
            		margin: 0 15px;
        	}

		.navbar {
          		background-color: #333;
            		overflow: hidden;
        	}

        	.navbar a {
            		float: left;
            		display: block;
            		color: white;
            		text-align: center;
            		padding: 14px 16px;
            		text-decoration: none;
        	}

        	.navbar a:hover {
            		background-color: #ddd;
            		color: black;
        	}

        	.navbar .icon {
        	       display: none;
        	}

		@media screen and (max-width: 600px) {
            		.navbar a:not(:first-child) {display: none;}
            		.navbar a.icon {
                	float: right;
                	display: block;
            		}
        	}

        	@media screen and (max-width: 600px) {
            		.navbar.responsive {position: relative;}
            		.navbar.responsive .icon {
                	position: absolute;
                	right: 0;
                	top: 0;
            		}
            		.navbar.responsive a {
                		float: none;
                		display: block;
                		text-align: left;
            		}
        	}

        	main {
            		justify-content: space-around;
			margin: 30px;
			border: 1px solid #ddd;
			text-align:center;
			background-color:white;
			border-radius: 8px;
			padding: 30px;
        	}

		.user-info {
			justify-content:space-around;
			display:flex;
			flex-wrap:wrap;
		}

		.contact-us {
            		background-color: #333;
            		border: 1px solid #fff;
            		color: #fff;
            		padding: 20px;
            		margin: 10px;
            		text-align: center;
        	}

        	footer {
            		background-color: #333;
            		color: #fff;
            		text-align: center;
            		padding: 1em 0;
        	}

        	footer a {
        		color: #fff;
            		text-decoration: none;
            		margin: 0 15px;
        	}

		h1 {
			text-align:center;
			font-size: 40px;
		}

		h3 {
			text-align:center;
			color:#333;
		}

		.info-header {
			text-align:center;
			font-size:35px;
			color:#333;
		}

		hr {
			border-radius:5px;
			margin: 25px;
		}

		.info-section {
			border: 1px solid #ddd;
			padding: 10px;
			margin: 15px;
			border-radius:5px;
			width:25%
		}

	</style>
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
			<p><?php echo $email;?></p>
			<p><?php echo $number;?></p>
		</div>
		<div class="info-section">
			<h3>Delivery Information</h3>
			<p><?php echo $fname;?> <?php echo $lname;?></p>
			<p><?php echo $address;?></p>
			<p><?php echo $city;?>, <?php echo $state;?> <?php echo $zip;?></p>
		</div>
		<div class="info-section">
			<h3>Order Summary</h3>
			<p>Subtotal: <?php echo number_format(calculateSubtotal(), 2);?></p>
			<p>Shipping: $0.00</p>
			<p>Tax: <?php echo number_format(calculateTax(), 2); ?></p>
			<p>Total: <?php echo number_format(calculateTotal(),2);?></p>
			<p>Items: <?php echo count($cartItems);?></p>
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
