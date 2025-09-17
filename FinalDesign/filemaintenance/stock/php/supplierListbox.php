<!--
    Name of screen: 	supplierListbox.php
    Purpose of screen: 	Generates the listbox for suppliers that are in the Supplier table in the Hotel database. 
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
<?php
// Include the database connection file
include 'db.inc.php';
// Prepare the SQL query to select active suppliers (where DeletedFlag equals 0)
$sql = "SELECT SupplierID, Name FROM Suppliers WHERE DeletedFlag = 0";
// Execute the SQL query and store the result
$result = mysqli_query($con, $sql);
// Check if the query returned any rows
if ($result && mysqli_num_rows($result) > 0) {
    // Loop through each supplier record
    while ($row = mysqli_fetch_assoc($result)) {
        // Output an HTML <option> element with the SupplierID as the value
        // and the Supplier Name as the visible text, escaping any special characters
        echo "<option value='" . htmlspecialchars($row['SupplierID']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
    }
} else {
    // If no suppliers are found, output a disabled option indicating that no suppliers are available
    echo "<option value='' disabled>No suppliers available.</option>";
}
?>