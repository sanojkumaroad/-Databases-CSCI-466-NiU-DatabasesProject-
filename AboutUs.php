<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | VRAMS Shoe Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles for the About Us page */
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

        .founders-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .founder {
            margin: 20px;
        }

        .founder img {
            border-radius: 50%;
            max-width: 100px;
        }

        .mission-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .mission-statement {
            font-size: 18px;
            line-height: 1.6;
        }

        .more-info {
            margin-bottom: 30px;
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

    <div class="founders-section">
        <h2>Meet Our Founders</h2>
        
        <div class="founder">
            <img src="images/vanessa.jpg" alt="Vanessa">
            <p>Vanessa Cortez-Ocon</p>
        </div>
        
        <div class="founder">
            <img src="images/rumel.jpg" alt="Rumel">
            <p>Rumel Piolo Dangcalan</p>
        </div>
        
        <div class="founder">
            <img src="images/alyssa.jpg" alt="Alyssa">
            <p>Alyssa Romero</p>
        </div>

        <div class="founder">
            <img src="images/maddux.jpg" alt="Maddux">
            <p>Maddux Chanthaboury</p>
        </div>

        <div class="founder">
            <img src="images/sanoj.jpg" alt="Sanoj">
            <p>Sanoj Oad</p>
        </div>
    </div>

    <div class="mission-section">
        <h2>Our Mission</h2>
        <p class="mission-statement">
            At VRAMS Shoe Store, we are not just selling shoes; we are crafting an experience. Our mission is to provide a friendly online shoe store where you can discover unique and stylish footwear for men, women, and kids. Every pair tells a story, and we believe in making every step memorable.
        </p>
    </div>

    <div class="more-info">
        <h2>More About Us</h2>
        <p>
            Founded in 2023 as a group project for CSCI 466, VRAMS Shoe Store has grown into a haven for shoe enthusiasts. Our founders, Vanessa, Rumel, Alyssa, Maddux, and Sanoj, share a passion for footwear and a commitment to delivering a delightful shopping experience.
        </p>

        <p>
            We curate a diverse collection of shoes that cater to different tastes and preferences. Whether you're looking for casual sneakers, elegant heels, or adorable kids' shoes, VRAMS Shoe Store has something for everyone.
        </p>

        <p>
            Customer satisfaction is at the core of our values. We strive to offer excellent customer service, ensuring that every interaction with VRAMS Shoe Store is as pleasant as slipping into a comfy pair of shoes.
        </p>
    </div>

</main>

<footer>
    <div class="contact-us">
        <h2>Contact Us</h2>
        <p>Email: info@vramsshoestore.com</p>
        <p>Phone: (555) 123-4567</p>
    </div>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>

</body>
</html>

