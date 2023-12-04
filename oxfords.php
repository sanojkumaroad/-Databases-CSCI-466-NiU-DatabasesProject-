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

    $sql = "SELECT ProductName FROM Products WHERE ProductName = 'Business Casual Oxfords';";
    $name = $pdo->query($sql);
    $result1 = $name->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductDescription FROM Products WHERE ProductName = 'Business Casual Oxfords';";
    $description = $pdo->query($sql);
    $result2 = $description->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT Qty FROM Products WHERE ProductName = 'Business Casual Oxfords';";
    $qty = $pdo->query($sql);
    $result3 = $qty->fetch(PDO::FETCH_BOTH);


    $sql = "SELECT ProductPrice FROM Products WHERE ProductName = 'Business Casual Oxfords';";
    $price = $pdo->query($sql);
    $result4 = $price->fetch(PDO::FETCH_BOTH);


        

?>


    <h3> Description:  <?php echo $result2 ?> </h3><br>
    <h3> Quantity:  <?php echo $result3 ?> </h3><br>
    <h3> Price: $ <?php echo $result4 ?> </h3><br>



	<h2> Add to Cart </h2>
	<form action="oxfords.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>
