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
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles */
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .bag-section {
        margin: 20px auto;
        max-width: 600px; 
        border: 1px solid #ddd;
        text-align: left;
    }

    .bag-section h3 {
        margin-bottom: 10px;
    }

    .cart-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .cart-item p {
        margin: 5px 0;
    }

        .summary-section {
        margin: 20px auto;
        max-width: 600px; 
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .promo-code {
        margin-bottom: 10px;
    }

    .promo-code label,
    .promo-code input,
    .promo-code button {
        display: block;
        margin-bottom: 5px;
    }

    #order-summary-html {
        margin-top: 10px;
    }

    #order-summary-html p {
        margin: 5px 0;
    }

    a.checkout-link {
        display: block;
        margin-top: 20px;
        text-align: center;
        padding: 10px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
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
    </style>
</head>
<body>
<header>
    <div class="navbar" id="navbar">
      	    <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a
>           <a href="shop.php">Shop</a>  
	    <a href="InventoryCheck.php">Inventory</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
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
    }
</script>

</body>
</html>

