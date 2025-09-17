/*  Name of screen: 	formValidation.js
    Purpose of screen: 	Provides validation for the addstock.html.php forms fields as well as the confirmation prompt
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
*/
function checkPrice(input) {
    const value = parseFloat(input.value); // Convert the input value to a floating-point number
    if (isNaN(value)) {
        alert("Please enter a valid number!"); // Inform the user that a valid number is required
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    if (value < 0) {
        alert("The price cannot be less than zero!"); // Inform the user that negative numbers are not allowed
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    if (value > 5000) {
        alert("The price cannot be more than 5000!"); // Inform the user that icredibly large numbers are not allowed
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    // Optional: Enforce up to two decimal places
    if (!(/^\d+(\.\d{1,2})?$/.test(input.value))) {
        alert("Please enter a valid number with up to two decimal places!"); // Inform the user of the required format
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    input.style.borderColor = "green";  // Set the border colour to green if the input is valid
    return true;
}
function checkDescription(input) {
    const descr = input.value.trim(); // Trim any extra whitespace from the input value
    const pattern = /^(?!\d)(?=.{3,})(?=.*[A-Za-z])[A-Za-z0-9\s]+$/; //Same pattern as explained in addstock.html.php
    if (descr === "") {
        alert('Please enter a Description for the Stock Item!'); // Prompt the user to enter a description if the field is empty
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    } else if (!pattern.test(descr)) {
        alert("Description can only contain letters, numbers, and spaces!"); // Inform the user of the allowed characters
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    } else {
        input.style.borderColor = "green";  // Set the border colour to green if the input is valid
        return true;
    }
}
function checkSupplierCode(input) {
    const supCode = input.value.trim(); // Get the trimmed value of the input to remove any extra spaces
    const pattern = /^[A-Z]{4}[0-9]{3}$/; // Regular expression: matches exactly 4 uppercase letters followed by 3 digits
    if (supCode === "") { // Check if the supplier code field is empty
        alert('Please enter a Supplier Stock Code!'); // Prompt the user to enter a supplier stock code
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    } else if (!pattern.test(supCode)) { // Validate the supplier code against the required pattern
        alert("Supplier Stock Code must be 4 uppercase letters followed by 3 digits (e.g., TOWL001)!"); // Inform the user of the correct format
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    } else {
        input.style.borderColor = "green"; // Set the border colour to green if the input is valid
        return true;
    }
}
function checkNumber(input) {
    const value = parseInt(input.value, 10); // Convert the input value to an integer (base 10)
    if (isNaN(value) || !Number.isInteger(value)) {
        alert("Please enter a valid whole number!"); // Inform the user that a valid whole number is required
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    if (value < 1) {
        alert("The quantity cannot be less than one!"); // Inform the user that the quantity must be at least one
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    if (value > 200) {
        alert("The quantity cannot be more than 200!"); // Inform the user that the quantity cannot be more than 200
        input.style.borderColor = "red"; // Set the border colour to red to indicate an error
        return false;
    }
    input.style.borderColor = "green";  // Set the border colour to green if the input is valid
    return true;
}
function validateForm() {
    let isValid = true;
    // Validate the Description field
    const descriptionInput = document.getElementById('description');
    if (!checkDescription(descriptionInput)) {
        isValid = false;
    }
    // Validate the Cost Price field
    const costPriceInput = document.getElementById('costprice');
    if (!checkPrice(costPriceInput)) {
        isValid = false;
    }
    // Validate the Retail Price field
    const retailPriceInput = document.getElementById('retailprice');
    if (!checkPrice(retailPriceInput)) {
        isValid = false;
    }
    // Validate the Reorder Quantity field
    const reorderQtyInput = document.getElementById('reorderqty');
    if (!checkNumber(reorderQtyInput)) {
        isValid = false;
    }
    // Validate the Reorder Level field
    const reorderLvlInput = document.getElementById('reorderlvl');
    if (!checkNumber(reorderLvlInput)) {
        isValid = false;
    }
    if (!isValid) {
        alert("Please correct the errors in the form before submitting."); // Prompt the user to fix errors before submission
        return false;
    }
    return true;
}
function confirmSubmit() {
    // Display a confirmation prompt when the form is submitted.
    return confirm("Are you sure you want to add this stock item?");
}