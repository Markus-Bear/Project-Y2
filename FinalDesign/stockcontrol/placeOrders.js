/*	Name of screen: 	placeOrders.js
	Purpose of screen: 	Javascript for populating the order form as well as calculating the total cost
						of the item selected. Also confirms if the order is done. 
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:		March 2025
*/
// Populates the order form fields based on the selected stock item.
function populateOrderForm() {
  var sel = document.getElementById("stockListbox"); // Retrieve the stock listbox element by its ID.
  var result = sel.options[sel.selectedIndex].value; // Get the value of the currently selected option.
  if (result === "") { // If no option is selected, clear all fields.
    document.getElementById("stock_id").value = ""; // Clear the hidden Stock ID field.
    document.getElementById("description").value = ""; // Clear the Description field.
    document.getElementById("quantityInStockRoom").value = ""; // Clear the Quantity in Stock Room field.
    document.getElementById("reorderLevel").value = ""; // Clear the Reorder Level field.
    document.getElementById("supplier").value = ""; // Clear the Supplier field.
    document.getElementById("costPrice").value = ""; // Clear the Cost Price field.
    document.getElementById("order_quantity").value = "1"; // Reset the Order Quantity field to 1.
    document.getElementById("calculatedCost").innerText = "0.00"; // Reset the Total Cost display to 0.00.
    return; // Exit the function as there is nothing to populate.
  }
  // Expected format: "StockID, Description, QuantityInStockRoom, ReorderLevel, SupplierName, CostPrice, ReorderQuantity"
  var details = result.split(", "); // Divide the string into its constituent stock details.
  document.getElementById("stock_id").value = details[0]; // Set the Stock ID field.
  document.getElementById("description").value = details[1]; // Set the Description field.
  document.getElementById("quantityInStockRoom").value = details[2]; // Set the Quantity in Stock Room field.
  document.getElementById("reorderLevel").value = details[3]; // Set the Reorder Level field.
  document.getElementById("supplier").value = details[4]; // Set the Supplier field.
  document.getElementById("costPrice").value = details[5]; // Set the Cost Price field.
  document.getElementById("order_quantity").value = details[6]; // Set the Order Quantity field.
  var totalCost = parseFloat(details[5]) * parseInt(details[6]); // Calculate the total cost by multiplying cost price by order quantity.
  document.getElementById("calculatedCost").innerText = totalCost.toFixed(2); // Display the total cost, formatted to two decimal places.
}

// Recalculates the total cost when the order quantity changes.
function calculateCost() {
  // Retrieve the cost price and convert it to a float, defaulting to 0.
	var costPrice = parseFloat(document.getElementById("costPrice").value) || 0; 
  // Retrieve the order quantity and convert it to an integer, defaulting to 0.
	var quantity  = parseInt(document.getElementById("order_quantity").value) || 0; 
	var total     = costPrice * quantity; // Calculate the total cost.
  document.getElementById("calculatedCost").innerText = total.toFixed(2); // Update the Total Cost display with the calculated value.
}
// Confirmation function for the "Done" button.
function confirmDone() {
  return confirm("Are you sure you want to finalise this order?"); // Prompt the user for confirmation and return the result.
}
