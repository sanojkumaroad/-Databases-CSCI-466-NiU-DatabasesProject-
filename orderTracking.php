<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRAMS Shoe Order Tracking</title>
    <link rel="stylesheet" href="css/stylesOrderTracking.css">
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
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve the tracking ID from the form
        $trackingID = $_POST['tracking_id'];

        // Database connection (assuming you have a connection.php file)
        include 'db.php';

        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("
            SELECT *
            FROM Order_Tracking
            JOIN Order_Info ON Order_Tracking.OrderID = Order_Info.OrderID
            WHERE Order_Tracking.TrackingID = :tracking_id
        ");
        $stmt->bindParam(':tracking_id', $trackingID);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the tracking ID is found
        if($result) {
            echo "<b><p style ='color: red'>Tracking Number: ".$result['TrackingID']."</p></b>";
            echo "<b><p style ='color: red'>Order Status: ".$result['TrackingStatus']."</p></b>";
            echo "<b><p style ='color: red'>Order ID: ".$result['OrderID']."</p></b>";
            echo "<b><p style ='color: red'>Order Total: $".$result['OrderTotal']."</p></b>";
            echo "<b><p style ='color: red'>Order Date: ".$result['OrderDate']."</p></b>";

        } else {
            echo "<p>Invalid tracking ID. Please check your tracking ID and try again.</p>";
        }

        // Close the database connection
        $pdo = null;
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
