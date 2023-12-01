<!-- Login.php -->

<?php
session_start();

// Include database connection
include 'db.php';    // remove this and include your database connection


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | VRAMS Shoe Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        /* styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
	}

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {display: none;}
            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {position: relative;}
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }


        main {
            text-align: center;
            margin-top: 50px;
        }

        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form label,
        form input,
        form button {
            display: block;
            margin-bottom: 15px;
        }

        #password-status {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
        }

        #password-status img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>

<header>
    <div class="navbar" id="navbar">
      	    <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a
>           <a href="shop.php">Shop</a>  
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
    if (isset($loginError)) {
        echo '<p style="color: red;">' . $loginError . '</p>';
    }  elseif (isset($_SESSION['user_logged_in'])) {
        echo '<p style="color: green;">You have successfully logged in as ' . $_SESSION['user_email'] . '.</p>';
        // Redirect to home page
        header('refresh:3; url=mainVRAMS.php'); // Redirect after 3 seconds
        exit();
    }
    
?>
    <form method="post" action="login.php" onsubmit="return validateForm('login')">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
        <br>
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

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
        <input type="email" id="create-email" name="email" required>
        <br>
        <label for="create-password">Password:</label>
        <input type="password" id="create-password" name="password" required oninput="checkPassword('create')">
        <div class="password-status" id="create-password-status"></div>
	<br>
    <div id="password-requirements">
        <p>Password Requirements:</p>
        <ul>
            <li id="length-req">Minimum 8 characters</li>
            <li id="uppercase-req">At least one uppercase letter</li>
            <li id="lowercase-req">At least one lowercase letter</li>
            <li id="digit-req">At least one digit</li>
            <li id="symbol-req">At least one symbol</li>
        </ul>
    </div>
	<br>
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


<footer>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>

</body>
</html>

