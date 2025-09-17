<!-- If there's a generic flash message (error or success), display it. -->
		<?php if (!empty($flashMessage)) { ?>
			<div class="<?php echo $className; ?>" id="flashMessage">
				<?php echo htmlspecialchars($flashMessage); ?>
			</div>
			<script>
				setTimeout(function () {
					var flashDiv = document.getElementById('flashMessage');
					if (flashDiv) {
						flashDiv.style.display = 'none';
					}
				}, 5000);
			</script>
		<?php } ?>
		<!-- If there's a completed order summary, display the success message. -->
		<?php if (!empty($orderSummary)) { ?>
			<div class="place-orders-success">
				<h3>Order #<?php echo htmlspecialchars($orderSummary['OrderID']); ?> Confirmation</h3>
				<p><strong>Date Ordered:</strong>
					<?php
					// Format the date: d/m/Y H:i
					echo date('d/m/Y H:i', strtotime($orderSummary['DateOfOrder']));
					?>
				</p>
				<p><strong>Supplier:</strong>
					<?php echo htmlspecialchars($orderSummary['SupplierName']); ?>
				</p>
				<p><strong>Total Cost:</strong>
					€<?php echo number_format($orderSummary['TotalCost'], 2); ?>
				</p>
				<div class="place-orders-order-items">
					<h4>Ordered Items:</h4>
					<ul>
						<?php foreach ($orderSummary['Items'] as $item) { ?>
							<li>
								<?php echo htmlspecialchars($item['Description']); ?> -
								Quantity: <?php echo (int) $item['OrderQuantity']; ?> -
								Total: €<?php echo number_format($item['ItemCost'], 2); ?>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<script>
				// Hide the success message after 7 seconds
				setTimeout(function () {
					var successDiv = document.querySelector('.place-orders-success');
					if (successDiv) {
						successDiv.style.display = 'none';
					}
				}, 7000);
			</script>
		<?php } ?>