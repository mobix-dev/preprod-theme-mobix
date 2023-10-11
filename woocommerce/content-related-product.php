<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_id = $product->get_id();
$product_name = $product->get_name();
$product_quantity = $product->get_stock_quantity();
$product_sku = $product->get_sku();
$product_link = get_permalink( $product_id );


// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
//	do_action( 'woocommerce_shop_loop_item_title' );
    echo "<h3 class='woocommerce-loop-product__title'>".$product_name."</h3>";

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
//	do_action( 'woocommerce_after_shop_loop_item' );

    if ($product->is_in_stock()) { ?>
        <a href="?add-to-cart=<?php echo $product_id; ?>" data-quantity="<?php echo $product_quantity; ?>" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $product_id; ?>" data-product_sku="<?php echo $product_sku ?>" aria-label="Ajouter “<?php echo $product_name; ?>” à votre panier" rel="nofollow"><?php _e('Ajouter au panier', 'themede'); ?></a>
        <?php } else { ?>
            <div class="out-of-stock">
                Rupture de stock
            </div>
        <a href="<?php echo $product_link ?>" class="product_type_simple add_to_cart_button ajax_add_to_cart" rel="nofollow"><?php _e('Voir le produit', 'themede'); ?></a>
    <?php } ?>
</li>
