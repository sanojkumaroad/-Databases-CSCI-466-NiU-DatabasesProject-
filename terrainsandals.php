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

?>


   <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'All-Terrain Sandals'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="terrainsandals.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
