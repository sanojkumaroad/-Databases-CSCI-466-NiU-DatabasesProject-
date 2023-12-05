<!-- VRAMS Inventory Check for Employee -->

<?php
    include 'connection.php';
    // $connection is available and connected to the database.
    // Perform your database operations using $connection.

    $queryP = mysqli_query($connection, "select ProductID, ProductName, ProductPrice from Products");
    $queryID = mysqli_query($connection, "select ProductID from Products");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory | VRAMS Shoe Store</title>
        <link rel="stylesheet" href="stylesInventoryCheck.css">   
    </head>
    
    <body>
            <header>
        <div class="navbar" id="navbar">
            <a href="mainVRAMS.php"><img src="VRAMSLogo.png" alt="VRAMS logo" width="200" height="150"></a>
            <a href="shop.php">Shop</a>
            <a href="orderTracking.php">Track Order</a>
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login/Sign Up</a>
            <a href="InventoryCheck.php">Employee</a>
            <a href="cart.php">Cart</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
        </div>
    </header>
        <!--    Setting left to show list of all products      -->
        <div>
            <h1> Full Product List </h1>
            <table border="2" style="background-color: white;">
                <tr>
                    <th> Product ID <br> Number </th>
                    <th> Name </th>
                </tr>
                
                <?php while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { ?>
                
                <tr>
                    <td> <?php echo $row['ProductID']; ?> </td>
                    <td> <?php echo $row['ProductName']; ?> </td>
                </tr>

                <?php } ?>
            </table>
        </div>

        <!-- Setting right to inventory management where employee can run queries -->
        <div class="split right">
            <h1> Inventory Management </h1>

            <!-- Form to see what is in or out of stock if ran -->
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="check_inventory"> Select to see inventory in/out of stock list: </label>
                <select name="check_inventory">
                    <option value="NULL"> --Select Option--- </option>
                    <option value="!="> In Stock </option>
                    <option value="="> Out of Stock </option>
                </select>
                <input type="submit" value="SUBMIT" name="inventorysubmit">
            </form>

            <?php
                // PHP code to run if the above form is submitted
                if(isset($_GET["inventorysubmit"]) && $_GET["check_inventory"] != "NULL") {
                    $comparison = $_GET["check_inventory"];
                    $queryINV = mysqli_query($connection, "Select ProductID, ProductName, Qty from Products WHERE quantity $comparison 0;");
            ?>

            <table border="2" style="background-color: white;">
                <tr>
                    <th> Product ID </th>
                    <th> Name </th>
                    <th> Quantity </th>
                </tr>
                
                <?php while($row = mysqli_fetch_array($queryINV, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td> <?php echo $row['ProductID']; ?> </td>
                    <td> <?php echo $row['ProductName']; ?> </td>
                    <td> <?php echo $row['Qty']; ?> </td>
                </tr>
                <?php } ?>
            </table>
            <?php } ?>

            <!-- Form to add to inventory -->
            <h4> Add to quantity of inventory </h4>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="add_inventory"> What style would you like to add to? (Must enter ID #) : </label>
                <input type="text" name="add_inventory" value="" /><br>
                <label for="add">How many to add: </label>
                <input type="number" name="add" value="" min="1" required/>
                <input type="submit" value="SUBMIT" name="addsubmit">
            </form>

            
        <!--  PHP Code to add more to quantity of product selected -->
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addsubmit"]))
    {
        $prod = $_POST['add_inventory'];
        $addto = $_POST['add'];

        $queryADD = mysqli_query($connection, "UPDATE Products SET Qty = Qty + '$addto' WHERE ProductID = '$prod'");
        $queryDisplayADD =  mysqli_query($connection, "SELECT ProductID, ProductName, Qty from Products");



?>

        <h4> Product info after adding more to quantity </h4>
        <table border="2">

           <tr>
           <th> Product <br> ID </th>
           <th> Quantity </th>
           <th> Name </th>
           </tr>
<?php
        while($row = mysqli_fetch_array($queryDisplayADD,MYSQLI_ASSOC))
        { ?>
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



            <!-- Table that links each product to its product details page -->
            <h4> Click link to view product details </h4>
            <table border="2" style="background-color: white;">
                <tr>
                    <th> Product ID Number </th>
                    <th> Select </th>
                </tr>
                <?php while($row = mysqli_fetch_array($queryID, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td> <?php echo $row['ProductID']; ?> </td>
                        <td> <a href="https://i.seadn.io/gae/2hDpuTi-0AMKvoZJGd-yKWvK4tKdQr_kLIpB_qSeMau2TNGCNidAosMEvrEXFO9G6tmlFlPQplpwiqirgrIPWnCKMvElaYgI-HiVvXc?auto=format&dpr=1&w=3840"> Click me</a> </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
