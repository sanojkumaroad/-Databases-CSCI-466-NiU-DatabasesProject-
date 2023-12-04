<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRAMS Shoe Order Tracking</title>
    <link rel="stylesheet" href="css/stylesOrderTracking.css">
</head>
<body>

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
            $stmt = $pdo->prepare("
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

</body>
</html>