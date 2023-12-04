<html>



<head>

<title> Canvas Slip-ons  </title>

</head>


<body>

<b>


    <h1> <center>Canvas Slip-ons</center> </h1>
    <center><img src="https://cdn.childrensalon.com/media/catalog/product/cache/0/small_image/256x256/9df78eab33525d08d6e5fb8d27136e95/t/o/tommy-hilfiger-blue-canvas-slip-on-trainers-293541-0954472df1ea9972b83f0a5708d706ed41caae99.jpg" alt="Running Pro 3000"></center>



<?php
    include 'connection.php';
?>

	
<?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Canvas Slip-ons'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>


	<h2> Add to Cart </h2>
	<form action="canvasslipons.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
