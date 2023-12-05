<!-- cart.php -->

<?php
session_start();

// Include database connection
include 'db.php';    // remove this and include your database connection

// Include cart functions
include 'cart_functions.php';

// Handle remove item logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_item'])) {
        $remove_id = $_POST['remove_id'];
        removeItem($remove_id);
    }
}

// Fetch Cart Items
$cartItems = getCartItems();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart. VRAMS Shoe Store.</title>
    <link rel="stylesheet" href="stylesCart.css">
</head>
<body>
<header>
    <div class="navbar" id="navbar">
      	    <a href="mainVRAMS.php"><img src = "VRAMSLogo.png" alt = "VRAMS logo" width = "200" height = "150"></a
>           <a href="shop.php">Shop</a>  
	    <a href="InventoryCheck.php">Employee</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login/Sign Up</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
    </div>
</header>

<main>

    <!-- Bag Section -->
    <div class="bag-section">
        <h3>Bag: <?php echo count($cartItems); ?> items</h3>

        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <p><?php echo $item['name']; ?></p>
                <p>Price: $<?php echo $item['price']; ?></p>
                <p>Quantity: <?php echo $item['quantity']; ?></p>
                <form method="post">
                    <input type="hidden" name="remove_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" name="remove_item">Remove Item</button>
                </form>
            </div>
        <?php endforeach; ?>

    </div>

    <!-- Summary Section -->
    <div class="summary-section">
        <h3>Summary</h3>

        <!-- Promo Code -->
        <div class="promo-code">
            <label for="promo_code">Promo Code:</label>
            <input type="text" id="promo_code" name="promo_code">
            <button onclick="applyPromoCode()">Apply</button>
        </div>

        <!-- Subtotal, Shipping, Tax, and Total -->
        <div id="order-summary-html">
            <p>Subtotal: $<?php echo number_format(calculateSubtotal(), 2); ?></p>
            <p>Estimated Shipping & Handling: $0.00</p>
            <p>Estimated Tax: $<?php echo number_format(calculateTax(), 2); ?></p>
            <p>Total: $<?php echo number_format(calculateTotal(), 2); ?></p>
        </div>

        <!-- Checkout Link -->
        <a href="checkout.php">Proceed to Checkout</a>

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

<script>
    function applyPromoCode() {
        // apply promo code
        if(document.getElementById('promo_code').value.length == 0)
        {
              alert("Please enter a promo code.");
        }
    }
</script>

</body>
</html>

