<html>



<head>

<title> Urban Street Boots  </title>

</head>


<body>

<b>


    <h1> <center> Urban Street Boots </center> </h1>
    <center><img src="https://www.palazzodiscarpe.gr/wp-content/uploads/2022/10/IMG_5672-256x256.jpg" alt="white sneakers"></center>
	

<?php


    include 'connection.php';

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'Urban Street Boots';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'Urban Street Boots';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'Urban Street Boots';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'Urban Street Boots';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="urbanboots.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>   
