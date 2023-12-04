<html>



<head>

<title> All-Terrain Sandals  </title>

</head>


<body>

<b>


    <h1> <center>All-Terrain Sandals</center> </h1>
    <center><img src="https://img.eobuwie.cloud/eob_product_256w_256h(a/8/7/0/a8700b0c30afdbfa2c36fe9c2b3165ba33d171f8_02_4066748250738_SW.jpg,jpg)/sandales-adidas-terrex-cyprex-ultra-dlx-sandals-hp8651-noir.jpg" alt="Running Pro 3000"></center>



<?php


    include 'connection.php';

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'All-Terrain Sandals';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'All-Terrain Sandals';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'All-Terrain Sandals';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'All-Terrain Sandals';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="terrainsandals.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
