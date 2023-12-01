<?php

//Opening a connection with our database and creating queries needed
$connection = mysqli_connect('courses', 'z1908204', '2001Nov05');
if(!$connection)
{
  die("Connection error");
}

$database = mysqli_select_db($connection,"z1908204");

if(!$database)
{
 die("Database connection error");
}

$queryP = mysqli_query($connection, "select ProductID, ProductName, ProductPrice from Products");
$queryID = mysqli_query($connection, "select ProductID from Products");

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory. VRAMS Shoe Store.</title>
    <link rel="stylesheet" href="styles.css">
    
<!--         "I DELETED THIS PART BUT INCLUDED OUR HEADER SECTION INSTEAD! SO DELETE THIS MESSAGE ONCE YOU UNDERSTAND WHAT I DID HERE!!!   Used to split page in half and costimize color          -->
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFB6C1;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
	}

	        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {display: none;}
            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {position: relative;}
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
	}

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .contact-us {
            background-color: #333;
            border: 1px solid #fff;
            color: #fff;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

</style>


    <!--        Setting left to show list of all products        -->

<body>

    <!--	HEADER SECTION THAT I INCLUDED!		-->

    <header>
    <div class="navbar" id="navbar">
      	    <a href="mainVRAMS.php"><img src = "VRAMS Logo.png" alt = "VRAMS logo" width = "200" height = "150"></a
>           <a href="shop.php">Shop</a>  
	    <a href="InventoryCheck.php">Inventory</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login/Sign Up</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
    </div>
</header>


<h1> Full Product List </h1>
<table border="2" style = "background-color: white;">
<tr>
 <th> Product ID <br> Number </th>
 <th> Name </th>
</tr>

     <tr>
<?php
 while($row = mysqli_fetch_array($queryP,MYSQLI_ASSOC))
    {
 ?>
        <td> <?php echo $row['ProductID']; ?> </td>
        <td> <?php echo $row['ProductName']; ?> </td>
      </tr>
     <?php
    }?>

</table>

</div>


    <!--        Setting right to inventory management where employee can run queries        -->

<div class = "split right">
<h1> Inventory Management </h1>

<!-- Form to see what is in or out of stock if ran-->

<form method = "GET" action = "<?php echo $_SERVER['PHP_SELF']; ?>">

<label for = "check_inventory"> Select to see inventory in/out of stock list: </label>
<select name = "check_inventory" >
<option value = "NULL"> --Select Option--- </option>
<option value = "!="> In Stock </option>
<option value = "="> Out of Stock </option>
</select>
<input type = "submit" value = "SUBMIT" name = "inventorysubmit">

</form>

<?php
        //PHP code to run if above form is submitted
    if(isset($_GET["inventorysubmit"]) && $_GET["check_inventory"] != "NULL")
    {
        $comparison = $_GET["check_inventory"];
        $queryINV = mysqli_query($connection, "Select ProductID, ProductName, Qty from Products WHERE quantity $comparison 0;");
?>
        <table border = 2 style = "background-color: white;">
        <tr>
        <th> Product <br> ID </th>
        <th> Name </th>
        <th> Quantity </th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($queryINV, MYSQLI_ASSOC))
        {?>
            <tr>
            <td> <?php echo $row['ProductID']; ?> </td>
                     <td> <?php echo $row['ProductName']; ?> </td>
                    <td> <?php echo $row['Qty']; ?> </td>
            </tr>
    <?php    } ?>
        </table>
<?php
    }
?>




<!-- Form to add to inventory -->
<h4> Add to quantity of inventory </h4>
<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">

<label for = "add_inventory" > What style would you like to add to? (Must enter ID #) : </label>
<input type = "text" name= "add_inventory" value = ""/ ><br>

<label for="add">How many to add: </label>
        <input type = "number" name = "add" value="" min = "1" required/>

<input type = "submit" value = "SUBMIT" name = "addsubmit">

</form>

<?php
        // PHP Code to add more to quantity of product selected
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addsubmit"]))
    {
        $prod = $_POST['add_inventory'];
        $addto = $_POST['addsubmit'];
    }

?>



<!-- Table that links each product to it's product details page -->

<h4> Click link to view product details </h4>
<table border="2" style = "background-color: white;">
<tr>
 <th> Product ID <br> Number </th>
 <th> Select </th>
</tr>

     <tr>
<?php
 while($row = mysqli_fetch_array($queryID,MYSQLI_ASSOC))
    {
 ?>
        <td> <?php echo $row['ProductID']; ?> </td>
    <td> <a href="https://i.seadn.io/gae/2hDpuTi-0AMKvoZJGd-yKWvK4tKdQr_kLIpB_qSeMau2TNGCNidAosMEvrEXFO9G6tmlFlPQplpwiqirgrIPWnCKMvElaYgI-HiVvXc?auto=format&dpr=1&w=3840"> Click me</a> </td>
      </tr>
     <?php
    }?>
</table>

</div>

</body>
</html>
