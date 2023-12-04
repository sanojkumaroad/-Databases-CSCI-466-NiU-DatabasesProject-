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

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'Canvas Slip-ons';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'Canvas Slip-ons';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'Canvas Slip-ons';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'Canvas Slip-ons';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="canvasslipons.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
