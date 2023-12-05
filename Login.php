<!-- Login.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | VRAMS Shoe Store</title>
        <link rel="stylesheet" href="css/stylesLogin.css">
    </head>

    <body>
        <header>
            <div class="navbar" id="navbar">
                <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a>
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
            <h2>Login</h2>
	    
        <?php
		    include "connection.php";
		    // $connection is available and connected to the database.
		    // Perform your database operations using $connection.

    		// Check if the form is submitted
    		if ($_SERVER["REQUEST_METHOD"] == "POST") {

        	    // Get user input
        	    $email = isset($_POST['email']) ? $_POST['email'] : '';
        	    $password = isset($_POST['password']) ? $_POST['password'] : '';

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
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" required> <br>
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" required> <br>
                <button type="submit" name="login">Login</button>
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
	        </script>
        </main>
        
        <footer> <p>All rights reserved. © 2023 VRAMS Shoe Store</p> </footer>
    </body>
</html>
