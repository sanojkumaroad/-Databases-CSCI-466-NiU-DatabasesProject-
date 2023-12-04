<html>



<head>

<title> Elegant Loafers  </title>

</head>


<body>

<b>


    <h1> <center>Elegant Loafers</center> </h1>
    <center><img src="https://cdn.childrensalon.com/media/catalog/product/cache/0/small_image/256x256/9df78eab33525d08d6e5fb8d27136e95/r/o/romano-boys-black-velvet-loafers-314909-788d2d92f55d4116d14ba8003a733ee5e3bd2780.jpg" alt="white sneakers"></center>
	

<?php

    include 'connection.php';

?>


   <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Elegant Loafers'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="loafers.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>   
