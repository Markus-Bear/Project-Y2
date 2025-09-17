<!--
	Name of screen: 	amendViewStock.html.php
	Purpose of screen: 	Generates a form to allow the user to amend a stock item in the Hotel database.
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:		February 2025
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> <!-- Specify character encoding as UTF-8 -->
	<title>Amend/View Stock</title> <!-- Title of the page -->
	<!-- Link to the main stylesheet -->
	<link rel="stylesheet" href="../../styles.css">
	<!-- Include external JavaScript for form validation -->
	<script src="formValidation.js"></script>
</head>
<body>
	<!-- Burger icon that will toggle the sidebar -->
	<div class="burger-menu">&#9776;</div>
	<!-- Page header with title and logo -->
	<div class="page-header">
		<h1>Amend/View Stock Items</h1> <!-- Main heading of the page -->
		<a href="../../home.html.php"><img src="../../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
	</div>
	<!-- Sidebar navigation -->
	<?php include '../../sidebar.php'; ?>
	<!-- Main content area for the 'Delete Stock' page -->
	<div class="content amend-view-page">
		<script src="amendStock.js"></script>
		<!-- Include the flash message for success or failure to add from an external PHP file -->
		<?php include 'php/flashMessage.php'; ?>
		<form action="php/amendViewStock.php" onsubmit="confirmAmend()" method="post">
			<fieldset>
				<legend>Stock Details</legend>
				<!-- Container for the stock listbox populated via PHP -->
				<div class="centered-select">
					<div class="inputbox">
						<?php include 'php/amendViewStockList.php'; ?>
						<!-- Include PHP file to generate the stock listbox -->
					</div>
				</div>
				<div class="columns">
					<div class="left-column">
						<!-- Container for the Stock ID input field -->
						<div class="inputbox">
							<label for="amendStockId">Stock ID:</label>
							<input type="text" name="amendStockId" id="amendStockId" placeholder="Stock ID" required
								disabled>
						</div>
						<!-- Input field for Stock Description -->
						<!-- https://www.regular-expressions.info/lookaround.html
					 https://stackoverflow.com/questions/3802192/regexp-java-for-password-validation 
					 Pattern Explanation:
						^(?!\d)
						This negative lookahead ensures the string does not start with a digit.
						Example: "1Car battery" will be rejected because it starts with "1".
						(?=.{3,})
						Asserts that the entire string is at least 3 characters long.
						(?=.*[A-Za-z])
						Requires that there is at least one letter somewhere in the string.
						[A-Za-z0-9\s]+$
						Matches only letters, digits, and whitespace for the entire string.-->
						<div class="inputbox">
							<label for="amendDescription">Description:</label>
							<input type="text" name="amendDescription" id="amendDescription"
								pattern="^(?!\d)(?=.{3,})(?=.*[A-Za-z])[A-Za-z0-9\s]+$"
								title="Just a short description of the stock item." placeholder="Stock Description."
								onchange="checkDescription(this)" required disabled>
						</div>
						<!-- Container for the Cost Price input field -->
						<div class="inputbox">
							<label for="amendCostPrice">Cost Price:</label>
							<input type="text" name="amendCostPrice" id="amendCostPrice" placeholder="Stock Cost Price."
								title="Enter a number with up to 2 decimal places. Max 5000. Cannot be a negative number."
								pattern="^\d+(\.\d{1,2})?$" min="0.10" max="5000" step="0.01"
								onchange="checkPrice(this)" required disabled>
						</div>
						<!-- Container for the Retail Price input field -->
						<div class="inputbox">
							<label for="amendRetailPrice">Retail Price:</label>
							<input type="text" name="amendRetailPrice" id="amendRetailPrice"
								placeholder="Stock Retail Price."
								title="Enter a number with up to 2 decimal places. Max 5000. Cannot be a negative number."
								pattern="^\d+(\.\d{1,2})?$" min="0.10" max="5000" step="0.01"
								onchange="checkPrice(this)" required disabled>
						</div>
						<!-- Container for the Supplier Name listbox-->
						<div class="inputbox">
							<label for="amendSupplier">Supplier:</label>
							<select name="amendSupplier" id="amendSupplier" required disabled>
								<option value="" disabled selected>Select a Supplier</option>
								<!-- Include the supplier list options from an external PHP file -->
								<?php include 'php/supplierListbox.php'; ?>
							</select>
						</div>
					</div>
					<div class="right-column">
						<!-- Container for the Reorder Quantity input field -->
						<div class="inputbox">
							<label for="amendReorderQuantity">Reorder Quantity:</label>
							<input type="text" name="amendReorderQuantity" id="amendReorderQuantity"
								onchange="checkNumber(this)" placeholder="Stock Reorder Quantity" required disabled>
						</div>
						<!-- Container for the Reorder Level input field -->
						<div class="inputbox">
							<label for="amendReorderLevel">Reorder Level:</label>
							<input type="text" name="amendReorderLevel" id="amendReorderLevel"
								placeholder="Stock Reorder Level." pattern="^[1-9]\d*$"
								title="Cannot be less than 1 or greater 200." min="1" max="200"
								onchange="checkNumber(this)" required disabled>
						</div>
						<!-- Container for the Supplier’s Stock Code input field -->
						<div class="inputbox">
							<label for="amendSupplierStockCode">Supplier’s Stock Code:</label>
							<input type="text" name="amendSupplierStockCode" id="amendSupplierStockCode"
								placeholder="Supplier Stock Code."
								title="Must be 4 uppercase letters followed by 3 digits. e.g. TOWL001."
								pattern="^[A-Z]{4}[0-9]{3}$" onchange="checkSupplierCode(this)" required disabled>
						</div>
						<!-- Container for the Quantity in Stock Room input field -->
						<div class="inputbox">
							<label for="amendQuantityInStockRoom">Quantity in Stock Room:</label>
							<input type="text" name="amendQuantityInStockRoom" id="amendQuantityInStockRoom"
								placeholder="Quantity in Stock Room" disabled>
						</div>
						<!-- Container for the Date of Last Update input field -->
						<div class="inputbox">
							<label for="amendDateLastUpdate">Date of Last Update:</label>
							<input type="text" name="amendDateLastUpdate" id="amendDateLastUpdate"
								placeholder="Date of Last Update" disabled>
						</div>
					</div>
				</div>
			</fieldset>
			<!-- Container for the Amend Details and Save Changes buttons (Save changes is default submit with "Save Changes" value) -->
			<div class="myButton">
				<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
				<input type="submit" value="Save Changes" onclick="return validateForm()">
			</div>
		</form>
	</div>
	<script src="../../sidebar.js"></script>
</body>
</html>