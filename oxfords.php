<html>



<head>

<title> Business Casual Oxfords  </title>

</head>


<body>

<b>


    <h1> <center>Business Casual Oxfords</center> </h1>
    <center><img src="https://www.misiuacademy.com/wp-content/uploads/2022/11/8027-Full-Brogue-without-medallion3-e1667339062474-256x256.jpg" alt="Running Pro 3000"></center>



<?php

    include 'connection.php';

?>

<?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Business Casual Oxfords'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>


	<h2> Add to Cart </h2>
	<form action="oxfords.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
