<!--
    Name of screen: 	addstock.html.php
    Purpose of screen: 	Generates a form to allow the user to add a stock item to the Hotel database.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Stock</title>
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
        <h1>Add Stock</h1>
        <a href="../../home.html.php"><img src="../../C2PLogoNew.png" alt="C2P Hotel Logo" class="logo"></a>
    </div>
	<!-- Sidebar navigation -->
	<?php include '../../sidebar.php'; ?>
    <!-- Main content area for the 'Add Stock' page -->
    <div class="content add-page">
		<!-- Include the flash message for success or failure to add from an external PHP file -->
		<?php include 'php/flashMessage.php'; ?>
        <!-- Stock addition form -->
        <!-- The form uses both validation and a confirmation prompt on submission -->
        <form action="php/addstock.php" method="POST" onsubmit="return validateForm() && confirmSubmit()">
            <fieldset>
                <legend>Stock Details</legend>
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
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description"
                        pattern="^(?!\d)(?=.{3,})(?=.*[A-Za-z])[A-Za-z0-9\s]+$"
                        title="Just a short description of the stock item." placeholder="Enter Stock Description."
                        onchange="checkDescription(this)" autofocus required />
                </div>
                <!-- Input  field for Cost Price -->
                <!-- Pattern enforces a number with up to 2 decimal places -->
                <div class="inputbox">
                    <label for="costprice">Cost Price:</label>
                    <input type="number" name="costprice" id="costprice" placeholder="Enter Stock Cost Price."
                        title="Enter a number with up to 2 decimal places. Max 5000. Cannot be a negative number."
                        pattern="^\d+(\.\d{1,2})?$" min="0.10" max="5000" step="0.01" onchange="checkPrice(this)"
                        required />
                </div>
                <!-- Input field for Retail Price -->
                <!-- Pattern enforces a number with up to 2 decimal places -->
                <div class="inputbox">
                    <label for="retailprice">Retail Price:</label>
                    <input type="number" name="retailprice" id="retailprice" placeholder="Enter Stock Retail Price."
                        title="Enter a number with up to 2 decimal places. Max 5000. Cannot be a negative number."
                        pattern="^\d+(\.\d{1,2})?$" min="0.10" max="5000" step="0.01" onchange="checkPrice(this)"
                        required />
                </div>
                <!-- Supplier dropdown -->
                <div class="inputbox">
                    <label for="supplier">Supplier:</label>
                    <select name="supplier" id="supplier" required>
                        <option value="" disabled selected>Select a Supplier</option>
                        <!-- Include the supplier list options from an external PHP file -->
                        <?php include 'php/supplierListbox.php'; ?>
                    </select>
                </div>
                <!-- Input field for Supplier Stock Code -->
                <!-- Pattern enforces 4 Uppercase Letters followed by 3 numbers -->
                <div class="inputbox">
                    <label for="suppliercode">Supplier Stock Code:</label>
                    <input type="text" name="suppliercode" id="suppliercode" placeholder="Enter Supplier Stock Code."
                        title="Must be 4 uppercase letters followed by 3 digits. e.g. TOWL001."
                        pattern="^[A-Z]{4}[0-9]{3}$" onchange="checkSupplierCode(this)" required />
                </div>
                <!-- Input field for Reorder Quantity -->
                <!-- Pattern enforces a number thats greater than one and no more than 200 -->
                <div class="inputbox">
                    <label for="reorderqty">Reorder Quantity:</label>
                    <input type="number" name="reorderqty" id="reorderqty" placeholder="Enter Stock Reorder Quantity."
                        pattern="^[1-9]\d*$" title="Cannot be less than 1 or greater 200." min="1" max="200"
                        onchange="checkNumber(this)" required />
                </div>
                <!-- Input field for Reorder Level -->
                <!-- Pattern enforces a number thats greater than one and no more than 200 -->
                <div class="inputbox">
                    <label for="reorderlvl">Reorder Level:</label>
                    <input type="number" name="reorderlvl" id="reorderlvl" placeholder="Enter Stock Reorder Level."
                        pattern="^[1-9]\d*$" title="Cannot be less than 1 or greater 200." min="1" max="200"
                        onchange="checkNumber(this)" required />
                </div>
            </fieldset>
            <!-- Form buttons -->
            <div class="myButton">
                <!-- Submit button; the form will only be sent if validation and confirmation both return true -->
                <input type="submit" value="Add" name="submit" />
                <!-- Reset button to clear the form -->
                <input type="reset" value="Clear" name="reset" />
            </div>
        </form>
    </div>
    <script src="../../sidebar.js"></script>
</body>
</html>