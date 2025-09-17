<!--
    Name of screen: 	deleteStock.php
    Purpose of screen: 	Has the php required to delete stock from database. Is called by deleteStock.php.html
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php
// Start the session to allow using session variables.
session_start();
// Include the database connection file.
include 'db.inc.php';
// Set the default timezone to UTC.
date_default_timezone_set('UTC');
/* Reference: https://www.phptutorial.net/php-tutorial/php-flash-messages/
   Check if a stock item has been selected from the form.
   If 'stockid' is not set or is empty, set an error message and redirect.*/
if (!isset($_POST['stockid']) || empty($_POST['stockid'])) {
    $_SESSION['delete_msg'] = "No stock item was selected.";
    $_SESSION['delete_type'] = "error";
    header("Location: ../deleteStock.html.php");
    exit();
}
/* Sanitize the received stock ID to prevent SQL injection.
   Reference: https://www.w3schools.com/php/func_mysqli_real_escape_string.asp*/
$stockid = mysqli_real_escape_string($con, $_POST['stockid']);
/* Prepare a query to check if the stock item exists and is not already deleted.
   Also retrieve the 'QuantityInStockRoom' and 'Description' (stock name) for further checks and display.*/
$sql_check = "SELECT QuantityInStockRoom, Description 
                  FROM Stock 
                  WHERE StockID = '$stockid' AND DeletedFlag = 0";
// Execute the query.
$result = mysqli_query($con, $sql_check);
// If the query fails, set an error flash message and redirect.
if (!$result) {
    $_SESSION['delete_msg'] = "Error: " . mysqli_error($con);
    $_SESSION['delete_type'] = "error";
    header("Location: ../deleteStock.html.php");
    exit();
}
// If no matching stock item is found, set an error message and redirect.
if (mysqli_num_rows($result) == 0) {
    $_SESSION['delete_msg'] = "Stock item not found or already deleted.";
    $_SESSION['delete_type'] = "error";
    header("Location: ../deleteStock.html.php");
    exit();
}
// Fetch the stock item details as an associative array.
$row = mysqli_fetch_assoc($result);
// If the Quantity in Stock Room is greater than zero, deletion is not permitted.
if ($row['QuantityInStockRoom'] > 0) {
    $_SESSION['delete_msg'] = "Cannot delete this stock item as Quantity in Stock Room is greater than zero.";
    $_SESSION['delete_type'] = "error";
    header("Location: ../deleteStock.html.php");
    exit();
}

// Prepare the SQL query to mark the stock item as deleted.
// This sets the 'DeletedFlag' to 1 and updates the 'DateLastUpdate' to the current date.
$sql = "UPDATE Stock 
            SET DeletedFlag = 1, DateLastUpdate = NOW() 
            WHERE StockID = '$stockid'";
// Execute the deletion query.
if (!mysqli_query($con, $sql)) {
    // If the query fails, set an error flash message.
    $_SESSION['delete_msg'] = "Error: " . mysqli_error($con);
    $_SESSION['delete_type'] = "error";
} else {
    // Check if any records were actually updated.
    if (mysqli_affected_rows($con) > 0) {
        // If deletion was successful, set a success message that includes both the stock ID and description.
        $_SESSION['delete_msg'] = "Stock Item ID $stockid (" . htmlspecialchars($row['Description']) . ") has been marked as deleted.";
        $_SESSION['delete_type'] = "success";
    } else {
        // If no records were updated, set an error message.
        $_SESSION['delete_msg'] = "No records were changed.";
        $_SESSION['delete_type'] = "error";
    }
}
// Close the database connection.
mysqli_close($con);
// Redirect back to the deleteStock.html.php page so that the flash message can be displayed.
header("Location: ../deleteStock.html.php");
exit();
?>