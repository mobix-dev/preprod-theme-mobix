<div class="popin popin-form popin-form--request" data-popin="request">
	<button type="button" class="popin-close">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100" overflow="visible" xmlns:v="https://vecta.io/nano"><path stroke-width="12" stroke-linecap="square" d="M10 10l80 80m-80 0l80-80"/></svg>
	</button>

	<div class="popin-description-container">
		<p class="popin-title"><?php _e('Demande', 'themede'); ?></p>

		<p class="popin-subtitle"><?php _e('Contactez notre équipe et développez votre entreprise.', 'themede'); ?></p>

		<!-- <p class="popin-description">
			<?php //_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in fermentum quam. Quisque laoreet egestas tortor et varius. Nam ac arcu lacus. <br /><br /> Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'themede'); ?>
		</p> -->
	</div>

	<div class="popin-form-container">
		<?php include get_stylesheet_directory() . '/inc/forms/request.php'; ?>
	</div>
</div>