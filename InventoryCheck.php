<?php

//Opening a connection with our database and creating queries needed
$connection = mysqli_connect('courses', 'z-number', 'password');
if(!$connection)
{
  die("Connection error");
}

$database = mysqli_select_db($connection,"z-number");

if(!$database)
{
 die("Database connection error");
}

$queryP = mysqli_query($connection, "select ProductID, ProductName, ProductPrice from Products");
$queryID = mysqli_query($connection, "select ProductID from Products");

?>


<!DOCTYPE html>
<html>

    <!--            Used to split page in half and costimize color          -->
<style>
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #FFB6C1;
}

.right {
  right: 0;
  background-color: #FFC0CB;
}

}

</style>


<head>

<title> VRAMS - Inventory Section </title>

</head>

    <!--        Setting left to show list of all products        -->

<body>
<div class = "split left">

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
        while($row = mysqli_fetch_array($queryINV,MYSQLI_ASSOC))
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

