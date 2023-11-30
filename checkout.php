<html>
	<head>
		<title>Checkout Page</title>
        <style>
			/* Apple these margins to all the input types */
            input {
                margin-top:2px; 
                margin-bottom:2px;
            }
        </style>
	</head>
	<body>
		<h1>Checkout</h1>
		<hr>
		<form method="post">
			<br>
			<h3>Contact Information</h3>
			<input type="email" placeholder="Email Address" name="email" required> <br>
			<input type="tel" placeholder="Phone Number" pattern="[0-9]{10}" name="number" required><br>

			<h3>Delivery Information</h3>
			<input type="text" placeholder="First Name" name="fname" required>
			<input type="text" placeholder="Last Name" name="lname" required><br>
			<input type="text" placeholder="Shipping Address" size="46" name="address" required><br>
			<input type="text" placeholder="City" size="12" name="city" required>
			<input type="text" placeholder="State" size="12"name="state" required>
			<input type="text" placeholder="Zip Code" size="10" name="zip" maxlength="5"required><br>

			<h3>Payment Information</h3>
			<input type="text" placeholder="Card Number" size="26" name="cardnumber" maxlength="19" required><br>
			<input type="text" placeholder="Expiration Date" size="10" name="expdate" maxlength="5" required>
			<input type="text" placeholder="Security Code" size="10" name="code" maxlength="4" required><br>
			<input type="text" placeholder="Name on card" size="26" name="cardname" required>

			<h3>Billing Address</h3>
			<input type="text" placeholder="First Name" name="billingFName" required>
            <input type="text" placeholder="Last Name" name="billingLname" required><br>
            <input type="text" placeholder="Shipping Address" size="46" name="billingAddress" required><br>
            <input type="text" placeholder="City" size="12" name="billingCity" required>
            <input type="text" placeholder="State" size="12"name="billingState" required>
            <input type="text" placeholder="Zip Code" size="10" name="billingZip" maxlength="5"required><br>

			<h4>Promo Code</h4>
			<input type="text" placeholder="Promo Code" id="promoCode" name="promo">
			<input type="button" onclick="validate()" name="submitpromo" value="Apply Promo">

			<br>
			<h3>Order Summary</h3>
			<p id="subtotal"><p>
			<p id="discount"><p>
			<p id="shipping"><p>
			<p id="total"><p>

			<input type="submit" name="submit" value="Place Order" style="width:200px"><br>
		</form>

		<?php
            $username="z1976871";
            $password="2004May19";

            try {
                $dsn = "mysql:host=courses;dbname=z1976871";
                $pdo = new PDO($dsn, $username, $password);
            }
            
            catch(PDOException $e) {
                echo "Connection to database failed: " . $e->getMessage();
            }

            if(empty($_POST['promo']) == false) {
                $promo = $_POST['promo'];

                $prepared=$pdo->prepare('SELECT discountpercent FROM PromoCode WHERE code = ?');
                $prepared->execute([$promo]);
                $result=$prepared->fetchAll();

                if($result) {
                    foreach($result as $row) {
                        $discount = $row[0];
                    }
                }
                else {
                    $discount = 0;
                }
            }
        ?>

		<script>
			subtotal = 15;
            document.getElementById("subtotal").innerHTML="Subtotal: " + subtotal;
            shipping = 3.99;
            document.getElementById("shipping").innerHTML="Shipping: " + shipping;
            calculation = shipping + subtotal;
            total = calculation.toFixed(2);
            document.getElementById("total").innerHTML="Total: " + total;
		</script>

		<script>
			function validate() {
				if(document.getElementById("promo").value.length == 0) {
					alert("Please enter a promo code");
				}
				else {
					savings = "<?php echo"$discount"?>";
					if(savings == 0) {
						//alert("The promo code you entered is invalid. Please try again.");
						alert(promoCode);
					}
					else {
						document.getElementById("discount").innerHTML="Discount: " + "-" + savings + "%" + " (Applied to subtotal)";
						newSubTotal = subtotal - (subtotal*(savings/100));
						document.getElementById("subtotal").innerHTML="Subtotal: " + newSubTotal;
						newTotal = newSubTotal + shipping;
						newTotal = newTotal.toFixed(2);
						document.getElementById("total").innerHTML="Total: " + newTotal;
					}
				}
			}
        </script>
	</body>
</html>
