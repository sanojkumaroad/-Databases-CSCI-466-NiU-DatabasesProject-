<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fulfillment</title>
    <link rel="stylesheet" href="css/stylesOrderFulfillment.css">
</head>
<body>

    <h2>Order Fulfillment</h2>

    <?php
        include 'connection.php';
        // $connection is available and connected to the database.
        // Perform your database operations using $connection.

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get the order ID and fulfillment details from the form
            $orderID = $_POST['order_id'];
            $trackingStatus = $_POST['tracking_status'];
            $notes = $_POST['notes'];

            // Update the Order_Tracking table with fulfillment details
            $updateStmt = $connection->prepare("
                UPDATE Order_Tracking
                SET TrackingStatus = :tracking_status, TrackingStatus = :notes, LastUpdateDate = CURRENT_TIMESTAMP
                WHERE OrderID = :order_id
            ");
            $updateStmt->bindParam(':order_id', $orderID);
            $updateStmt->bindParam(':tracking_status', $trackingStatus);
            $updateStmt->execute();

            echo "<p>Order ID " . $orderID . " has been updated.</p>";
        }

        // Fetch orders from the Order_Tracking table
        $stmt = $connection->query("
            SELECT Order_Tracking.OrderID, Orders.CustomerID, Orders.OrderDate, Orders.OrderTotal, Order_Tracking.TrackingStatus
            FROM Order_Tracking
            JOIN Orders ON Order_Tracking.OrderID = Orders.OrderID
        ");
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($orders) {
            echo "<table>";
            echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Total</th><th>Tracking Status</th><th>Action</th></tr>";

            foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>" . $order['OrderID'] . "</td>";
                echo "<td>" . $order['CustomerID'] . "</td>";
                echo "<td>" . $order['OrderDate'] . "</td>";
                echo "<td>$" . $order['OrderTotal'] . "</td>";
                echo "<td>" . $order['TrackingStatus'] . "</td>";
                echo "<td>
                        <form method='post'>
                            <input type='hidden' name='order_id' value='" . $order['OrderID'] . "'>
                            <label for='tracking_status'>Tracking Status:</label>
                            <input type='text' name='tracking_status' required>
                            <br>
                            <label for='notes'>Notes:</label>
                            <textarea name='notes'></textarea>
                            <br>
                            <button type='submit' name='submit'>Update Order</button>
                        </form>
                      </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No orders found for fulfillment.</p>";
        }
    ?>

</body>
</html>
