<html>



<head>

<title> Summer Breeze Sandals  </title>

</head>


<body>

<b>


    <h1> <center>Summer Breeze Sandals</center> </h1>
    <center><img src="https://dodo.ac/np/images/f/fc/Comfy_Sandals_%28White%29_NH_Icon.png" alt="Running Pro 3000"></center>



<?php


    include 'connection.php';

?>


    <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Summer Breeze Sandals'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="summersandals.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
