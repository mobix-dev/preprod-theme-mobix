<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

	get_header(); // This fxn gets the header.php file and renders it

	$currentObject = get_queried_object();

	$archivesTitle = __('Le blog', 'themede');
	$archivesDescription = get_field("blog_description", $currentObject->ID);

	if (is_category()) {
		$currentCategory = get_the_category();
		$archivesTitle = $currentCategory[0]->name;

		$archivesDescription = $currentCategory[0]->description;
	}

	$categories = get_categories([
		'hide_empty' => true,
	]);

	$requestChoice = 'démo';

    // Langue
    $lang = apply_filters( 'wpml_current_language', null );
?>
	<div id="primary">
		<div id="content" role="main">
			<div class="archives-container">
				<div class="page-header page-header--archives">
					<?php get_template_part('template-parts/content', 'breadcrumb'); ?>

					<h1 class="header-title product-title"><?php echo $archivesTitle; ?></h1>

					<div class="header-description product-description"><?php echo $archivesDescription; ?></div>

					<div class="header-category-choices-block">
						<p class="header-category-choices-label"><?php _e('Filtrer par catégorie&nbsp;:', 'themede'); ?></p>

						<div class="header-category-choices-container">
							<button type="button" class="button button-stroke button-stroke--grey button--open header-category-choices-button" data-open-select="category">
								<span><?php _e('Choix catégorie', 'themede'); ?></span>
							</button>

							<div class="header-category-choices" data-select="category">
								<ul>
									<li><a href="<?php echo get_post_type_archive_link('post'); ?>"><?php _e('Toutes', 'themede'); ?></a></li>
									<?php foreach ($categories as $aCategory): ?>
										<li><a href="<?php echo get_category_link($aCategory->term_id); ?>"><?php echo $aCategory->name; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>

					<?php include get_stylesheet_directory() . '/inc/forms/request.php'; ?>
				</div>
				<?php if (have_posts()):
				// Do we have any posts in the database that match our query?
				// In the case of the home page, this will call for the most recent posts 
				?>
					<div class="archives-post-list">
						<?php $i = 0; ?>
						<?php while (have_posts()): the_post(); ?>
							<?php
								$featuredImageUrl = get_the_post_thumbnail_url(get_the_ID(), "large");

								$theCategory = get_blog_post_category(get_the_ID());

								$excerpt = shortify_text(strip_tags(get_the_excerpt()), 175, '');
								if (!isset($excerpt) || trim($excerpt) === '') {
									$excerpt = shortify_text(strip_tags(get_the_content()), 175, '');
								}
							?>
							<article class="blog-post-list" itemscope itemtype="https://schema.org/BlogPosting">
								<a href="<?php echo get_permalink(get_the_ID()); ?>" class="blog-post-list-image">
									<img src="<?php echo $featuredImageUrl; ?>" alt="" loading="lazy" />
								</a>

								<div class="blog-post-list-content">
									<header>
										<div class="blog-post-list-head">
											<span class="blog-post-list-category">
												<?php if (is_category()): ?>
													<?php echo $archivesTitle; ?>
												<?php else: ?>
													<?php echo $theCategory->name; ?>
												<?php endif; ?>
											</span>
											<span class="blog-post-list-head-separator">-</span>
											<span class="blog-post-list-read-time"><?php echo get_read_time_duration(get_the_content()); ?> <?php _e("min", 'themede'); ?></span>
											<meta content="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished" />
										</div>

										<h2 class="blog-post-list-title"><?php the_title(); ?></h2>
									</header>

									<p class="blog-post-list-post-content">
										<?php echo $excerpt; ?>
									</p>

									<footer class="blog-post-read-more">
										<a href="<?php echo get_permalink(get_the_ID()); ?>"><?php _e("Lire l'article", 'themede'); ?></a>
									</footer>
								</div>
							</article>
							<?php $i++; ?>
						<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>

						<?php if ($i % 3 === 2): // Bidouille dans le cas où la dernière ligne possède 2 éléments, et qui vont se 'justifier' ?>
							<article class="blog-post-list blog-post-list--empty"></article>
						<?php endif; ?>
					</div>

					<!-- pagination -->
					<?php echo twentythirteen_paging_nav(); ?>
				<?php else: // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
					<article class="post error">
						<h1 class="404"><?php _e('Aucun résultat', 'themede'); ?></h1>
					</article>
				<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
			</div>

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