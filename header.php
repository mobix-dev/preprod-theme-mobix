<!DOCTYPE html>

<?php
global $wp_query;
//$menu_boutique = get_field('activer_la_boutique');
$menu_boutique = get_field('activer_la_boutique', 'primary_menu');

$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations['primary']);
$menu_shop_is_active = get_field('activer_la_boutique', $menu);

?>
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

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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

		<header id="masthead" class="header">
			<div class="header-container">
				<div class="header-content container container--full">
					<button type="button" class="button-toggle-menu button-reset">
						<span class="lines"></span>
					</button>
				</div>

				<?php if (is_front_page()): ?>
					<h1 class="home-link">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mobix-logo.svg" alt="Mobix logo" />
					</h1>
				<?php else: ?>
					<a id="logo-digital-effervescence" class="home-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mobix-logo.svg" alt="Mobix Tech logo" />
					</a>
				<?php endif; ?>

				<div class="header-menu">
					<nav class="main-navigation-container" aria-label="<?php _e('Menu principal', 'themede'); ?>">
						<?php
							wp_nav_menu([
								'theme_location' => 'primary',
								'container'      => false,
								'menu_class'     => 'main-navigation',
								'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
							]);
						?>
					</nav>

					<div class="buttons-container">
						<?php if (get_page_template_slug() !== 'template-products.php' && $wp_query->query['pagename'] !== 'infos-actualites-outils'): ?>
							<button type="button" class="button button-stroke button-stroke--orange" data-open-popin="request" data-request="commerciale"><?php _e('Demande commerciale', 'themede'); ?></button>
						<?php else: ?>
							<a href="#form-request" class="button button-stroke button-stroke--orange" data-form="request" data-request="commerciale"><?php _e('Demande commerciale', 'themede'); ?></a>
						<?php endif; ?>
						<button type="button" class="button" data-open-popin="contact"><?php _e('Nous contacter', 'themede'); ?></button>
					</div>
				</div>
                <?php if ($menu_shop_is_active): ?>
                <div class="header-menu__wrapper">
                    <div class="header-menu__icon header-menu__icon--login">
                        <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20">
                                <title>Compte</title>
                                <path d="m13,12H5c-2.76,0-5,2.24-5,5v2c0,.55.45,1,1,1s1-.45,1-1v-2c0-1.65,1.35-3,3-3h8c1.65,0,3,1.35,3,3v2c0,.55.45,1,1,1s1-.45,1-1v-2c0-2.76-2.24-5-5-5Z"/>
                                <path d="m9,10c2.76,0,5-2.24,5-5S11.76,0,9,0s-5,2.24-5,5,2.24,5,5,5Zm0-8c1.65,0,3,1.35,3,3s-1.35,3-3,3-3-1.35-3-3,1.35-3,3-3Z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="header-menu__icon header-menu__icon--cart">
                        <a href="<?php echo wc_get_cart_url(); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 23">
                                <title>Panier</title>
                                <circle cx="9" cy="21" r="2"/>
                                <circle cx="20" cy="21" r="2"/>
                                <path d="m23.77,5.36c-.19-.23-.47-.36-.77-.36H6.82l-.84-4.2c-.09-.47-.5-.8-.98-.8H1C.45,0,0,.45,0,1s.45,1,1,1h3.18l.83,4.15s.01.06.02.09l1.67,8.34c.28,1.41,1.51,2.42,2.92,2.42.02,0,.04,0,.06,0h9.7c1.45,0,2.72-.99,3-2.42l1.6-8.39c.06-.29-.02-.6-.21-.83Zm-3.35,8.83c-.09.48-.52.8-1.02.81h-9.74c-.53,0-.91-.33-1-.81l-1.44-7.19h14.57l-1.37,7.19Z"/>
                            </svg>
                            <div class="header-cart-count hidden-cart-number"></div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="wpml-selector">
                        <?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
                    </div>
                </div>
			</div>
		</header>

		<main class="main" id="top">
			<!-- start the page container -->
