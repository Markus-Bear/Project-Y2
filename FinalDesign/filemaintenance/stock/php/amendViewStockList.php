<!--
    Name of screen: 	amendViewStockList.php
    Purpose of screen: 	Generates the stock listbox.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php
include "db.inc.php";
/* Retrieve stock items that have not been deleted,
   and join with the Suppliers table to get the supplier's Name.*/
$sql = "SELECT stock.StockID, stock.Description, stock.CostPrice, stock.RetailPrice,  sup.Name AS SupplierName, stock.ReorderQuantity, stock.ReorderLevel, stock.SupplierStockCode, stock.QuantityInStockRoom, stock.DateLastUpdate  
        FROM Stock stock
        JOIN Suppliers sup ON stock.SupplierID = sup.SupplierID
        WHERE stock.DeletedFlag = 0 AND sup.DeletedFlag = 0";
$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error in querying the database: ' . mysqli_error($con));
}
echo "<br><select name='listbox' id='listbox' onclick='populate()'>";
echo "<option value=''>-- Select a Stock Item --</option>";
while ($row = mysqli_fetch_array($result)) {
    $stockid = $row['StockID'];
    $description = $row['Description'];
    $costprice = $row['CostPrice'];
    $retailprice = $row['RetailPrice'];
    $supplier = $row['SupplierName'];
    $reorderqty = $row['ReorderQuantity'];
    $reorderlvl = $row['ReorderLevel'];
    $supplierstockcode = $row['SupplierStockCode'];
    $quantity = $row['QuantityInStockRoom'];
    $datelastupdate = $row['DateLastUpdate'];
    // Build a comma-separated string in the order expected by the populate() function.
    $allText = "$stockid, $description, $costprice, $retailprice, $supplier, $reorderqty, $reorderlvl, $supplierstockcode, $quantity, $datelastupdate";
    echo "<option value='$allText'>$description</option>";
}
echo "</select>";
mysqli_close($con);
?>