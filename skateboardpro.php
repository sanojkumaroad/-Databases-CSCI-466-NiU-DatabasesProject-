<html>



<head>

<title> Skateboard Pro  </title>

</head>


<body>

<b>


    <h1> <center>Skateboard Pro</center> </h1>
    <center><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtIVdUiPd3h14bP5oGIfMI8mcST1WMFlytFw&usqp=CAU" alt="Running Pro 3000"></center>



<?php


    include 'connection.php';

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'Skateboard Pro';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'Skateboard Pro';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'Skateboard Pro';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'Skateboard Pro';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="skateboardpro.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
