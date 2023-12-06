<?php

//Opening a connection with our database and creating queries needed
$connection = mysqli_connect('courses', 'z1908204', '2001Nov05');
if(!$connection)
{
  die("Connection error");
}

$database = mysqli_select_db($connection,"z1908204");

if(!$database)
{
 die("Database connection error");
}

$queryP = mysqli_query($connection, "select ProductID, ProductName, ProductPrice from Products");
$queryID = mysqli_query($connection, "select ProductID from Products");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page - VRAMS Shoe Store</title>
    <link rel="stylesheet" href="stylesshop.css">

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
    <main>

        <!-- content -->
        <div class="split right">

            <!-- Table that links each product to its product details page -->
            <h1> Full Product List </h1>
            <table border="1">
                <tr>
                    <th> Product ID <br> Number </th>
                    <th> Name </th>
                    <th> Select </th>
                </tr>
                <?php
                // function to fetch product details from the database
                $queryP = mysqli_query($connection, "SELECT ProductID, ProductName, ProductPrice FROM Products");

                while ($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td> <?php echo $row['ProductID']; ?> </td>
                        <td> <?php echo $row['ProductName']; ?> </td>
                        <td class="product-container">
                            <?php
                            // links for products
                            $productLinks = [
                                "sneakers.php",
                                "running.php",
                                "loafers.php",
                                "hiking.php",
                                "basketball.php",
                                "yoga.php",
                                "urbanboots.php",
                                "techrunner.php",
                                "balletflats.php",
                                "soccerpro.php",
                                "slipons.php",
                                "snowboots.php",
                                "fashionheels.php",
                                "summersandals.php",
                                "crossfit.php",
                                "canvasslipons.php",
                                "skateboardpro.php",
                                "explorer.php",
                                "oxfords.php",
                                "terrainsandals.php"
                            ];
                            $productIndex = $row['ProductID'] - 1;
                            $productLink = $productLinks[$productIndex];
                            ?>
                            <a href="<?php echo $productLink; ?>"> Click me</a>
                            
                        </td>
                    </tr>
                <?php
                } ?>
            </table>

        </div>

    </main>

    <script>
        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("productId=" + productId);
        }
    </script>

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

