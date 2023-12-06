<!-- Login.php -->

<?php
    session_start();
    include 'connection.php';
    // $connection is available and connected to the database.
    // Perform your database operations using $connection.
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | VRAMS Shoe Store</title>
        <link rel="stylesheet" href="stylesLogin.css">
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
        <main>
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="login_email">Email:</label>
            <input type="email" id="login_email" name="login_email" required>
            <br>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" required>
            <br>
            <button type="submit" name="login">Login</button>
        </form>

            <?php
            include "connection.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get user input
            $email = isset($_POST['login_email']) ? $_POST['login_email'] : '';
            $password = isset($_POST['login_password']) ? $_POST['login_password'] : '';

            // Query to check if the email and password match
            $sql = "SELECT * FROM User_Customer WHERE email='$email' AND password='$password'";

            // Execute the query and check for errors
            $result = $connection->query($sql);
            if (!$result) {
                die("Error in SQL query: " . $connection->error);
            }

            // Check if there is a matching user
            $num_rows = $result->num_rows;

            if ($num_rows > 0) {
                // Redirect to another page on successful login
                header("Location: mainVRAMS.php");
                exit();
            } else {
                // Login Failed!
                echo '<p style="color: red;">' . "Invalid Email or Password. Please Try Again!" . '</p>';
            }
          $connection->close();
        } ?>


         
            <h2>Create Account</h2>

            <?php
                if (isset($createAccountError)) {
                    echo '<p style="color: red;">' . $createAccountError . '</p>';
                } elseif (isset($_SESSION['user_logged_in'])) {
                    echo '<p style="color: green;">Account created and logged in as ' . $_SESSION['user_email'] . '.</p>';
                    // Redirect to home page
                    header('refresh:3; url=mainVRAMS.php'); // Redirect after 3 seconds
                    exit();
                }
            ?>

            <form method="post" action="login.php" onsubmit="return validateForm('create')">
                <label for="create-email">Email:</label>
                <input type="email" id="create-email" name="email" required> <br>
                <label for="create-password">Password:</label>
                <input type="password" id="create-password" name="password" required oninput="checkPassword('create')">

                <div class="password-status" id="create-password-status"> </div> <br>

                <div id="password-requirements">
                    <p>Password Requirements:</p>
                    <ul>
                        <li id="length-req">Minimum 8 characters</li>
                        <li id="uppercase-req">At least one uppercase letter</li>
                        <li id="lowercase-req">At least one lowercase letter</li>
                        <li id="digit-req">At least one digit</li>
                        <li id="symbol-req">At least one symbol</li>
                    </ul>
                </div> <br>

                <button type="submit" name="create_account" id="create-account-btn" >Create Account</button>
            </form>

            <script>
                function checkPassword(formType) {
  
                    const passwordInput = document.getElementById(`${formType}-password`);
                    const passwordStatus = document.getElementById(`${formType}-password-status`);
                    const password = passwordInput.value;
                    // Password restrictions
                    const lengthRegex = /.{8,30}/;
                    const uppercaseRegex = /[A-Z]/;
                    const lowercaseRegex = /[a-z]/;
                    const digitRegex = /\d/;
                    const symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;
                    // Check if all restrictions are met
                    const isValid = (
                        lengthRegex.test(password) &&
                        uppercaseRegex.test(password) &&
                        lowercaseRegex.test(password) &&
                        digitRegex.test(password) &&
                        symbolRegex.test(password)
                    );
                    // Display appropriate status and update button state
                    passwordStatus.innerHTML = isValid
                    ? '<img src="checkmark.png" alt="Checkmark">'
                    : '<img src="crossmark.png" alt="Crossmark">';

                    const createAccountBtn = document.getElementById(`${formType}-account-btn`);
                    createAccountBtn.disabled = !isValid;
                }

                function validateForm(formType) {
                    // Additional validation logic if needed
                    return true; // Return true to submit the form
                }
            </script>
        </main>

        <footer> <p>All rights reserved. © 2023 VRAMS Shoe Store</p> </footer>
    </body>
</html>
