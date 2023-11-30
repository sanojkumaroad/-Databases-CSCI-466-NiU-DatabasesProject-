<!-- VRAMS HomePAGE -->
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title> VRAMS Shoe Store </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    </style>
  </head>
  <body>
    <div class="navbar" id="navbar">
    
      	    <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a
>           <a href="shop.php">Shop</a>
	    <a href="InventoryCheck.php">Inventory</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
    
    </div>
    
    <h1 style = "font - family:Bernard MT"> VRAMS: Selling Quality Shoes </h1>
    <p>Put your best foot forward in fashion! Shop the latest trends in footwear at VRAMS and step into style effortlessly.</p>
    <img src = "MainPicture.png" alt = "shoe styles" width = 100% height = "300">

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
