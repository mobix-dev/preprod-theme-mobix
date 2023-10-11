<?php 
/**
 * 	Template Name: Home Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
	get_header();

	// Slider 'solutions'
	$sliderTop = get_field('home_slider');

	// Slider 'références clients'
	$sliderCustomerReferences = get_field('customer_references_slides');

	// Bloc 'équipe'
	$teamExpertsDescription = get_field('experts_description');
	$teamExpertsPageLink = get_field('experts_page_link');
	$teamExpertsPoints = get_field('experts_points');

	// Bloc 'approche'
	$approachDescription = get_field('approach_description');
	$approachImages = get_field('approach_images');
	$approachDescription2 = get_field('approach_description_2');

	// Bloc 'formation'
	$testimonies = get_field('training_testimonies');
	$testimonyKey = 'training_testimony_';

    // Langue
    $lang = apply_filters( 'wpml_current_language', null );
?>

	<div id="primary">
		<div id="content" role="main">
			<div class="slider-solutions slider-fade container container--full" id="slider-solutions">
				<div data-vec="carousel-container">
					<?php foreach ($sliderTop as $aSlide): ?>
						<div data-vec="carousel-item" class="slider-solutions-slide">
							<div class="slider-solutions-content">
								<?php if (isset($aSlide['home_slider_title'])): ?>
									<p class="slider-solutions-title"><?php echo $aSlide['home_slider_title']; ?></p>
								<?php endif; ?>

								<?php if (isset($aSlide['home_slider_description'])): ?>
									<p class="slider-solutions-description"><?php echo $aSlide['home_slider_description']; ?></p>
								<?php endif; ?>

								<?php if ((isset($aSlide['home_slider_cta_demo']) && $aSlide['home_slider_cta_demo'] !== '') || (isset($aSlide['home_slider_links']) && !empty($aSlide['home_slider_links']))): ?>
									<div class="slider-solution-buttons-container">
										<?php if (isset($aSlide['home_slider_cta_demo']) && $aSlide['home_slider_cta_demo'] !== ''): ?>
											<button type="button" class="button button--orange" data-open-popin="request" data-request="démo"><?php _e('Demandez une démonstration', 'themede'); ?></button>
										<?php endif; ?>

										<?php if (isset($aSlide['home_slider_links']) && !empty($aSlide['home_slider_links'])): ?>
											<?php foreach ($aSlide['home_slider_links'] as $aSlideLink): ?>
												<a href="<?php echo $aSlideLink['home_slider_link_link']; ?>" class="button button-stroke"><?php echo $aSlideLink['home_slider_link_label']; ?></a>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>

							<?php if (isset($aSlide['home_slider_image'])): ?>
								<div class="slider-solutions-image">
									<picture>
										<source media="(min-width: 2000px)" srcset="<?php echo $aSlide['home_slider_image']['url']; ?>" />
										<source media="(min-width: 1200px)" srcset="<?php echo $aSlide['home_slider_image']['sizes']['large']; ?>" />
										<source media="(min-width: 980px)" srcset="<?php echo $aSlide['home_slider_image']['sizes']['medium_large']; ?>" />
										<img src="" alt="" />
									</picture>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php include get_stylesheet_directory() . '/inc/problematics.php'; ?>

			<section class="slider-customer-references-block">
				<h2 class="block-title"><?php _e('Références clients', 'themede'); ?></h2>

				<div class="slider-customer-references slider-center slider-center--no-scale container--only-desktop container--only-desktop--lg" id="slider-customer-references">
					<?php foreach ($sliderCustomerReferences as $aSlide): ?>
						<img src="<?php echo $aSlide['customer_references_slide_image']['sizes']['medium']; ?>" alt="" loading="lazy" />
					<?php endforeach; ?>
				</div>
			</section>

			<div class="grey-block">
				<section class="team-of-experts-block container">
					<div class="team-of-experts-description">
<!--						<p class="block-subtitle">--><?php //_e('Mise en place', 'themede'); ?><!--</p>-->
						<h2 class="block-title"><?php _e("Une équipe d'experts", 'themede'); ?></h2>

						<p class="team-of-experts-description-text">
							<?php echo $teamExpertsDescription; ?>
						</p>

						<?php if (isset($teamExpertsPageLink) && trim($teamExpertsPageLink) !== ''): ?>
							<a href="<?php echo $teamExpertsPageLink; ?>" class="button"><?php _e("Rencontrez nos experts", 'themede'); ?></a>
						<?php endif; ?>
					</div>

					<ul class="team-of-experts-points">
						<?php foreach ($teamExpertsPoints as $aPoint): ?>
							<li class="team-of-experts-point">
								<div class="team-of-experts-point-image picto-point">
									<img src="<?php echo $aPoint['experts_points_image']['sizes']['thumbnail']; ?>" alt="" loading="lazy" />
								</div>

								<div class="team-of-experts-point-content">
									<p class="team-of-experts-point-title"><?php echo $aPoint['experts_points_title']; ?></p>
									<p class="team-of-experts-point-description"><?php echo $aPoint['experts_points_description']; ?></p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>

				<section class="our-approach-block frame-block">
					<div class="frame-block-content">
						<div class="our-approach-description-container">
							<div class="our-approach-titles">
								<h2 class="block-title"><?php _e('Notre approche', 'themede'); ?></h2>
							</div>

							<p class="our-approach-description"><?php echo $approachDescription; ?></p>
						</div>

						<ul class="our-approach-points">
							<?php foreach ($approachImages as $aPoint): ?>
								<li class="our-approach-point our-approach-point--<?php echo count($approachImages); ?>">
									<img src="<?php echo $aPoint['approach_image']['sizes']['large']; ?>" alt="" loading="lazy" />
								</li>
							<?php endforeach; ?>
						</ul>

						<div class="our-approach-contact-container">
							<p class="our-approach-description-2"><?php echo $approachDescription2; ?></p>

							<button type="button" class="button button-contact" data-open-popin="contact"><?php _e('Contactez-nous', 'themede'); ?></button>
						</div>
					</div>
				</section>

				<section class="training-block">
					<h2 class="block-title"><?php _e('Vous avez un besoin de formation ?', 'themede'); ?></h2>

					<button type="button" class="button button--orange button-training" data-open-popin="request" data-request="formation"><?php _e('Contactez-nous', 'themede'); ?></button>

					<?php include get_stylesheet_directory() . '/inc/testimonies.php'; ?>
				</section>
			</div>

			<section class="blog-last-posts-block blog-last-posts-block--home">
				<h2 class="block-title"><?php _e('Le blog', 'themede'); ?></h2>

				<?php include get_stylesheet_directory() . '/inc/blog-posts-block.php'; ?>

				<div class="button-blog-container">
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button button-stroke button-stroke--orange"><?php _e('Voir tous les articles', 'themede'); ?></a>
				</div>
			</section>

			<?php get_template_part('template-parts/content', 'cta-block'); ?>

			<section class="newsletter-block newsletter-block--home grey-block">
				<h2 class="block-title"><?php _e('Pour aller plus loin', 'themede'); ?></h2>
				<p class="block-subtitle-under"><?php _e('Ressources, thématiques outils...', 'themede'); ?></p>

				<?php ('fr' == $lang) ? include get_stylesheet_directory() . '/inc/newsletter-fr.php' : include get_stylesheet_directory() . '/inc/newsletter-en.php'; ?>
			</section>
		</div>
	</div><!-- #primary .content-area -->

<?php
	get_footer();
?>