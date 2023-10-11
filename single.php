<?php
/**
 * The template for displaying any single post.
 */

	get_header();

	$theCategory = get_blog_post_category(get_the_ID());

    // Langue
    $lang = apply_filters( 'wpml_current_language', null );
?>
	<div id="primary">
		<div id="content" role="main">
			<div class="container-big">
				<?php get_template_part('template-parts/content', 'breadcrumb'); ?>
			</div>

			<div class="container container--only-desktop page-content">
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<article class="post page-content-container" itemscope itemtype="https://schema.org/BlogPosting">
							<header>
								<div class="blog-post-list-head">
									<span class="blog-post-list-category">
										<?php echo $theCategory->name; ?>
									</span>
									<span class="blog-post-list-head-separator">-</span>
									<span class="blog-post-list-read-time"><?php echo get_read_time_duration(get_the_content()); ?> <?php _e("min", 'themede'); ?></span>
									<meta content="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished" />
								</div>

								<h1 class="blog-post-list-title"><?php the_title(); ?></h1>
							</header>

							<?php
								$featuredImageUrl = get_the_post_thumbnail_url(get_the_ID(), "large");
							?>

							<div class="the-content <?php if (isset($featuredImageUrl) && trim($featuredImageUrl) !== ''): ?>first-element-center<?php endif; ?>">
								<?php include get_stylesheet_directory() . '/inc/post-page-content.php'; ?>
							</div>
						</article>

						<div class="social-share">
							<a href="https://linkedin.com/shareArticle?url=<?php echo get_the_permalink() . '&t=' . urlencode(get_the_title()); ?>" target="_blank" class="sharer linkedin">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892zM160.461 423.278V197.561h-75.04v225.717h75.04zm270.539 0V293.839c0-69.333-37.018-101.586-86.381-101.586-39.804 0-57.634 21.891-67.617 37.266v-31.958h-75.021c.995 21.181 0 225.717 0 225.717h75.02V297.222c0-6.748.486-13.492 2.474-18.315 5.414-13.475 17.767-27.434 38.494-27.434 27.135 0 38.007 20.707 38.007 51.037v120.768H431zM123.448 88.722C97.774 88.722 81 105.601 81 127.724c0 21.658 16.264 39.002 41.455 39.002h.484c26.165 0 42.452-17.344 42.452-39.002-.485-22.092-16.241-38.954-41.943-39.002z"/></svg>
							</a>
							<a href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink() . '&t=' . urlencode(get_the_title()); ?>" target="_blank" class="sharer facebook">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H342.978V319.085h66.6l12.672-82.621h-79.272v-53.617c0-22.603 11.073-44.636 46.58-44.636H425.6v-70.34s-32.71-5.582-63.982-5.582c-65.288 0-107.96 39.569-107.96 111.204v62.971h-72.573v82.621h72.573V512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892z"/></svg>
							</a>
							<a href="https://twitter.com/share?url=<?php echo get_the_permalink() . '&text=' . get_the_title(); ?>" target="_blank" class="sharer twitter">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892zM195.519 424.544c135.939 0 210.268-112.643 210.268-210.268 0-3.218 0-6.437-.153-9.502 14.406-10.421 26.973-23.448 36.935-38.314-13.18 5.824-27.433 9.809-42.452 11.648 15.326-9.196 26.973-23.602 32.49-40.92-14.252 8.429-30.038 14.56-46.896 17.931-13.487-14.406-32.644-23.295-53.946-23.295-40.767 0-73.87 33.104-73.87 73.87 0 5.824.613 11.494 1.992 16.858-61.456-3.065-115.862-32.49-152.337-77.241-6.284 10.881-9.962 23.601-9.962 37.088a73.57 73.57 0 0032.95 61.456c-12.107-.307-23.448-3.678-33.41-9.196v.92c0 35.862 25.441 65.594 59.311 72.49a73.66 73.66 0 01-19.464 2.606c-4.751 0-9.348-.46-13.946-1.38 9.349 29.426 36.628 50.728 68.965 51.341-25.287 19.771-57.164 31.571-91.8 31.571-5.977 0-11.801-.306-17.625-1.073 32.337 21.15 71.264 33.41 112.95 33.41z"/></svg>
							</a>
						</div>
					<?php endwhile; ?>

					<?php
						// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
						// if ( comments_open() || '0' != get_comments_number() )
						// 	comments_template( '', true );
					?>
				<?php else: ?>
					<article class="post error">
						<h1 class="404"><?php _e('Aucun résultat', 'themede'); ?></h1>
					</article>
				<?php endif; ?>
			</div>

			<section class="blog-last-posts-block blog-last-posts-block--product">
				<h2 class="block-title"><?php _e('Sur la même thématique', 'themede'); ?></h2>

				<?php include get_stylesheet_directory() . '/inc/blog-posts-block-cat.php'; ?>

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