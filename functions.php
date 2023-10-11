<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define('DE_VERSION', 1.0);

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if (!isset($content_width)) $content_width = 1200;

function theme_setup()
{
	/*-----------------------------------------------------------------------------------*/
	/* Add Rss feed support to Head section
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('automatic-feed-links');

	/*-----------------------------------------------------------------------------------*/
	/* Add post thumbnail/featured image support
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('post-thumbnails');
	// add_image_size('team-members', 354, 475, true); // (cropped)
	// add_image_size('logo-clients', 175, 175);

	/*-----------------------------------------------------------------------------------*/
	/* Let WordPress manage the document <title>
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('title-tag');

	/*-----------------------------------------------------------------------------------*/
	/* Switch default core markup for search form, comment form, and comments to output valid HTML5.
	/*-----------------------------------------------------------------------------------*/
	// add_theme_support(
	// 	'html5',
	// 	array(
	// 		'search-form',
	// 		'comment-form',
	// 		'comment-list',
	// 		'gallery',
	// 		'caption',
	// 		'style',
	// 		'script',
	// 	)
	// );
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/*-----------------------------------------------------------------------------------*/
	/* Add support for custom logo in customizer
	/* @link https://codex.wordpress.org/Theme_Logo
	/*-----------------------------------------------------------------------------------*/
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	/*-----------------------------------------------------------------------------------*/
	///////////////////////// GUTENBERG SUPPORTS FUNCTIONS ////////////////////////////////
	/*-----------------------------------------------------------------------------------*/
	/*-----------------------------------------------------------------------------------*/
	/* Add stylesheet to the gutenberg editor
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('editor-styles');
	add_editor_style('style-editor.css');

	/*-----------------------------------------------------------------------------------*/
	/* Add support for responsive embeds in Gutenberg, very usefull
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('responsive-embeds');

	/*-----------------------------------------------------------------------------------*/
	/* Add default Gutenberg styles for the front-end. You can disable it for more control
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('wp-block-styles');

	/*-----------------------------------------------------------------------------------*/
	/* Add support for Wide and Full images alignment for the gutenberg image blocks
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('align-wide');

	/*-----------------------------------------------------------------------------------*/
	/* Disable custom font size in gutenberg text block
	/*-----------------------------------------------------------------------------------*/
	add_theme_support('disable-custom-font-sizes');

	/*-----------------------------------------------------------------------------------*/
	/* Add support for custom color palette in gutenberg block options
	/*-----------------------------------------------------------------------------------*/
	// add_theme_support( 'editor-color-palette',
	//     array(
	// 		array( 'name' => 'blue', 'slug'  => 'blue', 'color' => '#48ADD8' ),
	// 		array( 'name' => 'pink', 'slug'  => 'pink', 'color' => '#FF2952' ),
	// 		array( 'name' => 'green', 'slug'  => 'green', 'color' => '#83BD71' ),
	// 	)
	// );

    ///////////////////////////////////////////////
    /// WOOCOMMERCE
    /// ///////////////////////////////////////////

	/*-----------------------------------------------------------------------------------*/
	/* Add support for custom color palette in gutenberg block options
	/* If you are using custom WooCommerce template overrides in your theme you need to declare WooCommerce
	/*-----------------------------------------------------------------------------------*/
	 add_theme_support('woocommerce'); // Custom settings are supported :
	 add_theme_support( 'woocommerce', array(
	     'thumbnail_image_width' => 150,
	     'single_image_width'    => 300,

	     'product_grid'          => array(
	         'default_rows'    => 3,
	         'min_rows'        => 2,
	         'max_rows'        => 8,
	         'default_columns' => 4,
	         'min_columns'     => 2,
	         'max_columns'     => 5,
	     ),
	 ) );
	/*-----------------------------------------------------------------------------------*/
	/* Enable Woocommerce gallery in single product page. Choose which one you want:
	/*-----------------------------------------------------------------------------------*/
	 add_theme_support('wc-product-gallery-zoom'); // Zoom sur le produit
//	 add_theme_support('wc-product-gallery-lightbox'); // Lightbox lors du clic sur l'image
	 add_theme_support('wc-product-gallery-slider'); // Slider
}
add_action('after_setup_theme', 'theme_setup');

