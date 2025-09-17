<!--
    Name of screen: 	supplierListbox.php
    Purpose of screen: 	Generates the listbox for suppliers that are in the Supplier table in the Hotel database. 
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		March 2025
-->
<?php
// Include the database connection file.
include '../../db.inc.php';
// Determine the currently selected supplier from GET parameters.
$supplierFilter = 0;
if (isset($_GET['supplier_id'])) {
    $supplierFilter = (int) $_GET['supplier_id'];
}
// Prepare the SQL query to select active suppliers, ordered by Name.
$sql = "SELECT SupplierID, Name FROM Suppliers WHERE DeletedFlag = 0 ORDER BY Name";
$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $supplierID = (int)$row['SupplierID'];
        $supplierName = $row['Name'];
        $selected = ($supplierID === $supplierFilter) ? "selected" : "";
        echo "<option value='" . htmlspecialchars($supplierID) . "' $selected>" . htmlspecialchars($supplierName) . "</option>";
    }
} else {
    echo "<option value='' disabled>No suppliers available.</option>";
}
mysqli_close($con);
?>


