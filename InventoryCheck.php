<!-- VRAMS Inventory Check for Employee -->

<?php
include 'connection.php';

// Fetch products with error handling
$queryP = mysqli_query($connection, "SELECT ProductID, ProductName, ProductPrice FROM Products");
if(!$queryP) {
    die("Error in query: ".mysqli_error($connection));
}

// Fetch product IDs with error handling
$queryID = mysqli_query($connection, "SELECT ProductID FROM Products");
if(!$queryID) {
    die("Error in query: ".mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | VRAMS Shoe Store</title>
    <link rel="stylesheet" href="css/stylesInventoryCheck.css">
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
    <!--    Setting left to show list of all products      -->
    <div>
        <h1> Full Product List </h1>
        <table border="2" style="background-color: white;">
            <tr>
                <th> Product ID <br> Number </th>
                <th> Name </th>
            </tr>

            <?php while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td>
                        <?php echo $row['ProductID']; ?>
                    </td>
                    <td>
                        <?php echo $row['ProductName']; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Setting right to inventory management where employee can run queries -->
    <div class="split right">
        <h1> Inventory Management </h1>

        <!-- Form to see what is in or out of stock if ran -->
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="check_inventory"> Select to see inventory in/out of stock list: </label>
            <select name="check_inventory">
                <option value="NULL"> --Select Option--- </option>
                <option value="!="> In Stock </option>
                <option value="="> Out of Stock </option>
            </select>
            <input type="submit" value="SUBMIT" name="inventorysubmit">
        </form>

        <?php
        // PHP code to run if the above form is submitted
        if(isset($_GET["inventorysubmit"]) && $_GET["check_inventory"] != "NULL") {
            $comparison = $_GET["check_inventory"];
            $queryINV = mysqli_query($connection, "SELECT ProductID, ProductName, Qty FROM Products WHERE Qty $comparison 0");
            if(!$queryINV) {
                die("Error in query INV: ".mysqli_error($connection));
            }
            ?>

            <table border="2" style="background-color: white;">
                <tr>
                    <th> Product ID </th>
                    <th> Name </th>
                    <th> Quantity </th>
                </tr>

                <?php while($row = mysqli_fetch_array($queryINV, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['ProductID']; ?>
                        </td>
                        <td>
                            <?php echo $row['ProductName']; ?>
                        </td>
                        <td>
                            <?php echo $row['Qty']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>

        <!-- Form to add to inventory -->
        <h4> Add to quantity of inventory </h4>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="add_inventory"> What style would you like to add to? (Must enter ID #) : </label>
            <input type="text" name="add_inventory" value="" /><br>
            <label for="add">How many to add: </label>
            <input type="number" name="add" value="" min="1" required />
            <input type="submit" value="SUBMIT" name="addsubmit">
        </form>

        <!--  PHP Code to add more to quantity of product selected -->
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addsubmit"])) {
            $prod = $_POST['add_inventory'];
            $addto = $_POST['add'];

            $queryADD = mysqli_query($connection, "UPDATE Products SET Qty = Qty + '$addto' WHERE ProductID = '$prod'");
            $queryDisplayADD = mysqli_query($connection, "SELECT ProductID, ProductName, Qty from Products");
            ?>

            <h4> Product info after adding more to quantity </h4>
            <table border="2">
                <tr>
                    <th> Product <br> ID </th>
                    <th> Quantity </th>
                    <th> Name </th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($queryDisplayADD, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['ProductID']; ?>
                        </td>
                        <td>
                            <?php echo $row['ProductName']; ?>
                        </td>
                        <td>
                            <?php echo $row['Qty']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        }
        ?>

        <!-- Table that links each product to its product details page -->
        <h4> Click link to view product details </h4>
          <table border="1">
                <tr>
                    <th> Product ID <br> Number </th>
                    <th> Name </th>
                    <th> Select </th>
                </tr>
                <?php
                // function to fetch product details from the database
                $queryP = mysqli_query($connection, "SELECT ProductID, ProductName, ProductPrice FROM Products");

                while ($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td> <?php echo $row['ProductID']; ?> </td>
                        <td> <?php echo $row['ProductName']; ?> </td>
                        <td class="product-container">
                            <?php
                            // links for products
                            $productLinks = [
                                "sneakers.php",
                                "running.php",
                                "loafers.php",
                                "hiking.php",
                                "basketball.php",
                                "yoga.php",
                                "urbanboots.php",
                                "techrunner.php",
                                "balletflats.php",
                                "soccerpro.php",
                                "slipons.php",
                                "snowboots.php",
                                "fashionheels.php",
                                "summersandals.php",
                                "crossfit.php",
                                "canvasslipons.php",
                                "skateboardpro.php",
                                "explorer.php",
                                "oxfords.php",
                                "terrainsandals.php"
                            ];
                            $productIndex = $row['ProductID'] - 1;
                            $productLink = $productLinks[$productIndex];
                            ?>
                            <a href="<?php echo $productLink; ?>"> Click me</a>
                            
                        </td>
                    </tr>
                <?php
                } ?>
            </table>     
    </div>
    <div>
        <h2>Outstanding Orders</h2>
        <?php
        include 'db.php';

        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("
        SELECT *
        FROM Order_Tracking
        JOIN Order_Info ON Order_Tracking.OrderID = Order_Info.OrderID
        WHERE Order_Tracking.TrackingStatus = 'Processing'
    ");
        $stmt->execute();

        // Fetch the results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are outstanding orders
        if($results) {
            // Display the orders in a table
            echo "<table border='3'>";
            echo "<tr><th>Tracking Number</th><th>Order ID</th><th>Customer ID</th>
                  <th>Order Date</th><th>Order Total</th><th>Order Status</th></tr>";
            foreach($results as $row) {
                echo "<tr>";
                echo "<td>".$row['TrackingID']."</td>";
                echo "<td>".$row['OrderID']."</td>";
                echo "<td>".$row['CustomerID']."</td>";
                echo "<td>".$row['OrderDate']."</td>";
                echo "<td>$".$row['OrderTotal']."</td>";
                echo "<td>$".$row['TrackingStatus']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No outstanding orders with 'Processing' status.</p>";
        }

        // Close the database connection
        $pdo = null;
        ?>
    </div>

    <div>
        <h2>Order Fulfillment</h2>

        <?php
        // Include the database connection
        include 'db.php';

        // Check if the form is submitted
        if(isset($_POST['update'])) {
            // Get the values from the form
            $orderId = $_POST['order_id'];
            $orderStatus = $_POST['order_status'];

            // Update the records in the database
            $updateStmt = $pdo->prepare("
                UPDATE Order_Tracking
                SET TrackingStatus = :tracking_status
                WHERE OrderID = :order_id
            ");

            $updateStmt->bindParam(':tracking_status', $orderStatus);
            $updateStmt->bindParam(':order_id', $orderId);
            $updateStmt->execute();
        }

        // Fetch orders from the database
        $stmt = $pdo->prepare("
            SELECT *
            FROM Order_Info
            LEFT JOIN Order_Tracking ON Order_Info.OrderID = Order_Tracking.OrderID
        ");

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display orders in a table
        if($results) {
            echo "<table border='2'>";
            echo "<tr><th>Order ID</th><th>Customer ID</th><th>Order Date</th><th>Order Total</th><th>Tracking ID</th><th>Order Status</th><th>Action</th></tr>";
            foreach($results as $row) {
                echo "<tr>";
                echo "<td>".$row['OrderID']."</td>";
                echo "<td>".$row['CustomerID']."</td>";
                echo "<td>".$row['OrderDate']."</td>";
                echo "<td>".$row['OrderTotal']."</td>";
                echo "<td>".$row['TrackingID']."</td>";
                echo "<td>".$row['TrackingStatus']."</td>";
                echo "<td>";
                echo "<form method='post' action='InventoryCheck.php'>";
                echo "<input type='hidden' name='order_id' value='".$row['OrderID']."'>";
                echo "<label for='order_status'>Change Status Here:</label>";
                echo "<input type='text' name='order_status' required>";
                echo "<button type='submit' name='update'>Update</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No orders found.</p>";
        }

        // Close the database connection
        $pdo = null;
        ?>
    </div>
</body>

</html>
