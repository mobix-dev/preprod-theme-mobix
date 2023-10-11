<?php
	$homeId = get_option('page_on_front');

	$ctaTitle = get_field('cta_title', $homeId);
	$ctaDescription = get_field('cta_description', $homeId);
?>

<section class="cta-block">
	<h2 class="block-title"><?php echo nl2br($ctaTitle); ?></h2>

	<p class="cta-description">
		<?php echo nl2br($ctaDescription); ?>
	</p>

	<div class="cta-cta-container">
		<?php if (get_page_template_slug() !== 'template-products.php' && get_post_type() !== 'post'): ?>
			<button type="button" class="button button--orange" data-open-popin="request" data-request="démo"><?php _e('Demandez une démonstration', 'themede'); ?></button>
		<?php else: ?>
			<a href="#form-request" class="button button--orange" data-form="request" data-request="démo"><?php _e('Demandez une démonstration', 'themede'); ?></a>
		<?php endif; ?>

		<button type="button" class="button button-stroke" data-open-popin="contact"><?php _e('Nous contacter', 'themede'); ?></button>
	</div>
</section>