<?php 
/**
 * 	Template Name: Product Page
*/
	get_header();

	// Head
	$headerTitle = get_field('product_header_title');
	$headerDescription = get_field('product_header_description');
	$headerImage = get_field('product_header_image');

	// Formulaire
	$requestChoice = 'démo';
	$demoSelectedChoice = get_field('product_form_demo_choice');

	// Description
	$productDescriptionLogo = get_field('product_description_logo');
	$productDescriptionTitle = get_field('product_description_title');
	$productDescriptionDescription = get_field('product_description_description');
    $cta = get_field('cta');
    $texte_cta = (empty($cta['texte_cta'])) ? 'Essayer' : $cta['texte_cta'];
    $productDescriptionLink = (empty($cta['product_description_link'])) ? '' : $cta['product_description_link'];
	$productDescriptionImage = get_field('product_description_image');

	// Fonctionnalités
	$productFeatureLogo = get_field('product_feature_logo');
	$productFeatureImage = get_field('product_feature_image');
	$productFeatures = get_field('product_features');
	$productLink = get_field('product_link');

	// Témoignages
	$testimonies = get_field('product_testimonies');
	$testimonyKey = 'product_testimony_';

	// Si on n'a pas de témoignages pour la page produit, on charge ceux de la page d'accueil
	if (empty($testimonies)) {
		$testimonies = get_field('training_testimonies', get_option('page_on_front'));
		$testimonyKey = 'training_testimony_';
	}

	// Points forts
	$strongPointsTitle = get_field('product_strong_points_title');
	$strongPointsSubtitle = get_field('product_strong_points_subtitle');
	$strongPointsPoints = get_field('product_strong_points');

    // Langue
    $lang = apply_filters( 'wpml_current_language', null );
?>
	<div id="primary">
		<div id="content" role="main">
			<div class="page-header page-header--product">
				<?php get_template_part('template-parts/content', 'breadcrumb'); ?>

				<h1 class="header-title product-title"><?php echo $headerTitle; ?></h1>

				<div class="header-description product-description"><?php echo $headerDescription; ?></div>

				<a href="<?php echo $productDescriptionLink; ?>" class="button button-anchor"><?php _e($texte_cta, 'themede'); ?></a>

				<?php if ($headerImage): ?>
					<div class="header-image-container">
						<img src="<?php echo $headerImage['sizes']['medium_large']; ?>" alt="" class="header-image" loading="lazy" />
					</div>
				<?php endif; ?>

				<?php include get_stylesheet_directory() . '/inc/forms/request.php'; ?>
			</div>

			<div class="product-description-block grey-block">
				<?php if (!empty($productDescriptionLogo)): ?>
					<div class="product-description-logo">
						<img src="<?php echo $productDescriptionLogo['sizes']['thumbnail']; ?>" alt="<?php echo get_the_title(); ?> logo" loading="lazy" />
					</div>
				<?php endif; ?>

				<h2 class="block-title block-title--description"><?php echo $productDescriptionTitle; ?></h2>

				<div class="product-description-description"><?php echo $productDescriptionDescription; ?></div>

				<?php if (!empty($productDescriptionImage)): ?>
					<div class="product-description-image product-image">
						<img src="<?php echo $productDescriptionImage['sizes']['medium_large']; ?>" alt="" loading="lazy" />
					</div>
				<?php endif; ?>
			</div>

			<div class="product-features-container container" id="product-features">
				<?php for ($featureNumber = 0; $featureNumber < count($productFeatures); $featureNumber++): ?>
					<?php include get_stylesheet_directory() . '/inc/product-feature.php'; ?>

					<?php if ($productFeatureImage && $featureNumber === 1): ?>
						<img src="<?php echo $productFeatureImage['sizes']['large']; ?>" alt="" class="product-feature-image-large" />
					<?php endif; ?>
				<?php endfor; ?>
			</div>

			<div class="product-features-buttons container">
				<?php if (isset($productLink) && trim($productLink) !== ''): ?>
					<a href="<?php echo $productLink; ?>" target="_blank" class="button button-stroke button-stroke--orange"><?php _e("Tester gratuitement", "themede"); ?> <?php echo get_the_title(); ?></a>
				<?php endif; ?>

				<a href="#form-request" class="button" data-form="request" data-request="démo"><?php _e("J'aimerais plus d'infos", "themede"); ?></a>
			</div>

			<?php if (!empty($testimonies)): ?>
				<div class="product-testimonies-block">
					<?php include get_stylesheet_directory() . '/inc/testimonies.php'; ?>
				</div>
			<?php endif; ?>

			<div class="product-strong-points-block grey-block">
				<div class="container">
					<p class="product-strong-points-title">
						<?php echo $strongPointsTitle; ?>
						<?php if (isset($strongPointsSubtitle) && trim($strongPointsSubtitle) !== ''): ?>
							<span class="product-strong-points-subtitle"><?php echo $strongPointsSubtitle; ?></span>
						<?php endif; ?>
					</p>

					<div class="product-strong-points-points">
						<?php foreach ($strongPointsPoints as $aPoint): ?>
							<div class="product-strong-points-point">
								<div class="product-strong-points-point-picto picto-point">
									<img src="<?php echo $aPoint['point_picto']['sizes']['thumbnail']; ?>" alt="" loading="lazy" />
								</div>

								<p class="product-strong-points-point-title"><?php echo $aPoint['point_title']; ?></p>

								<div class="product-strong-points-point-description"><?php echo $aPoint['point_description']; ?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php include get_stylesheet_directory() . '/inc/problematics.php'; ?>

			<?php get_template_part('template-parts/content', 'cta-block'); ?>

			<section class="blog-last-posts-block blog-last-posts-block--product">
				<h2 class="block-title"><?php _e('Le blog', 'themede'); ?></h2>

				<?php include get_stylesheet_directory() . '/inc/blog-posts-block.php'; ?>

				<div class="button-blog-container">
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button button-stroke button-stroke--orange"><?php _e('Voir tous les articles', 'themede'); ?></a>
				</div>
			</section>

			<section class="newsletter-block newsletter-block--home grey-block">
				<h2 class="block-title"><?php _e('Pour aller plus loin', 'themede'); ?></h2>
				<p class="block-subtitle-under"><?php _e('Ressources, thématiques outils...', 'themede'); ?></p>

                <?php ('fr' == $lang) ? include get_stylesheet_directory() . '/inc/newsletter-fr.php' : include get_stylesheet_directory() . '/inc/newsletter-en.php'; ?>
            </section>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php
	get_footer();
?>