<!--
	Name of screen: 	deleteStock.html.php
	Purpose of screen: 	Allows user to select stock from a listbox to delete from database if the quantity in store room is 0. (Sets 								DeletedFlag to 1 which is deleted.)
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:		February 2025
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> <!-- Specify character encoding as UTF-8 -->
	<title>Delete Stock</title> <!-- Title of the page -->
	<!-- Link to the main stylesheet -->
	<link rel="stylesheet" href="../../styles.css">
</head>
<body>
	<!-- Burger icon that will toggle the sidebar -->
	<div class="burger-menu">&#9776;</div>
	<!-- Container for the page header (title and logo) -->
	<div class="page-header">
		<h1>Delete a Stock Item</h1> <!-- Main heading of the page -->
		<a href="../../home.html.php"><img src="../../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
	</div>
	<!-- Sidebar navigation -->
	<?php include '../../sidebar.php'; ?>
	<!-- Main content area for the 'Delete Stock' page -->
	<div class="content delete-page">
			<script src="confirmDelete.js"></script>
		<!-- Include the flash message for success or failure to add from an external PHP file -->
		<?php include 'php/flashMessage.php'; ?>
		<!-- Form for deleting a stock item -->
		<form action="php/deleteStock.php" onsubmit="return confirmDelete()" method="post">
			<fieldset> <!-- Group related form elements -->
				<legend>Stock Details</legend> <!-- Caption for the fieldset -->
				<p><small>(Note: Only items with a Quantity in Stock Room of 0 can be deleted.)</small></p>
				<!-- Container for the listbox populated via PHP -->
				<div class="inputbox">
					<?php include 'php/deleteStockListbox.php'; ?> <!-- Include PHP file to generate the stock listbox -->
				</div>
				<!-- Input field for Stock ID -->
				<div class="inputbox">
					<label for="stockid">Stock ID</label> <!-- Label for the Stock ID field -->
					<input type="text" name="stockid" id="stockid" disabled> <!-- Disabled input for Stock ID -->
				</div>
				<!-- Input field for Description -->
				<div class="inputbox">
					<label for="description">Description</label> <!-- Label for the Description field -->
					<input type="text" name="description" id="description" disabled>
					<!-- Disabled input for Description -->
				</div>
				<!-- Input field for Quantity in Stock -->
				<div class="inputbox">
					<label for="quantity">Quantity in Stock Room</label> <!-- Label for the Quantity field -->
					<input type="text" name="quantity" id="quantity" disabled> <!-- Disabled input for Quantity -->
				</div>
				<!-- Input field for Supplier Name -->
				<div class="inputbox">
					<label for="supplier">Supplier Name</label> <!-- Label for the Supplier Name field -->
					<input type="text" name="supplier" id="supplier" disabled> <!-- Disabled input for Supplier Name -->
				</div>
			</fieldset>
			<!-- Container for the delete button (single-button form) -->
			<div class="deleteButton">
				<input type="submit" value="Delete Item"> <!-- Submit button to delete the stock item -->
			</div>
		</form>
	</div>
	<script src="../../sidebar.js"></script>
</body>
</html>