add_filter( 'loop_shop_per_page', function(){
    $cols = 12;
    return $cols;
});

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {

    $cartCount = WC()->cart->get_cart_contents_count();

    $fragments['div.header-cart-count'] = (WC()->cart->get_cart_contents_count() == 0) ? '' : '<div class="header-cart-count hidden-cart-number">' . $cartCount . '</div>';

    return $fragments;
}

// Déplacer la mention "Rupture de stock" sous le prix
add_action( 'woocommerce_single_product_summary', 'mh_output_stock_status', 10 );

function mh_output_stock_status ( ) {
    global $product;

    echo wc_get_stock_html( $product );

}

// Woocommerce company required field
add_filter( 'woocommerce_billing_fields', 'ts_require_wc_company_field');
function ts_require_wc_company_field( $fields ) {
    $user_id = get_current_user_id();
    $user_billing_company = get_user_meta($user_id, 'billing_company');

    if ( ! empty($user_billing_company) && ! empty($user_billing_company[0])) {
        $fields['billing_company'] = array(
                'class' => 'hidden-company',
        );
        echo '<h2>'.$user_billing_company[0].'</h2>';
    } else {
        $fields['billing_company']['required'] = true;
    }

    return $fields;
}

// Ajout du numéro de TVA intracom - Checkout
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field_tva' );
function my_custom_checkout_field_tva( $checkout ) {
    echo '<div id= "my_custom_checkout_field_tva "><h3>' . __('Information entreprise') . '</h3>';

    if (empty($checkout->get_value( 'TVA' ))) {
        woocommerce_form_field( 'TVA', array(
            'type' => 'text',
            'class' => array('my-field-class form-row-wide'),
            'label' => __('Numéro de TVA Intracom'),
            'placeholder' => __('TVA Intracom (Obligatoire pour l\'EU)'),
            'required' => true,
        ), $checkout->get_value( 'TVA' ));
        echo "<i><small>".__('Pour les pays hors EU, saisissez NA.')."</small></i>";
    } else {
        echo "<p>Votre numéro de TVA Intracom* : <b>".$checkout->get_value( 'TVA' )."</b></p>";
        echo "<i><small>".__('*Si vous souhaitez modifier votre numéro de TVA veuillez nous contacter via notre formulaire de contact.')."</small></i>";
    }

    echo '</div>';
}

add_action( 'woocommerce_after_checkout_validation', 'tva_validation', 9999, 2);
function tva_validation( $fields, $errors ){
    $user_id = get_current_user_id();
    $vat = get_user_meta( $user_id, 'TVA' );

    if ( empty( $_POST['TVA'] ) ) {
        if ( ! isset( $vat ) || $vat[0] == '' ) {
            $errors->add( 'woocommerce_password_error', __( 'Vous devez remplir le champs TVA Intracom.' ) );
        }
    }
}

add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_tva_update_order_meta' );
function my_custom_checkout_field_tva_update_order_meta( $order_id ) {
    $order = wc_get_order( $order_id );
    $user_id = $order->get_user_id();
    $vat = get_user_meta($user_id, 'TVA', true);

    if ( ! empty( $_POST['TVA'] ) ) {
        if ( ! isset( $vat ) || $vat[0] == '' ) {
            $vat = sanitize_text_field($_POST['TVA']);
        }
    }
    update_user_meta( $user_id, 'TVA', $vat );
}

// Ajout du numéro de TVA intracom - Admin
add_action( 'show_user_profile', 'my_custom_admin_user_field_tva' );
add_action( 'edit_user_profile', 'my_custom_admin_user_field_tva' );
function my_custom_admin_user_field_tva( $user ) {
    $tva = get_user_meta($user->ID, 'TVA')[0];
    ?>
    <table class="form-table">
        <tr>
            <th><label for="TVA">Numéro de TVA</label></th>
            <td>
                <input type="text" name="TVA" id="TVA" value="<?php echo esc_attr( $tva ) ?>" class="regular-text" />
            </td>
        </tr>
    </table>

    <?php
}

add_action( 'personal_options_update', 'admin_update_user_meta' );
add_action( 'edit_user_profile_update', 'admin_update_user_meta' );
function admin_update_user_meta( $user_id ) {

    if( ! isset( $_POST[ 'tva' ] ) ) {
        update_user_meta( $user_id, 'TVA', sanitize_text_field( $_POST[ 'TVA' ] ) );
    }

}

