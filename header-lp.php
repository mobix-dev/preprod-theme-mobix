<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <!-- Realfavicon Generator -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#2ba149">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- End Realfavicon Generator -->

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">

		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->

		<?php wp_head(); ?>

		<script>
			/*jQuery(document).on('ready', function () {
				if (getCookieValue(getCookie('de-it-rgpd'), 'analytics') + '' != 'true') {
					// @TODO GA anonymizeIp true
				}
			});*/
		</script>
	</head>

	<body <?php body_class(); ?>>
		<a class="skip-link screen-reader-text" href="#top"><?php esc_html_e('Aller au contenu', 'themede'); ?></a>
		<header id="masthead" class="header header-lp">
			<div class="header-container">
                <figure class="header-lp__link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mobix-zoho-premium.svg" alt="Mobix Zoho Premium Partner" />
                </figure>

                <a class="header-lp__btn-img" href="tel:+33805988065">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/numerovert-mobix.png">
                </a>
			</div>
		</header>

		<main class="main lp-main" id="top">
			<!-- start the page container -->
