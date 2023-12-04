<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outstanding Orders</title>
    <link rel="stylesheet" href="css/stylesOutstandingOrders.css">
</head>
<body>

    <h2>Outstanding Orders</h2>

    <?php
        include 'connection.php';
        // $connection is available and connected to the database.
        // Perform your database operations using $connection.

        // Fetch outstanding orders from the Order table
        $stmt = $pdo->query("SELECT * FROM Orders WHERE OrderStatus = 'Not Shipped'");
        $outstandingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($outstandingOrders) {
            echo "<table>";
            echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Total</th></tr>";

            foreach ($outstandingOrders as $order) {
                echo "<tr>";
                echo "<td>" . $order['OrderID'] . "</td>";
                echo "<td>" . $order['CustomerID'] . "</td>";
                echo "<td>" . $order['OrderDate'] . "</td>";
                echo "<td>$" . $order['OrderTotal'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No outstanding orders found.</p>";
        }
    ?>

</body>
</html>
