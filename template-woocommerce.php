<?php
/**
 * 	Template Name: Woocommerce Page
 *
 *	This page template has a sidebar built into it,
 * 	and can be used as a home page, in which case the title will not show up.
 *
 */
get_header();

?>

    <div id="primary">
        <div id="content" role="main">
            <div class="container">
                <?php
                the_content();
                ?>
            </div>
        </div>
    </div><!-- #primary .content-area -->

<?php
get_footer();
?>