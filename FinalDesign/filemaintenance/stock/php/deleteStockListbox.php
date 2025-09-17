<!--
    Name of screen: 	deleteStockListbox.php
    Purpose of screen: 	Generates the listbox for available stock from the Stock Table in the database. 
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php
include "db.inc.php";
/* Retrieve stock items that have not been deleted,
   and join with the Suppliers table to get the supplier's Name.*/
$sql = "SELECT stock.StockID, stock.Description, stock.QuantityInStockRoom, sup.Name AS SupplierName  
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
    $quantity = $row['QuantityInStockRoom'];
    $supplier = $row['SupplierName'];
    // Build a comma-separated string in the order expected by the populate() function.
    $allText = "$stockid, $description, $quantity, $supplier";
    echo "<option value='$allText'>$description</option>";
}
echo "</select>";
mysqli_close($con);
?>