// Ajout du numéro de TVA intracom - Admin order
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_tva_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_tva_display_admin_order_meta($order){
    $user_id = $order->get_user_id();
    $tva = get_user_meta($user_id, 'TVA')[0];

    echo '<p><strong>'.__('TVA Intracom ').':</strong> ' . $tva . '</p>';
}

////WPML - Add a floating language switcher to the footer
//add_action('wp_footer', 'wpml_floating_language_switcher');
//
//function wpml_floating_language_switcher() {
//    echo '<div class="wpml-floating-language-switcher">';
//    //PHP action to display the language switcher (see https://wpml.org/documentation/getting-started-guide/language-setup/language-switcher-options/#using-php-actions)
//    do_action('wpml_add_language_selector');
//    echo '</div>';
//}


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'primary'	=>	__('Primary Menu', 'main-menu'), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu,
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* WCAG 2.0 Attributes for flyout and dropdown menus.
/*-----------------------------------------------------------------------------------*/

function wcag_nav_menu_link_attributes($atts, $item, $args, $depth)
{
	// Add [aria-haspopup] and [aria-expanded] to menu items that have children
	$item_has_children = in_array('menu-item-has-children', $item->classes);
	if ($item_has_children) {
		$atts['aria-haspopup'] = "true";
		$atts['aria-expanded'] = "false";
	}

	return $atts;
}
add_filter('nav_menu_link_attributes', 'wcag_nav_menu_link_attributes', 10, 4);

/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Type
/*-----------------------------------------------------------------------------------*/
//--- Réalisations
// $labelsRealisations = array(
// 	'name'               => 'Réalisations',
// 	'singular_name'      => 'Réalisations',
// 	'menu_name'          => 'Réalisations',
// 	'name_admin_bar'     => 'Réalisations',
// 	'add_new'            => 'Ajouter',
// 	'add_new_item'       => 'Ajouter',
// 	'new_item'           => 'Ajouter',
// 	'edit_item'          => 'Modifier',
// 	'view_item'          => 'Visualiser',
// 	'all_items'          => 'Toutes les réalisations',
// 	'search_items'       => 'Rechercher',
// );

// $argsRealisations = array(
// 	'labels'             => $labelsRealisations,
// 	'description'        => __('Toutes les réalisations.'),
// 	'taxonomies'         => array('categorie_realisation'), // This is not enough, need to link the taxonomy when declaring it (see "register_taxonomy()" below)
// 	'public'             => true,
// 	'publicly_queryable' => true,
// 	'show_ui'            => true,
// 	'show_in_menu'       => true,
// 	'query_var'          => true,
// 	'rewrite'            => array('with_front' => false), // true = "/blog/realisations", false = "/realisations/""
// 	'capability_type'    => 'post',
// 	'show_in_rest' 		=>	true, 	//Add Gutenberg editor !
// 	'has_archive'        => true,
// 	'hierarchical'       => true,
// 	'menu_position'      => null,
// 	'menu_icon'          => 'dashicons-admin-customizer',
// 	'exclude_from_search' => false,
// 	'supports'           => array('title', 'author', 'editor', 'thumbnail')
// );
// register_post_type('realisations', $argsRealisations); // Le premier argument est important, c'est le slug pour les url (regarder charte de nommage)

// register_taxonomy(
// 	'categorie_realisation', // tax slug
// 	'realisations', //CTP slug above
// 	array(
// 		'label' => 'Catégories réalisations',
// 		'labels' => array(
// 			'name' => 'Catégories réalisations',
// 			'singular_name' => 'Catégories réalisations',
// 			'all_items' => 'Toutes les catégories',
// 			'edit_item' => 'Éditer la catégorie',
// 			'view_item' => 'Voir la catégorie',
// 			'update_item' => 'Mettre à jour la catégorie',
// 			'add_new_item' => 'Ajouter une catégorie',
// 			'new_item_name' => 'Nouvelle catégorie',
// 			'search_items' => 'Rechercher parmi les catégories',
// 			'popular_items' => 'catégorie la plus utilisés'
// 		),
// 		'hierarchical' => true,
// 		'rewrite' => array('slug' => 'realisation', 'with_front' => false),
// 		'show_in_rest' => true, //Add to Gutenberg editor
// 		'public' => true,
// 		'show_admin_column' => true
// 	)
// );


