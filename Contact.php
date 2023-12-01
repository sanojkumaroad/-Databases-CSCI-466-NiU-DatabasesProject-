<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | VRAMS Shoe Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>

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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .contact-us {
            background-color: #333;
            border: 1px solid #fff;
            color: #fff;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        .professor-info,
        .founders-contact,
        .course-info,
        .contact-us {
            margin-bottom: 30px;
        }

	.founder-contact {
	    text-align: center:
            margin: 20px;
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
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
    </div>
</header>

<main>

    <div class="professor-info">
        <h2>Contact Professor</h2>
        <p>Professor: Jon Lehuta</p>
        <p>Email: lehuta@niu.edu</p>
    </div>

    <div class="founders-contact">
        <h2>Contact Our Founders</h2>
        
        <div class="founder-contact">
            <p>Vanessa Cortez-Ocon</p>
            <p>Email: Z1967049@students.niu.edu</p>
        </div>
        
        <div class="founder-contact">
            <p>Rumel Piolo Dangcalan</p>
            <p>Email: Z1908204@students.niu.edu</p>
        </div>
        
        <div class="founder-contact">
            <p>Alyssa Romero</p>
            <p>Email: Z1976871@students.niu.edu</p>
        </div>

        <div class="founder-contact">
            <p>Maddux Chanthaboury</p>
            <p>Email: Z1979009@students.niu.edu</p>
        </div>

        <div class="founder-contact">
            <p>Sanoj Oad</p>
            <p>Email: Z1980626@students.niu.edu</p>
        </div>
    </div>

    <div class="course-info">
        <h2>Course Information</h2>
        <p>Course: CSCI 466</p>
        <p>Section: 2</p>
    </div>

    <div class="contact-us">
        <h2>Contact Us</h2>
        <p>Email: info@vramsshoestore.com</p>
        <!-- You can include other contact information or a contact form here -->
    </div>

</main>

<footer>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>

</body>
</html>

