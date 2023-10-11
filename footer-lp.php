<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/

$categories = get_categories();
?>

</main><!-- / end page container, begun in the header -->

<footer class="footer">
    <div class="footer-main footer-lp container container--full">
        <div class="footer-content">
            <div class="footer-lp__text">
                <?php echo __('Découvrez MOBIX et profitez de ', 'themede') ?>
                <figure class="footer-lp__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoho-logo-white.png">
                </figure>
            </div>

            <div class="footer-lp__btns">
                <a href="#contact"
                   class="button button--orange footer-contact-support"
                   rel="noopener"><?php _e('Besoin de renseignements ?', 'themede'); ?></a>

                <a class="footer-lp__btn-img" href="tel:+33805988065"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/numerovert-mobix.png"></a>
            </div>
        </div>
    </div>
</footer><!-- #colophon .site-footer -->

<?php
wp_footer();
?>
</body>
</html>
