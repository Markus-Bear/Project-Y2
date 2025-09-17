<!--
    Name of screen:     orderInformation.php
    Purpose of screen:  Retrieves session-based data and database records needed by the placeOrders.html.php file.
    Student ID:         C00166672
    Name:               Mark Mukiiza
    Date Written:       March 2025
-->
<?php
session_start();
include_once '../../db.inc.php';
/* Retrieve any session-based flash messages. */
$flashMessage = '';
$className = '';
if (isset($_SESSION['msg'])) {
    $flashMessage = $_SESSION['msg'];
    $className = (isset($_SESSION['msg_type']) && $_SESSION['msg_type'] === 'error') ? 'error' : 'success';
    unset($_SESSION['msg'], $_SESSION['msg_type']);
}
/* Retrieve an $orderSummary for display if an order was just completed. */
$orderSummary = null;
if (isset($_SESSION['orderSummary'])) {
    $orderSummary = $_SESSION['orderSummary'];
    unset($_SESSION['orderSummary']);
}
/* Optionally use a supplier filter from GET parameters. */
$supplierFilter = 0;
if (isset($_GET['supplier_id'])) {
    $supplierFilter = (int) $_GET['supplier_id'];
}
/* Although not used directly in this new design, we preserve the selected stock ID if needed. */
$selectedStockID = 0;
if (isset($_GET['stock_id'])) {
    $selectedStockID = (int) $_GET['stock_id'];
}
/* Retrieve supplier list (for an optional filter or display purposes). */
$supplierList = array();
$sqlSup = "SELECT SupplierID, Name FROM Suppliers WHERE DeletedFlag = 0 ORDER BY Name";
$resultSup = mysqli_query($con, $sqlSup);
if ($resultSup) {
    while ($row = mysqli_fetch_assoc($resultSup)) {
        $supplierList[] = $row;
    }
}
/* Retrieve the stock list with all details needed for the client-side listbox.
    (StockID, Description, QuantityInStockRoom, ReorderLevel, CostPrice, ReorderQuantity,
          and SupplierName.)
*/
$stockList = array();
$stockSql = "SELECT s.StockID, s.Description, s.QuantityInStockRoom, s.ReorderLevel, 
                   s.CostPrice, s.ReorderQuantity, sup.Name AS SupplierName
             FROM Stock s
             JOIN Suppliers sup ON s.SupplierID = sup.SupplierID
             WHERE s.DeletedFlag = 0";
if ($supplierFilter > 0) {
    $stockSql .= " AND s.SupplierID = " . (int)$supplierFilter;
}
$stockSql .= " ORDER BY s.Description";
$resultStock = mysqli_query($con, $stockSql);
if ($resultStock) {
    while ($row = mysqli_fetch_assoc($resultStock)) {
        $stockList[] = $row;
    }
}
/* The selectedStock is no longer pre-fetched since the client-side listbox will be used.
   However, you may keep this if you want an initial selection.
*/
$selectedStock = null;
/* Retrieve any current order items from the session to display them in the table. */
$orderItems = array();
if (isset($_SESSION['order']) && is_array($_SESSION['order'])) {
    $orderItems = $_SESSION['order'];
}
mysqli_close($con);
?>