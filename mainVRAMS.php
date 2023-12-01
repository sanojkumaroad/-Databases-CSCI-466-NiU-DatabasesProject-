<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title> VRAMS Shoe Store </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
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

        h1 {
            font-family: 'Bernard MT', cursive;
            text-align: center;
            margin: 20px 0;
        }

        p {
            text-align: center;
            margin-bottom: 40px;
        }

        img {
            width: 100%;
            height: auto;
        }

        .featured-products {
            text-align: center;
            margin: 40px 0;
        }

        .featured-products img {
            width: 80%;
            max-width: 300px;
            height: auto;
            margin: 10px;
        }

        .popular-categories {
            text-align: center;
            margin: 40px 0;
        }

        .popular-categories a {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }

        .subscribe-form {
            text-align: center;
            margin: 40px 0;
        }

        .subscribe-form input[type="email"] {
            padding: 10px;
            width: 60%;
            margin-right: 10px;
            border: 1px solid #333;
            border-radius: 5px;
        }

        .subscribe-form button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
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

    <h1> VRAMS: Selling Quality Shoes </h1>
    <p>Put your best foot forward in fashion! Shop the latest trends in footwear at VRAMS and step into style effortlessly.</p>
    <img src="MainPicture.png" alt="shoe styles">

    <div class="featured-products">
        <h2>Featured Products</h2>
        <img src="featured_product_1.jpg" alt="Featured Product 1">
        <img src="featured_product_2.jpg" alt="Featured Product 2">
    </div>

    <div class="popular-categories">
        <h2>Popular Categories</h2>
        <a href="#">Men's Shoes</a>
        <a href="#">Women's Shoes</a>
        <a href="#">Kid's Shoes</a>
        <a href="#">Athletic Shoes</a>
    </div>

    <div class="subscribe-form">
        <h2>Subscribe to Our Newsletter</h2>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Your Email" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>

<footer>
    <div class="contact-us">
        <h2>Contact Us</h2>
        <p>Email: info@vramsshoestore.com</p>
        <p>Phone: (555) 123-4567</p>
    </div>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>    

<!-- This is Responsive Navbar for the Mobile View -->
    <script>
        function myFunction() {
            var x = document.getElementById("navbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
  </body>
</html>

