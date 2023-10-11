<?php if (!is_front_page() && !is_404()): ?>
	<div class="breadcrumbs-container">
		<?php
			if (function_exists("yoast_breadcrumb")) {
				yoast_breadcrumb('<p class="breadcrumbs-content">', '</p>');
			}
		?>
	</div>
<?php endif; ?>