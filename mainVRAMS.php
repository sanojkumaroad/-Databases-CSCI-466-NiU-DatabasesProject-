<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> VRAMS Shoe Store </title>
        <link rel="stylesheet" href="stylesmainVRAMS.css">
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
</header>
    <h1> VRAMS: Selling Quality Shoes </h1>
    <p>Put your best foot forward in fashion! Shop the latest trends in footwear at VRAMS and step into style effortlessly.</p>
    <div class="MainPicture">
    <img src="MainPicture.png" alt="shoe styles" width="1000" height="auto">
</div>

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