/*-----------------------------------------------------------------------------------*/
/* Register CPT CV
/*-----------------------------------------------------------------------------------*/
//--- CV
 $labelsCV = array(
 	'name'               => 'CV',
 	'singular_name'      => 'cv',
 	'menu_name'          => 'CV',
 	'name_admin_bar'     => 'CV',
 	'add_new'            => 'Ajouter',
 	'add_new_item'       => 'Ajouter',
 	'new_item'           => 'Ajouter',
 	'edit_item'          => 'Modifier',
 	'view_item'          => 'Visualiser',
 	'all_items'          => 'Tous les CV',
 	'search_items'       => 'Rechercher',
 );

 $argsCV = array(
 	'labels'             => $labelsCV,
 	'description'        => __('Tous les CV.'),
 	'taxonomies'         => array('categorie_cv'), // This is not enough, need to link the taxonomy when declaring it (see "register_taxonomy()" below)
 	'public'             => true,
 	'publicly_queryable' => true,
 	'show_ui'            => true,
 	'show_in_menu'       => true,
 	'query_var'          => true,
    'rewrite'            => array(
        'slug' => 'a-propos-de-mobix-zoho',
        'with_front' => false,
    ),
 	'capability_type'    => 'post',
 	'show_in_rest' 		=>	true, 	//Add Gutenberg editor !
 	'has_archive'        => false,
 	'hierarchical'       => true,
 	'menu_position'      => null,
 	'menu_icon'          => 'dashicons-welcome-learn-more',
 	'exclude_from_search' => false,
 	'supports'           => array('title', 'author', 'editor', 'thumbnail')
 );
 register_post_type('cv', $argsCV); // Le premier argument est important, c'est le slug pour les url (regarder charte de nommage)


/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function themede_register_sidebars()
{
	register_sidebar([				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div class="sidebar">',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title' => '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar,
		// just change the values of id and name to another word/name
	]);

	register_sidebar([
		'id' => 'sidebar-footer-contact',
		'name' => 'Footer contact',
		'description' => 'Colonne \'Contact\' du footer',
		'before_widget' => '<div class="sidebar">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
		'empty_title' => '',
	]);

	register_sidebar([
		'id' => 'sidebar-footer-partners',
		'name' => 'Footer partenaires',
		'description' => 'Colonne \'Partenaires\' du footer',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		'empty_title' => '',
	]);

	/*register_sidebar([
		'id' => 'sidebar-floating-button',
		'name' => 'Bouton flottant',
		'description' => 'Administration du texte du bloc personnalisé du bouton flottant',
		'before_widget' => '<div class="floating-button-content-block">',
		'after_widget' => '</div>',
		'before_title' => '<p class="floating-button-content-block-title">',
		'after_title' => '</p>',
		'empty_title' => '',
	]);*/
}
add_action('widgets_init', 'themede_register_sidebars');

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function themede_scripts()
{
	// get the theme directory main.css and link to it in the header
	wp_enqueue_style('style-de', get_stylesheet_directory_uri() . '/assets/css/main.css', [], DE_VERSION);

	// add theme scripts
	// wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', a['jquery'], DE_VERSION, true);
	wp_enqueue_script('script-vendors', get_template_directory_uri() . '/assets/js/vendors.js', ['jquery'], DE_VERSION, true);
	wp_enqueue_script('script-global', get_template_directory_uri() . '/assets/js/theme.js', ['jquery'], DE_VERSION, true);
}
add_action('wp_enqueue_scripts', 'themede_scripts'); // Register this fxn and allow Wordpress to call it automatcally in the header


/**
 * Create numeric pagination in WordPress
 */

