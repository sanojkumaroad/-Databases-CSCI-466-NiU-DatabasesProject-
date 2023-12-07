<?php
session_start(); // Add this line

// Include database connection
include 'db.php';

// Function to get product details by ID from the database
function getProductById($product_id) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM Products WHERE ProductID = ?");
    $query->execute([$product_id]);

    return $query->fetch(PDO::FETCH_ASSOC);
}

// Function to add a product to the cart
function addToCart($productId) {
    global $connection; // Add this line to access the global connection variable

    // Assume you have a session variable for the current order ID
    $orderId = $_SESSION['current_order_id']; // Make sure you set this value when creating a new order

    // Check if the product is already in the cart
    $queryCheck = "SELECT * FROM Order_Item WHERE OrderID = $orderId AND ProductID = $productId";
    $resultCheck = mysqli_query($connection, $queryCheck);

    if(mysqli_num_rows($resultCheck) > 0) {
        // If the product is already in the cart, update the quantity
        $queryUpdate = "UPDATE Order_Item SET ItemQty = ItemQty + 1 WHERE OrderID = $orderId AND ProductID = $productId";
        mysqli_query($connection, $queryUpdate);
    } else {
        // If the product is not in the cart, insert a new record
        $queryInsert = "INSERT INTO Order_Item (OrderID, ProductID, ItemQty, SUBTOTAL) VALUES ($orderId, $productId, 1, 0.0)";
        mysqli_query($connection, $queryInsert);
    }

    // Assuming you have a getProductById function to fetch product details
    $product = getProductById($productId);

    if($product) {
        // Check if the product is already in the cart
        if(isset($_SESSION['cart'][$productId])) {
            // Increment the quantity if the product is already in the cart
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            // Add the product to the cart if it's not already in the cart
            $_SESSION['cart'][$productId] = [
                'id' => $productId,
                'name' => $product['ProductName'],
                'price' => $product['ProductPrice'],
                'quantity' => 1,
            ];
        }
    }
}

// Function to remove a product from the cart
function removeItem($remove_id) {
    // Check if the product is in the cart
    if(isset($_SESSION['cart'][$remove_id])) {
        // Decrement the quantity
        $_SESSION['cart'][$remove_id]['quantity']--;

        // Remove the product if the quantity becomes 0
        if($_SESSION['cart'][$remove_id]['quantity'] == 0) {
            unset($_SESSION['cart'][$remove_id]);
        }
    }
}

// Function to get cart items
function getCartItems() {
    if(isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    } else {
        return [];
    }
}

// Function to calculate the subtotal of items in the cart
function calculateSubtotal() {
    $subtotal = 0;

    // Check if the cart is set and not empty
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
    }

    return $subtotal;
}

// Function to calculate the total with tax and shipping
function calculateTotal() {
    $subtotal = calculateSubtotal();
    $taxRate = 0.0495; // 4.95%
    $estimatedShipping = 0.00; // Assume free shipping for simplicity

    $total = $subtotal + ($subtotal * $taxRate) + $estimatedShipping;

    return $total;
}

// Function to calculate the tax based on the subtotal
function calculateTax() {
    $taxRate = 0.0495; // 4.95%

    // Calculate tax based on the subtotal
    $tax = calculateSubtotal() * $taxRate;

    return $tax;
}
?>
