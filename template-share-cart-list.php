<?php
/**
 * 	Template Name: Share Cart List Template
 *
 *	This page template has a sidebar built into it,
 * 	and can be used as a home page, in which case the title will not show up.
 *
 */
get_header();

?>

    <div id="primary">
        <div id="content" role="main" class="woocommerce">
            <div class="container woocommerce-cart">
                <h1 class="header-title">
                    <?php esc_html_e( 'Cart', 'woocommerce' ); ?>
                </h1>
                <?php
                the_content();
                ?>
            </div>
        </div>
    </div><!-- #primary .content-area -->

<?php
get_footer();
?>