/*function de_number_pagination()
{
	// Get total number of pages
	global $wp_query;
	$total = $wp_query->max_num_pages;
	// Only paginate if we have more than one page
	if ($total > 1) {
		// Get the current page
		if (!$current_page = get_query_var('paged'))
			$current_page = 1;
		// Structure of “format” depends on whether we’re using pretty permalinks
		$format = empty(get_option('permalink_structure')) ? '&page=%#%' : 'page/%#%/';
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => $format,
			'current' => $current_page,
			'total' => $total,
			'mid_size' => 4,
			'type' => 'list',
			'prev_text' => '«<span class="screen-reader-text"> Naviguer vers des articles plus récents </span>',
			'next_text' => '<span class="screen-reader-text">Naviguer vers des articles plus anciens </span>»',
			'before_page_number' => '<span class="screen-reader-text">Naviguer vers la page </span>'
		));
	}
}*/

function twentythirteen_paging_nav()
{
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ($wp_query->max_num_pages < 2) {
		return;
	}
	?>

	<?php
		$currentPage = get_query_var("paged") ? absint(get_query_var("paged")) : 1;
		$maxPage = intval($wp_query->max_num_pages);
	?>

	<?php
		$gap = 1;

		$start = 1;
		if ($currentPage - $gap > $start) {
			$start = $currentPage - $gap;
		}

		$end = $maxPage;
		if ($currentPage + $gap < $end) {
			$end = $currentPage + $gap;
		}
	?>
	<nav class="navigation paging-navigation">
		<?php if ($currentPage > 1): ?>
			<a href="<?php echo get_pagenum_link($currentPage-1); ?>" class="page-numbers prev">&lt;</a>
		<?php endif; ?>

		<?php
			$pageClass = "page-numbers";
			if ($currentPage == 1) {
				$pageClass .= " current";
			}
		?>
		<a href="<?php echo get_pagenum_link(1); ?>" class="first <?php echo $pageClass; ?>">1</a>

		<?php if ($currentPage - $gap > 2): ?>
			<span class="page-numbers dots">..</span>
		<?php endif; ?>

		<?php for ($i = $start; $i <= $end; $i++): ?>
			<?php if ($i != 1 && $i != $maxPage): ?>
				<?php
					$pageClass = "page-numbers";
					if ($i == $currentPage) {
						$pageClass .= " current";
					}
				?>
				<a href="<?php echo get_pagenum_link($i); ?>" class="<?php echo $pageClass; ?>"><?php echo $i; ?></a>
			<?php endif; ?>
		<?php endfor; ?>

		<?php if ($currentPage + $gap < $maxPage - 1): ?>
			<span class="page-numbers dots">..</span>
		<?php endif; ?>

		<?php
			$pageClass = "page-numbers";
			if ($currentPage == $maxPage) {
				$pageClass .= " current-page";
			}
		?>
		<a href="<?php echo get_pagenum_link($maxPage); ?>" class="last <?php echo $pageClass; ?>"><?php echo $maxPage; ?></a>

		<?php if ($currentPage < $maxPage): ?>
			<a href="<?php echo get_pagenum_link($currentPage+1); ?>" class="page-numbers next">&gt;</a>
		<?php endif; ?>
	</nav>

	<?php
}

