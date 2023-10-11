<?php
/**
 * The template for displaying any single page.
 */

	get_header();
?>
	<div id="primary">
		<div id="content" role="main">
			<div class="container-big">
				<?php get_template_part('template-parts/content', 'breadcrumb'); ?>
			</div>

			<div class="container container--only-desktop page-content">
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>

						<div class="post page-content-container">
							<header>
								<h1 class="blog-post-list-title"><?php the_title(); ?></h1>
							</header>

							<?php
								$featuredImageUrl = get_the_post_thumbnail_url(get_the_ID(), "large");
							?>

							<div class="the-content <?php if (isset($featuredImageUrl) && trim($featuredImageUrl) !== ''): ?>first-element-center<?php endif; ?>">
								<?php include get_stylesheet_directory() . '/inc/post-page-content.php'; ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else: ?>
					<article class="post error">
						<h1 class="404"><?php _e('Aucun résultat', 'themede'); ?></h1>
					</article>
				<?php endif; ?>
			</div>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php
	get_footer();
?>