<?php

//Opening a connection with your DB here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login | VRAMS Shoe Store</title>
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
    <h2> Employee Login</h2>
    <?php
   /* if (isset($loginError)) {
        echo '<p style="color: red;">' . $loginError . '</p>';
    }  elseif (isset($_SESSION['user_logged_in'])) {
        echo '<p style="color: green;">You have successfully logged in as ' . $_SESSION['eployee_email'] . '.</p>';
        // Redirect to home page
        header('refresh:3; url=InventoryCheck.php'); // Redirect after 3 seconds
        exit();
    }
*/    
?>
    <form method="post" action= "https://students.cs.niu.edu/~z1967049/InventoryCheck.php" onsubmit = "return validateForm('login')">
        <label for="login_email">Email:</label>
        <input type="email" id="login_email" name="login_email" required>
        <br>
        <label for="login_password">Password:</label>
        <input type="password" id="login_password" name="login_password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

<script>

//I have to store DB pass to hash and then compare to what user inputt
    function validateForm(formType)
    {
      if(isset($_POST['login']))
      {
	if($_post['email'] && $_post['password'])
	{
	    $email = $_post['email'];
	    $password = $_post['password'];
	    $querycheckpw = "SELECT * from User_Employee where email = '$email' and password = '$password'";
	    $result = mysqli_query($connection, $querycheckpw);
	    $count = mysqli_num_rows($result);
	    if($count > 0)
	    {
		echo "Login Successful : redirecting to Inventory page";
		return true;
	    }
	    else
	    {
		echo "Unable to login: Email and/or Password is wrong";
		formType.preventDefault();
		return false;
	    }

	}
    }
</script>
</main>


<footer>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>

</body>
</html>
