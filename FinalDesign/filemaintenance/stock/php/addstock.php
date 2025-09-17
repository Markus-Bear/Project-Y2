<!--
    Name of screen: 	addstock.php
    Purpose of screen: 	Processes the add stock form submissions and creates a success/failure message
                        for display on addstock.html.php
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
date_default_timezone_set("UTC");
// Sanitize user input to prevent SQL injection.
// Reference: https://www.w3schools.com/php/func_mysqli_real_escape_string.asp
$description = mysqli_real_escape_string($con, $_POST['description']);
$costPrice = mysqli_real_escape_string($con, $_POST['costprice']);
$retailPrice = mysqli_real_escape_string($con, $_POST['retailprice']);
$reorderQty = mysqli_real_escape_string($con, $_POST['reorderqty']);
$reorderLvl = mysqli_real_escape_string($con, $_POST['reorderlvl']);
$supplierCode = mysqli_real_escape_string($con, $_POST['suppliercode']);
$supplier = mysqli_real_escape_string($con, $_POST['supplier']);
// Prepare the SQL query to insert the new stock record into the database.
$sql = "INSERT INTO Stock (Description, CostPrice, RetailPrice, ReorderQuantity, ReorderLevel, SupplierStockCode, SupplierID) 
            VALUES ('$description', '$costPrice', '$retailPrice', '$reorderQty', '$reorderLvl', '$supplierCode', '$supplier')";
// Execute the SQL query.
if (!mysqli_query($con, $sql)) {
    // If the query fails, set a flash message indicating the error.
    $_SESSION['msg'] = "An error occurred in the SQL Query: " . mysqli_error($con);
    $_SESSION['msg_type'] = "error";
    // Close the database connection.
    mysqli_close($con);
    // Redirect back to the add stock form page.
    header("Location: ../addstock.html.php");
    exit();
} else {
    // If the query is successful, set a flash message indicating success.
    $_SESSION['msg'] = "Stock Item $description has been added.";
    $_SESSION['msg_type'] = "success";
    // Close the database connection.
    mysqli_close($con);
    // Redirect back to the add stock form page.
    header("Location: ../addstock.html.php");
    exit();
}
?>