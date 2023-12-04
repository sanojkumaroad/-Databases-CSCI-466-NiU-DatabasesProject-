<?php include 'connection.php';
?>
<html>


<head>

<title> High-Fashion Heels  </title>

</head>


<body>

<b>


    <h1> <center> High-Fashion Heels </center> </h1>
    <center><img src="https://static.wixstatic.com/media/68c3d3_c6b1ed46c629401a9dc835f2d8d67d9c~mv2.jpg/v1/fill/w_256,h_256,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/68c3d3_c6b1ed46c629401a9dc835f2d8d67d9c~mv2.jpg" alt="Running Pro 3000"></center>





<?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'High-Fashion Heels'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>




	<h2> Add to Cart </h2>
	<form action="fashionheels.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
