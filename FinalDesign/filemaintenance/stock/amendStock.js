/*
    Name of screen: 	amendStock.js
    Purpose of screen: 	Populates form, toggles the disabled state of the input fields and also 
						confirms form submission for Amend/View Stock page.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
*/
// Populates the form fields when a stock item is selected from the listbox.
function populate() {
    var sel = document.getElementById("listbox"); // Retrieve the listbox element by its ID.
    var result = sel.options[sel.selectedIndex].value; // Get the value of the currently selected option.
    // If nothing is selected, clear all fields
    if (result === "") {
        document.getElementById("amendStockId").value = ""; // Clear the Stock ID field.
        document.getElementById("amendDescription").value = ""; // Clear the Description field.
        document.getElementById("amendCostPrice").value = ""; // Clear the Cost Price field.
        document.getElementById("amendRetailPrice").value = ""; // Clear the Retail Price field.
        document.getElementById("amendSupplier").value = ""; // Clear the Supplier field.
        document.getElementById("amendReorderQuantity").value = ""; // Clear the Reorder Quantity field.
        document.getElementById("amendReorderLevel").value = ""; // Clear the Reorder Level field.
        document.getElementById("amendSupplierStockCode").value = ""; // Clear the Supplier Stock Code field.
        document.getElementById("amendQuantityInStockRoom").value = ""; // Clear the Quantity in Stock Room field.
        document.getElementById("amendDateLastUpdate").value = ""; // Clear the Date Last Update field.
        return; // Exit the function as there is nothing to populate.
    }
    // Split the selected option's value into an array (assuming comma+space separation)
    var stockDetails = result.split(', '); // Divide the string into its constituent stock details.
    document.getElementById("amendStockId").value = stockDetails[0]; // Set the Stock ID field.
    document.getElementById("amendDescription").value = stockDetails[1]; // Set the Description field.
    document.getElementById("amendCostPrice").value = stockDetails[2]; // Set the Cost Price field.
    document.getElementById("amendRetailPrice").value = stockDetails[3]; // Set the Retail Price field.
    document.getElementById("amendReorderQuantity").value = stockDetails[5]; // Set the Reorder Quantity field.
    document.getElementById("amendReorderLevel").value = stockDetails[6]; // Set the Reorder Level field.
    document.getElementById("amendSupplierStockCode").value = stockDetails[7]; // Set the Supplier Stock Code field.
    document.getElementById("amendQuantityInStockRoom").value = stockDetails[8]; // Set the Quantity in Stock Room field.
    document.getElementById("amendDateLastUpdate").value = stockDetails[9]; // Set the Date Last Update field.
    /* ChatGPT:
        This code searches through the supplier select options for the one whose visible text (the supplier name) matches the 
        name provided in your stock details. When it finds a match, it sets that option as selected. As a result, the select 
        box will show the correct supplier name, and when the form is submitted, the supplier id (stored in the option’s value) 
        is sent to your PHP code.
    */
    // After splitting the stock details
    var supplierName = stockDetails[4].trim(); // Extract and trim the supplier name from the details.
    var supplierSelect = document.getElementById("amendSupplier"); // Retrieve the supplier select element.
    // Loop through the options to find a match on the displayed text
    for (var i = 0; i < supplierSelect.options.length; i++) {
        if (supplierSelect.options[i].text.trim() === supplierName) { // Compare each option's text with the supplier name.
            supplierSelect.selectedIndex = i; // Set the matching option as selected.
            break; // Exit the loop once a match is found.
        }
    }

}
function toggleLock() {
    var btn = document.getElementById("amendViewButton"); // Retrieve the amend view button element.
    if (document.getElementById("amendViewbutton").value === "Amend Details") { // Check if the button's value is "Amend Details".
        document.getElementById("amendDescription").disabled = false; // Enable the Description field.
        document.getElementById("amendCostPrice").disabled = false; // Enable the Cost Price field.
        document.getElementById("amendRetailPrice").disabled = false; // Enable the Retail Price field.
        document.getElementById("amendSupplier").disabled = false; // Enable the Supplier field.
        document.getElementById("amendReorderQuantity").disabled = false; // Enable the Reorder Quantity field.
        document.getElementById("amendReorderLevel").disabled = false; // Enable the Reorder Level field.
        document.getElementById("amendSupplierStockCode").disabled = false; // Enable the Supplier Stock Code field.
        document.getElementById("amendViewbutton").value = "View Details"; // Change the button value to "View Details".
    } else {
        document.getElementById("amendDescription").disabled = true; // Disable the Description field.
        document.getElementById("amendCostPrice").disabled = true; // Disable the Cost Price field.
        document.getElementById("amendRetailPrice").disabled = true; // Disable the Retail Price field.
        document.getElementById("amendSupplier").disabled = true; // Disable the Supplier field.
        document.getElementById("amendReorderQuantity").disabled = true; // Disable the Reorder Quantity field.
        document.getElementById("amendReorderLevel").disabled = true; // Disable the Reorder Level field.
        document.getElementById("amendSupplierStockCode").disabled = true; // Disable the Supplier Stock Code field.
        document.getElementById("amendViewbutton").value = "Amend Details"; // Revert the button value to "Amend Details".
    }
}
/* Before submitting this function confirms the action.
   If confirmed, it enables all fields so that their values are submitted.*/
function confirmAmend() {
    var response = confirm('Are you sure you want to amend the details of this item?'); // Prompt the user for confirmation.
    if (response) {
        // Enable all fields so their values are included in the form submission.
        document.getElementById("amendStockId").disabled = false;
        document.getElementById("amendDescription").disabled = false;
        document.getElementById("amendCostPrice").disabled = false;
        document.getElementById("amendRetailPrice").disabled = false;
        document.getElementById("amendSupplier").disabled = false;
        document.getElementById("amendReorderQuantity").disabled = false;
        document.getElementById("amendReorderLevel").disabled = false;
        document.getElementById("amendSupplierStockCode").disabled = false;
        document.getElementById("amendQuantityInStockRoom").disabled = false;
        document.getElementById("amendDateLastUpdate").disabled = false;
        return true; // Allow the form to be submitted.
    } else {
        // If the user cancels, re-populate the fields to reset any unsaved changes.
        populate();
        return false; // Prevent the form submission.
    }
}