function my_wp_nav_menu_objects($items, $args)
{
	foreach ($items as &$item) {
		$description = get_field('menu_field_description', $item);
		$cta = get_field('menu_field_cta', $item);
		$link = get_field('menu_field_link', $item);
		$nbColumns = get_field('menu_field_nb_columns', $item);
		$nbLines = get_field('menu_field_nb_lines', $item);
		$isSolution = get_field('menu_field_is_solution', $item);

		if ($description) {
			$item->title .= ' <span class="menu-item-description">' . $description . '</span>';
		}

		if ($cta || $link) {
			$item->classes[] = 'menu-item-block';
		}

		if ($nbColumns && $nbColumns > 1) {
			$item->classes[] = 'menu-item-submenu-columns-' . $nbColumns;
		}
		if ($nbLines && $nbLines > 1) {
			$item->classes[] = 'menu-item-submenu-lines-' . $nbLines;
		}

		if ($isSolution) {
			$item->classes[] = 'menu-item-solution';
		}
	}

	$itemsReversed = array_reverse($items);
	$menuItemParent = null;
	foreach ($itemsReversed as &$item) {
		$cta = get_field('menu_field_cta', $item);
		$link = get_field('menu_field_link', $item);
		if ($cta || $link) {
			$menuItemParent = $item->menu_item_parent;
		} elseif ($menuItemParent !== null) {
			if ($item->ID == $menuItemParent) {
				$menuItemParent = null;
				$item->classes[] = 'menu-item-has-menu-item-block';
			}
		}
	}

	return $items;
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_walker_nav_menu_start_el($item_output, $item, $depth, $args)
{
	$cta = get_field('menu_field_cta', $item);
	$link = get_field('menu_field_link', $item);

	if ($cta || $link) {
		$item_output = str_replace('<a>', '<div>', $item_output);
		$item_output = str_replace('</a>', '</div>', $item_output);

		if ($cta) {
			if (get_page_template_slug() !== 'template-products.php' && get_post_type() !== 'post') {
				$item_output .= '<button type="button" class="button button--orange" data-open-popin="request" data-request="' . explode(':', $cta)[0] . '">' . __(explode(':', $cta)[1], 'themede') . '</button>';
			} else {
				$item_output .= '<a href="#form-request" class="button button--orange" data-form="request" data-request="' . explode(':', $cta)[0] . '">' . __(explode(':', $cta)[1], 'themede') . '</a>';
			}
		}

		if ($link) {
			$item_output .= '<a href="' . explode('|', $link)[0] . '" class="button button--orange">' . explode('|', $link)[1] . '</a>';
		}
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

function problematic_taxonomy()
{
	register_taxonomy(
        'problematic',
        'page',
        [
            'label' => __('Problématiques', 'themede'),
            'rewrite' => ['slug' => 'problematic'],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'show_in_quick_edit' => true,
		]
    );

	// register_taxonomy_for_object_type('problematic', 'page');
}
add_action('init', 'problematic_taxonomy');

function shortify_text($text, $length, $endString = "...")
{
	if (strlen($text) > $length) {
		for ($i = $length; $i >= 0; $i--) {
			if ($text[$i] == " ") {
				$text = substr($text, 0, $i);
				$text .= $endString;

				break;
			}
		}
	}

	return $text;
}

function get_read_time_duration($content)
{
	$oneMinuteNbCharacters = 1200; // Nombre de caractères que l'on lit en 1 minute (approximation)
    $nbCharacters = strlen($content);

	return ceil($nbCharacters / $oneMinuteNbCharacters);
}

function get_blog_post_category($idPost)
{
	$theCategory = null;
	if (function_exists('yoast_get_primary_term_id')) {
		$primaryCategoryId = yoast_get_primary_term_id('category', $idPost);
		$theCategory = get_term($primaryCategoryId);
	}

	if ($theCategory === null || isset($theCategory->errors)) {
		$categories = wp_get_post_categories($idPost);
		if (isset($categories[0])) {
			$theCategory = get_category($categories[0]);
		}
	}

	return $theCategory;
}


/**
 * Create an ACF option page
 */
// add_action('acf/init', 'my_acf_op_init');
// function my_acf_op_init()
// {

// 	// Check function exists.
// 	if (function_exists('acf_add_options_page')) {

// 		// Register options page.
// 		$option_page = acf_add_options_page(array(
// 			'page_title'    => __('Titre de la page'),
// 			'menu_title'    => __('Titre dans le menu'),
// 			'menu_slug'     => 'sulg',
// 			'capability'    => 'edit_posts',
// 			'redirect'      => false
// 		));
// 	}
// }


/*-----------------------------------------------------------------------------------*/
/* Avoid having ob_flush related php errors with plugins
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 * https://www.matthieu-jalbert.fr/corriger-lerreur-ob_end_flush-sur-wordpress/
/*-----------------------------------------------------------------------------------*/

remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});


/*-----------------------------------------------------------------------------------*/
/* Override yoast breadcrumb
/*-----------------------------------------------------------------------------------*/
add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );
function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular('cv') ) {

        $breadcrumb[] = array(
            'url' => get_permalink( 29 ),
            'text' => 'About Us',
        );

        array_splice( $links, 0, -1, $breadcrumb );

        $breadcrumb[] = array(
            'url' => get_permalink( get_page_by_path( 'a-propos-de-mobix-zoho' ) ),
            'text' => 'A propos',
        );

        array_splice( $links, 0, -1, $breadcrumb );

    }

    return $links;
}