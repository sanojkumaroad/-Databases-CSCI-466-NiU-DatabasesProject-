<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login | VRAMS Shoe Store</title>
    <link rel="stylesheet" href="css/stylesEmployee_Verify.css">
</head>

<body>

    <header>
        <div class="navbar" id="navbar">
            <a href="mainVRAMS.php"><img src="VRAMS Logo.png" alt="VRAMS logo" width="200" height="150"></a>
            <a href="shop.php">Shop</a>
            <a href="InventoryCheck.php">Inventory</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login/Sign Up</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
        </div>
    </header>

    <main>
        <h2> Employee Login</h2>

        <?php
        include "connection.php";
        // $connection is available and connected to the database.
        // Perform your database operations using $connection.
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get user input
            $email = isset($_POST['login_email']) ? $_POST['login_email'] : '';
            $password = isset($_POST['login_password']) ? $_POST['login_password'] : '';

            // Query to check if the email and password match
            $sql = "SELECT * FROM User_Employee WHERE email='$email' AND password='$password'";

            // Execute the query and check for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

            // Check if there is a matching user
            $num_rows = $result->num_rows;

            if ($num_rows > 0) {
                // Redirect to another page on successful login
                header("Location: InventoryCheck.php");
                exit();
            } else {
                // Login Failed!
                echo '<p style="color: red;">' . "Invalid Email or Password. Please Try Again!" . '</p>';
            }

            // Close the database connection
            $connection->close();
        }

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="login_email">Email:</label>
            <input type="email" id="login_email" name="login_email" required>
            <br>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" required>
            <br>
            <button type="submit" name="login">Login</button>
        </form>

    </main>
    <footer>
        <p>All rights reserved. Â© 2023 VRAMS Shoe Store</p>
    </footer>

</body>
</html>
