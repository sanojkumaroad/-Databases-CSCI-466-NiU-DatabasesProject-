<html>



<head>

<title> Retro Basketball  </title>

</head>


<body>

<b>


    <h1> <center> Retro Basketball </center> </h1>
    <center><img src="https://www.area02.com/_next/image?url=https%3A%2F%2Fimg.area02.com%2Fnode%2Fslideshow%2Fslides_1409_1643277108298.png&w=256&q=85" alt="white sneakers"></center>
	

<?php


    include 'connection.php';
?>


<?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Retro Basketball'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>


	<h2> Add to Cart </h2>
	<form action="basketball.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html> 
