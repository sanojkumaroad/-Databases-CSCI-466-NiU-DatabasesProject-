<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRAMS Shoe Order Tracking</title>
    <link rel="stylesheet" href="stylesOrderTracking.css">
</head>
<body>

   <header>
        <div class="navbar" id="navbar">
            <a href="mainVRAMS.php"><img src="VRAMSLogo.png" alt="VRAMS logo" width="200" height="150"></a>
            <a href="shop.php">Shop</a>
            <a href="orderTracking.php">Track Order</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login/Sign Up</a>
            <a href="InventoryCheck.php">Employee</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
        </div>
    </header>

    <h2>Order Tracking for Customer</h2>

    <?php
        include 'connection.php';
        // $connection is available and connected to the database.
        // Perform your database operations using $connection.

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get the tracking ID from the form
            $trackingID = $_POST['tracking_id'];

            // Prepare and execute the SQL query
            $stmt = $connection->prepare("
                SELECT Order_Tracking.TrackingID, Order_Tracking.TrackingStatus, Orders.OrderID, Orders.OrderDate, Orders.OrderTotal, Orders.OrderStatus
                FROM Order_Tracking
                JOIN Orders ON Order_Tracking.OrderID = Orders.OrderID
                WHERE Order_Tracking.TrackingID = :tracking_id
            ");
            $stmt->bindParam(':tracking_id', $trackingID);
            $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the tracking ID is found
            if ($result) {
                echo "<p>Order Status: " . $result['OrderStatus'] . "</p>";
                echo "<p>Tracking Status: " . $result['TrackingStatus'] . "</p>";
                echo "<p>Order Date: " . $result['OrderDate'] . "</p>";
                echo "<p>Order Total: $" . $result['OrderTotal'] . "</p>";
            } else {
                echo "<p>Invalid tracking ID. Please check your tracking ID and try again.</p>";
            }
        }
    ?>

    <!-- Tracking ID input form -->
    <form method="post">
        <label for="tracking_id">Enter Tracking ID:</label>
        <input type="text" name="tracking_id" required>
        <br>
        <button type="submit" name="submit">Track Order</button>
    </form>

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
