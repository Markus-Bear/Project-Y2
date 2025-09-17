<!--
	Name of screen:  	placeOrders.html.php
	Purpose of screen: 	Generates a form to allow the user to place orders for stock items.
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:      	March 2025
-->
<?php 
session_start();
// Include the file that contains order information functions and variables
include 'php/orderInformation.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place Orders</title>
  <link rel="stylesheet" href="../styles.css">
  <script src="placeOrders.js"></script>
</head>
<body>
  <!-- Burger icon that will toggle the sidebar -->
  <div class="burger-menu">&#9776;</div>
  <div class="place-orders-content">
	<!-- Container for the page header including the title and logo -->
    <div class="page-header">
      <h1>Place Orders</h1>
      <a href="../home.html.php">
        <img src="../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo">
      </a>
    </div>
	  <!-- Sidebar navigation -->
    <?php include '../sidebar.php'; ?>
	<!-- Include the flash message file to display notifications -->
    <?php include 'php/flashMessage.php'; ?>
    <div class="place-orders-container">
      <!-- Left side: Form area -->
      <div class="place-orders-form">
        <fieldset>
          <legend>Order Details</legend>
          <!-- Filter form (GET) for supplier selection -->
          <form id="filterForm" method="get" action="placeOrders.html.php">
			<div class="centered-select">
            <div class="inputbox">
              <label for="supplier_id">Filter by Supplier:</label>
              <select name="supplier_id" id="supplier_id" onchange="this.form.submit()">
                <option value="0" <?php if($supplierFilter == 0) echo 'selected'; ?>>-- All Suppliers --</option>
                <?php include 'php/supplierListbox.php'; ?>
              </select>
            </div>
			  </div>
            <!-- Clear any previous stock selection when the supplier changes -->
            <input type="hidden" name="stock_id" value="0">
          </form>
          <!-- Listbox for selecting a stock item -->
		  <div class="centered-select">
          <div class="inputbox">
            <label for="stockListbox">Select Stock Item:</label>
            <select name="stockListbox" id="stockListbox" onchange="populateOrderForm()">
              <option value="">-- Select an Item --</option>
              <?php include 'php/stockListbox.php'; ?>
            </select>
          </div>
			</div>
          <!-- Form to submit the order -->
          <form method="post" action="php/placeOrders.php">
			<!-- Hidden field to store the selected StockID -->
            <input type="hidden" name="stock_id" id="stock_id" value="">
            <div class="inputbox">
              <label>Description:</label>
			  <!-- Display the description of the selected stock item, if available -->
              <input type="text" id="description" value="" disabled>
            </div>
            <div class="inputbox">
              <label>Quantity in Stock Room:</label>
			  <!-- Display the quantity in the stock room for the selected item, if available -->
              <input type="text" id="quantityInStockRoom" value="" disabled>
            </div>
            <div class="inputbox">
              <label>Reorder Level:</label>
			  <!-- Display the reorder level for the selected stock item, if available -->
              <input type="text" id="reorderLevel" value="" disabled>
            </div>
            <div class="inputbox">
              <label>Supplier:</label>
			  <!-- Display the supplier name for the selected stock item, if available -->
              <input type="text" id="supplier" value="" disabled>
            </div>
            <div class="inputbox">
              <label>Cost Price (€):</label>
			  <!-- Display the cost price for the selected stock item -->
              <input type="text" id="costPrice" value="" disabled>
            </div>
            <div class="inputbox">
              <label>Order Quantity:</label>
			  <!-- Display the default order quantity for the selected stock item -->
              <input type="number" name="order_quantity" id="order_quantity" value="1" min="1" max="200"
                pattern="^[1-9]\d*$" title="Cannot be less than 1 or greater than 200." oninput="calculateCost()">
            </div>
            <div class="inputbox">
              <label>Total Cost (€):</label>
			  <!-- Display the calculated total cost based on the cost price and order quantity -->
              <span id="calculatedCost">0.00</span>
            </div>
			<!-- Submit buttons to either continue ordering or to finalise the order -->
            <div class="myButton">
              <input type="submit" name="action" value="Continue">
              <input type="submit" name="action" value="Done" onclick="return confirmDone();">
            </div>
          </form>
        </fieldset>
      </div>
<!-- Right side: Table area -->
<!-- This container holds the table that displays the current order items -->
<div class="place-orders-table">
  <!-- Heading for the order items table -->
  <h3>Current Order Items</h3>
  <!-- Begin table with the class "place-orders-table" for styling -->
  <table class="place-orders-table">
    <!-- Define the table header section -->
    <thead>
      <tr>
        <th>Description</th>
        <th>Quantity</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($orderItems)) { ?> <!-- Check if the $orderItems array is not empty -->
        <?php foreach ($orderItems as $item) { ?> <!-- Loop through each order item in the $orderItems array -->
          <tr>
            <!-- Output the order item's description (escaped for safety) -->
            <td><?php echo htmlspecialchars($item['Description']); ?></td>
            <!-- Output the order quantity as an integer -->
            <td><?php echo (int)$item['OrderQuantity']; ?></td>
            <!-- Output the item cost formatted as a number with two decimals and prefixed with the Euro symbol -->
            <td>€<?php echo number_format($item['ItemCost'], 2); ?></td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <!-- Display a single table row with a message spanning all three columns -->
        <tr>
          <td colspan="3">No items in current order</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
    </div>
  </div>
  <script src="../sidebar.js"></script>
</body>
</html>
