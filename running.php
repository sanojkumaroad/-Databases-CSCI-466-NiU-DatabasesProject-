<html>



<head>

<title> Running Pro 3000  </title>

</head>


<body>

<b>


    <h1> <center>Running Pro 3000</center> </h1>
    <center><img src="https://highcountryoutfitters.com/cdn/shop/products/mens-cloud-5-12-shoes---mens-running-shoe-11_256x.png?v=1691517990" alt="Running Pro 3000"></center>



<?php

    include 'connection.php';

?>


  <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Running Pro 3000'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="running.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
