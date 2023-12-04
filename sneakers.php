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

?>


   <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Classic White Sneakers'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="sneakers.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>      





