<?php
/**
 * The template for displaying 404 pages (not found)
 */

	get_header();
?>
	<div id="primary" class="content-area">
		<div id="content" role="main">
			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e('Page introuvable', 'themede'); ?></h1>
				</header>

				<div class="container page-content">
					<p>
						<?php _e("Apparemment, rien n'a été trouvé à cette adresse.", 'twentynineteen'); ?><br />
						<a href="<?php echo esc_url(home_url('/')); ?>"><?php _e("Retour à l'accueil", 'themede'); ?></a>
					</p>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div><!-- #main -->
	</div><!-- #primary -->
<?php
	get_footer();
?>