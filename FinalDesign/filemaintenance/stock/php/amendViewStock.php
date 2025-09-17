<!--
    Name of screen: 	amendViewStock.php
    Purpose of screen: 	Proccess the amend/view form submissions and creates a success/failure message.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php
// Start the session to enable flash messaging.
session_start();
// Include the database connection settings.
include 'db.inc.php';
// Set the default time zone to UTC.
date_default_timezone_set('UTC');
// Sanitize the form input values to prevent SQL injection.
// These values correspond to the input names in the HTML form.
$stockId = mysqli_real_escape_string($con, $_POST['amendStockId']);
$description = mysqli_real_escape_string($con, $_POST['amendDescription']);
$costPrice = mysqli_real_escape_string($con, $_POST['amendCostPrice']);
$retailPrice = mysqli_real_escape_string($con, $_POST['amendRetailPrice']);
$supplier = mysqli_real_escape_string($con, $_POST['amendSupplier']);
$reorderQty = mysqli_real_escape_string($con, $_POST['amendReorderQuantity']);
$reorderLvl = mysqli_real_escape_string($con, $_POST['amendReorderLevel']);
$supplierStockCode = mysqli_real_escape_string($con, $_POST['amendSupplierStockCode']);
$quantityInStock = mysqli_real_escape_string($con, $_POST['amendQuantityInStockRoom']);
// Prepare the SQL query to update the Stock record with the amended details.
// Adjust the column names if they differ in your actual database schema.
$sql = "UPDATE Stock SET 
                Description = '$description',
                CostPrice = '$costPrice',
                RetailPrice = '$retailPrice',
                SupplierID = '$supplier',
                ReorderQuantity = '$reorderQty',
                ReorderLevel = '$reorderLvl',
                SupplierStockCode = '$supplierStockCode',
                QuantityInStockRoom = '$quantityInStock',
                DateLastUpdate = NOW()  
            WHERE StockID = '$stockId'";

// Execute the query and check for errors.
if (!mysqli_query($con, $sql)) {
    // If the query fails, set a flash message with the error details.
    $_SESSION['msg'] = "Error: " . mysqli_error($con);
    $_SESSION['msg_type'] = "error";
} else {
    // If the query succeeds, check if any records were updated.
    if (mysqli_affected_rows($con) > 0) {
        // Set a success flash message including the stock ID and description.
        $_SESSION['msg'] = "Stock Item ID $stockId (" . htmlspecialchars($description) . ") has been updated.";
        $_SESSION['msg_type'] = "success";
    } else {
        // If no records were changed, set an error flash message.
        $_SESSION['msg'] = "No records were changed.";
        $_SESSION['msg_type'] = "error";
    }
}
// Close the database connection.
mysqli_close($con);
// Redirect back to the Amend/View Stock page where the flash message will be displayed.
header("Location: ../amendViewStock.html.php");
exit();
?>