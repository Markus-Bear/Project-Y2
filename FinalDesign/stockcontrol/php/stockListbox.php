<!--
    Name of screen: 	stockListbox.php
    Purpose of screen: 	Generates the listbox for stock that are in the stock table in the Hotel database. 
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		March 2025
-->
<?php
// Include the database connection file.
include '../../db.inc.php';
// Determine the currently selected stock ID from GET parameters.
$selectedStockID = 0;
if (isset($_GET['stock_id'])) {
    $selectedStockID = (int) $_GET['stock_id'];
}
// Prepare the SQL query to select active stock items for the current supplier filter.
$sql = "SELECT s.StockID, s.Description, s.QuantityInStockRoom, s.ReorderLevel, 
               s.CostPrice, s.ReorderQuantity, sup.Name AS SupplierName
        FROM Stock s
        JOIN Suppliers sup ON s.SupplierID = sup.SupplierID
        WHERE s.DeletedFlag = 0";
if (isset($_GET['supplier_id']) && (int)$_GET['supplier_id'] > 0) {
    $sql .= " AND s.SupplierID = " . (int) $_GET['supplier_id'];
}
$sql .= " ORDER BY s.Description";
$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error querying the database: ' . mysqli_error($con));
}
while ($row = mysqli_fetch_assoc($result)) {
    $stockID             = $row['StockID'];
    $description         = $row['Description'];
    $quantityInStockRoom = $row['QuantityInStockRoom'];
    $reorderLevel        = $row['ReorderLevel'];
    $supplierName        = $row['SupplierName'];
    $costPrice           = $row['CostPrice'];
    $reorderQuantity     = $row['ReorderQuantity'];    
    // Build a comma-separated string in the expected order.
    $optionValue = $stockID . ", " . $description . ", " . $quantityInStockRoom . ", " 
                 . $reorderLevel . ", " . $supplierName . ", " . $costPrice . ", " . $reorderQuantity;
    $selected = ($stockID === $selectedStockID) ? "selected" : "";
    echo "<option value='" . htmlspecialchars($optionValue) . "' $selected>" . htmlspecialchars($description) . "</option>";
}
mysqli_close($con);
?>


