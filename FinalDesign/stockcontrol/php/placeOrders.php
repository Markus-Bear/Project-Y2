<!--
    Name of screen:     placeOrders.php
    Purpose of screen:  Processes the order form submissions, adds items to session, completes orders,
                        and creates an $orderSummary for display on placeOrders.html.php.
    Student ID:         C00166672
    Name:               Mark Mukiiza
    Date Written:       March 2025
-->
<?php
session_start();
include_once '../../db.inc.php';
// Ensure our session order array is ready
if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = array();
}
$error = ''; // Will store any error messages
$action = isset($_POST['action']) ? $_POST['action'] : '';
$stockID = isset($_POST['stock_id']) ? (int) $_POST['stock_id'] : 0;
$orderQuantity = isset($_POST['order_quantity']) ? (int) $_POST['order_quantity'] : 0;
if ($action === 'Continue') {
    if ($stockID < 1) {
        $error = "No stock item selected. Please choose a valid stock item.";
    } else {
        // Fetch selected stock details from the database
        $sql = "SELECT s.StockID, s.Description, s.CostPrice, s.SupplierID, sup.Name AS SupplierName
                FROM Stock s
                JOIN Suppliers sup ON s.SupplierID = sup.SupplierID
                WHERE s.StockID = $stockID 
                  AND s.DeletedFlag = 0";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $stock = mysqli_fetch_assoc($result);
            // Check if the new item's supplier conflicts with existing order items
            if (!empty($_SESSION['order'])) {
                $firstItem = $_SESSION['order'][0];
                if ($firstItem['SupplierID'] !== $stock['SupplierID']) {
                    $error = "All items must be from the same supplier: " . htmlspecialchars($firstItem['SupplierName']);
                }
            }
            if (empty($error)) {
                $itemCost = $stock['CostPrice'] * $orderQuantity;
                $_SESSION['order'][] = array(
                    'StockID'      => $stock['StockID'],
                    'Description'  => $stock['Description'],
                    'OrderQuantity'=> $orderQuantity,
                    'CostPrice'    => $stock['CostPrice'],
                    'ItemCost'     => $itemCost,
                    'SupplierID'   => $stock['SupplierID'],
                    'SupplierName' => $stock['SupplierName']
                );
            }
        } else {
            $error = "Invalid stock item selected.";
        }
    }
} elseif ($action === 'Done') {
    // Finalize the order
    if (empty($_SESSION['order'])) {
        $error = "Cannot complete an empty order!";
    } else {
        $firstItem = $_SESSION['order'][0];
        $stockID = $firstItem['StockID'];
        // Calculate total cost
        $totalCost = 0;
        foreach ($_SESSION['order'] as $item) {
            $totalCost += $item['ItemCost'];
        }
        // Insert the order into the Orders table
        $insertOrderSql = "INSERT INTO Orders (StockID, DateOfOrder, TotalCost) 
                           VALUES ($stockID, NOW(), $totalCost)";
        $insertOrderRes = mysqli_query($con, $insertOrderSql);
        if (!$insertOrderRes) {
            $error = "Failed to insert into Orders: " . mysqli_error($con);
        } else {
            $orderID = mysqli_insert_id($con);
            // Insert each item into the OrderItems table
            foreach ($_SESSION['order'] as $item) {
                $insertItemsSql = "INSERT INTO OrderItems
                                   (OrderID, StockID, SupplierID, QuantityOrdered)
                                   VALUES (
                                       $orderID,
                                       " . (int)$item['StockID'] . ",
                                       " . (int)$item['SupplierID'] . ",
                                       " . (int)$item['OrderQuantity'] . "
                                   )";
                $execItems = mysqli_query($con, $insertItemsSql);
                if (!$execItems) {
                    $error = "Failed to insert order item: " . mysqli_error($con);
                    break;
                }
            }
            if (empty($error)) {
                // Retrieve the DateOfOrder just inserted
                $dateQuery = "SELECT DateOfOrder FROM Orders WHERE OrderID = $orderID";
                $dateResult = mysqli_query($con, $dateQuery);
                $dateOfOrder = '';
                if ($dateResult && mysqli_num_rows($dateResult) > 0) {
                    $row = mysqli_fetch_assoc($dateResult);
                    $dateOfOrder = $row['DateOfOrder'];
                }
                // Build an order summary array for display
                $orderSummary = array(
                    'OrderID'      => $orderID,
                    'DateOfOrder'  => $dateOfOrder,
                    'SupplierName' => $firstItem['SupplierName'],
                    'TotalCost'    => $totalCost,
                    'Items'        => $_SESSION['order']
                );
                $_SESSION['orderSummary'] = $orderSummary;
                // Clear the order array
                $_SESSION['order'] = array();
            }
        }
    }
}
// If there's an error, store it in session for display
if (!empty($error)) {
    $_SESSION['msg'] = $error;
    $_SESSION['msg_type'] = 'error';
}
mysqli_close($con);
header("Location: ../placeOrders.html.php");
exit;
?>