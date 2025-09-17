<!--
    Name of screen: 	flashMessage.php
    Purpose of screen: 	Displays the success or failure messagges for add, delete and amend pages
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		March 2025
-->
<!-- Reference: https://www.phptutorial.net/php-tutorial/php-flash-messages/ -->
<!-- Check if a flash message is set in the session -->
<?php if (isset($_SESSION['msg'])): ?>
    <?php
    // Determine the CSS class based on the type of message.
    // If msg_type is set to 'error', use the 'error' class; otherwise, use 'success'.
    if (isset($_SESSION['msg_type']) && $_SESSION['msg_type'] === 'error') {
        $className = 'error';
    } else {
        $className = 'success';
    }
    ?>
    <!-- Display the flash message in a div with the determined CSS class -->
    <div class="<?php echo $className; ?>" id="flashMessage">
        <?php
        echo htmlspecialchars($_SESSION['msg']);
        // Clear the message and its type from the session so they won't persist
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);
        ?>
    </div>
    <!-- JavaScript to automatically hide the flash message after 5 seconds -->
    <script>
        setTimeout(function () {
            const flashMsg = document.getElementById('flashMessage');
            if (flashMsg) {
                flashMsg.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>
<?php endif; ?>
<!-- Reference: https://www.phptutorial.net/php-tutorial/php-flash-messages/ --><!-- Check if the flash message is set in the session --><?php if (isset($_SESSION['delete_msg'])): ?>
<?php
// Determine which CSS class to use based on the type of message.
// If the session variable 'delete_type' is 'error', use the 'error' class.
if ($_SESSION['delete_type'] == 'error') {
	$className = 'error';
} else {
	// Otherwise, use the 'success' class.
	$className = 'success';
}
?>
<!-- Output the flash message container with the determined class and an ID for JavaScript targeting -->
<div class="<?php echo $className; ?>" id="deleteMessage">
	<?php
	// Display the flash message text, ensuring it is safe for output.
	echo htmlspecialchars($_SESSION['delete_msg']);
	// Remove the flash message and its type from the session so it doesn't persist.
	unset($_SESSION['delete_msg']);
	unset($_SESSION['delete_type']);
	?>
</div>
<!-- JavaScript to hide the flash message after 5 seconds -->
<script>
	setTimeout(function () {
		// Get the message container by its ID.
		const deleteMsg = document.getElementById('deleteMessage');
		// If the element exists, hide it by setting its display style to 'none'.
		if (deleteMsg) {
			deleteMsg.style.display = 'none';
		}
	}, 5000); // 5000 milliseconds = 5 seconds
</script><?php endif; ?>
