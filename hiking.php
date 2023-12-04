<html>



<head>

<title> Trailblazer Hiking </title>

</head>


<body>

<b>


    <h1> <center> Trailblazer Hiking </center> </h1>
    <center><img src="https://i.pinimg.com/474x/d3/a0/05/d3a005334271b973a0cc24e7043df6dc.jpg" alt="white sneakers"></center>
	

   
<?php

    include 'connection.php';

?>


  <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Trailblazer Hiking'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>


	<h2> Add to Cart </h2>
	<form action="hiking.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
