<html>



<head>

<title> Classic Sneakers  </title>

</head>


<body>

<b>


    <h1> <center>Classic White Sneakers </center> </h1>
    <center><img src="https://img.eobuwie.cloud/eob_product_256w_256h(2/e/3/d/2e3dbc917bc4468a27318ab436d452d99be5d88a_02_0886951952809.jpg,jpg)/sneakers-converse-ct-ox-136823c-white.jpg" alt="white sneakers"></center>
	

<?php


    include 'connection.php';

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'Classic Sneakers';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'Classic Sneakers';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'Classic Sneakers';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'Classic Sneakers';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="sneakers.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>      





