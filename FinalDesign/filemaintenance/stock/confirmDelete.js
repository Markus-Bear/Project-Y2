/*
    Name of screen: 	confirmDelete.js
    Purpose of screen: 	Populates Delete form and confirms deletion.
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025

 When an item is selected in the listbox, populate the form fields.
 The expected order in the option's value is: 
 StockID, Description, Quantity in Stock Room, Supplier Name.*/
function populate() {
	var sel = document.getElementById("listbox"); // Get the listbox element by its ID
	var result = sel.options[sel.selectedIndex].value; // Retrieve the value of the selected option
	if (result === "") {
		document.getElementById("stockid").value = ""; // Clear the Stock ID field
		document.getElementById("description").value = ""; // Clear the Description field
		document.getElementById("quantity").value = ""; // Clear the Quantity field
		document.getElementById("supplier").value = ""; // Clear the Supplier Name field
		return;
	}
	var stockDetails = result.split(', '); // Split the selected value into an array of details
	document.getElementById("stockid").value = stockDetails[0]; // Populate the Stock ID field
	document.getElementById("description").value = stockDetails[1]; // Populate the Description field
	document.getElementById("quantity").value = stockDetails[2]; // Populate the Quantity field
	document.getElementById("supplier").value = stockDetails[3]; // Populate the Supplier Name field
}
/* Before deletion, verify that the Quantity in Stock Room is 0.
   If it is, prompt the user for confirmation.*/
function confirmDelete() {
    var qty = parseInt(document.getElementById("quantity").value, 10); // Convert the Quantity value to an integer
    if (qty > 0) {
        alert("Cannot delete this stock item because the Quantity in Stock Room is greater than zero."); // Alert the user if quantity is above zero
        return false; // Prevent form submission
    }
    var response = confirm('Are you sure you want to delete this item?'); // Ask the user for confirmation
    if (response) {
        // Re-enable the Stock ID field so its value is submitted.
        document.getElementById("stockid").disabled = false; // Enable the Stock ID field for submission
        return true; // Allow form submission
    } else {
        // If cancelled, re-populate to re-display the current values.
        populate(); // Re-populate the form fields with the selected details
        return false; // Prevent form submission
    }
}