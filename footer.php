<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
global $wp_query;

$categories = get_categories();

// Langue
$lang = apply_filters( 'wpml_current_language', null );
?>

</main><!-- / end page container, begun in the header -->

<footer class="footer">
    <div class="footer-main container container--full">
        <div class="footer-left">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mobix-logo-white.svg"
                 alt="Mobix logo white" class="logo" loading="lazy"/>

            <div class="footer-social">
                <a href="https://www.linkedin.com/company/mobixfrance/about/" target="_blank" class="picto linkedin" rel="noreferrer noopener">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                         clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
                        <path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892zM160.461 423.278V197.561h-75.04v225.717h75.04zm270.539 0V293.839c0-69.333-37.018-101.586-86.381-101.586-39.804 0-57.634 21.891-67.617 37.266v-31.958h-75.021c.995 21.181 0 225.717 0 225.717h75.02V297.222c0-6.748.486-13.492 2.474-18.315 5.414-13.475 17.767-27.434 38.494-27.434 27.135 0 38.007 20.707 38.007 51.037v120.768H431zM123.448 88.722C97.774 88.722 81 105.601 81 127.724c0 21.658 16.264 39.002 41.455 39.002h.484c26.165 0 42.452-17.344 42.452-39.002-.485-22.092-16.241-38.954-41.943-39.002z"/>
                    </svg>
                </a>

                <a href="https://www.facebook.com/MOBIX-Zoho-Premium-Partner-112303921761604" target="_blank" class="picto facebook" rel="noreferrer noopener">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                         clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
                        <path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H342.978V319.085h66.6l12.672-82.621h-79.272v-53.617c0-22.603 11.073-44.636 46.58-44.636H425.6v-70.34s-32.71-5.582-63.982-5.582c-65.288 0-107.96 39.569-107.96 111.204v62.971h-72.573v82.621h72.573V512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892z"/>
                    </svg>
                </a>

                <a href="https://twitter.com/ThomasSoulier" target="_blank" class="picto twitter" rel="noreferrer noopener">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                         clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
                        <path d="M449.446 0C483.971 0 512 28.03 512 62.554v386.892C512 483.97 483.97 512 449.446 512H62.554C28.03 512 0 483.97 0 449.446V62.554C0 28.03 28.029 0 62.554 0h386.892zM195.519 424.544c135.939 0 210.268-112.643 210.268-210.268 0-3.218 0-6.437-.153-9.502 14.406-10.421 26.973-23.448 36.935-38.314-13.18 5.824-27.433 9.809-42.452 11.648 15.326-9.196 26.973-23.602 32.49-40.92-14.252 8.429-30.038 14.56-46.896 17.931-13.487-14.406-32.644-23.295-53.946-23.295-40.767 0-73.87 33.104-73.87 73.87 0 5.824.613 11.494 1.992 16.858-61.456-3.065-115.862-32.49-152.337-77.241-6.284 10.881-9.962 23.601-9.962 37.088a73.57 73.57 0 0032.95 61.456c-12.107-.307-23.448-3.678-33.41-9.196v.92c0 35.862 25.441 65.594 59.311 72.49a73.66 73.66 0 01-19.464 2.606c-4.751 0-9.348-.46-13.946-1.38 9.349 29.426 36.628 50.728 68.965 51.341-25.287 19.771-57.164 31.571-91.8 31.571-5.977 0-11.801-.306-17.625-1.073 32.337 21.15 71.264 33.41 112.95 33.41z"/>
                    </svg>
                </a>

                <a href="https://www.youtube.com/channel/UC20bsawnfUqvcBZ_Q53al2g" target="_blank" class="picto" rel="noreferrer noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill-rule="evenodd" clip-rule="evenodd">
                        <polygon points="206.12 323.19 339.12 256.69 206.12 190.19 206.12 323.19"/>
                        <path d="m449.45,0H62.55C28.03,0,0,28.03,0,62.55v386.89c0,34.52,28.03,62.55,62.55,62.55h386.89c34.52,0,62.55-28.03,62.55-62.55V62.55c0-34.52-28.03-62.55-62.55-62.55Zm-67.1,402.99c-59.85,3.33-192.85,3.33-252.7,0-64.84-4.99-73.15-43.06-73.15-146.3s8.31-141.31,73.15-146.3c59.85-5.15,192.85-5.15,252.7,0,64.84,4.99,73.15,43.22,73.15,146.3s-8.31,141.31-73.15,146.3Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="accordion navigation-container">
            <div class="accordion-title">
                <?php _e('Solutions', 'themede'); ?>
            </div>

            <div class="accordion-content">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'footer-navigation',
                    'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ]);
                ?>
            </div>
        </div>

        <div class="accordion blog">
            <div class="accordion-title">
                <?php _e('Blog', 'themede'); ?>
            </div>

            <div class="accordion-content">
                <ul>
                    <?php foreach ($categories as $aCategory): ?>
                        <li>
                            <a href="<?php echo get_category_link($aCategory->term_id); ?>"><?php echo $aCategory->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="footer-contact">
            <div class="footer-contact-partners">
                <a href="https://assistance.mobix.fr/portal/fr/"
                   class="button footer-contact-support"
                   rel="noopener"><?php _e('Contacter le support', 'themede'); ?></a>

                <?php dynamic_sidebar('sidebar-footer-partners'); ?>
            </div>

            <div class="footer-contact-contact">
                <div class="accordion-title">
                    <?php _e('Nous contacter', 'themede'); ?>
                </div>

                <?php dynamic_sidebar('sidebar-footer-contact'); ?>

                <button type="button" class="link" id="footer-send-message"><?php _e('Nous envoyer un message', 'themede'); ?></button>
            </div>
        </div>
    </div>

    <div class="footer-bottom container container--full">
        <div class="copyright">
            <?php _e('Copyright', 'themede'); ?>
            <?php echo date('Y'); ?>.
        </div>

        <a href="<?php echo ('fr' == $lang) ? site_url() . '/cgv/' : site_url() . '/en/terms-and-conditions-of-sale/' ?>"><?php _e('Conditions générales de vente.', 'themede'); ?></a>

        <a href="<?php echo get_privacy_policy_url(); ?>"><?php _e('Politique de confidentialité et Mentions légales.', 'themede'); ?></a>

        <div class="signature">
            <a href="<?php site_url() ?>" target="_blank" rel="nofollow" title="Spiriit">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mobix-logo.svg" alt="Logo MOBIX" class="logo" loading="lazy" style="height: 20px;"/>
            </a>
        </div>
    </div><!-- .site-info -->

    <?php if (get_page_template_slug() !== 'template-products.php' && $wp_query->query['pagename'] !== 'infos-actualites-outils'): ?>
        <?php get_template_part('template-parts/popin', 'form-request'); ?>
    <?php endif; ?>
    <?php get_template_part('template-parts/popin', 'form-contact'); ?>
    <div class="popin-overlay"></div>
</footer><!-- #colophon .site-footer -->

<div class="floating-button-container">
    <div class="floating-button-content">
        <div class="floating-button-content-head">
            <p class="floating-button-content-title"><?php _e('Bonjour', 'themede'); ?></p>

            <!-- <button type="button" class="floating-button-container-close">⛌</button> -->
            <button type="button" class="floating-button-container-close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100"
                     overflow="visible" xmlns:v="https://vecta.io/nano">
                    <path stroke-width="12" stroke-linecap="square" d="M10 10l80 80m-80 0l80-80"/>
                </svg>
            </button>
        </div>

        <div class="floating-button-content-block">
            <p class="floating-button-content-block-title"><?php _e('Demande de rappel', 'themede'); ?></p>

            <?php if (get_page_template_slug() !== 'template-products.php' && get_post_type() !== 'post'): ?>
                <button type="button" class="button" data-open-popin="request"
                        data-request="commerciale"><?php _e('Demande commerciale', 'themede'); ?></button>
            <?php else: ?>
                <a href="#form-request" class="button" data-form="request"
                   data-request="commerciale"><?php _e('Demande commerciale', 'themede'); ?></a>
            <?php endif; ?>
            <button type="button" class="button"
                    data-open-popin="contact"><?php _e('Demande de contact', 'themede'); ?></button>
        </div>

        <?php dynamic_sidebar('sidebar-floating-button'); ?>

        <div class="floating-button-content-block">
            <p class="floating-button-content-block-title"><?php _e('Prendre RDV pour une démo', 'themede'); ?></p>

            <?php if (get_page_template_slug() !== 'template-products.php' && get_post_type() !== 'post'): ?>
                <button type="button" class="button button--orange" data-open-popin="request"
                        data-request="démo"><?php _e('Demander une démo', 'themede'); ?></button>
            <?php else: ?>
                <a href="#form-request" class="button button--orange" data-form="request"
                   data-request="démo"><?php _e('Demander une démo', 'themede'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
wp_footer();
?>
</body>
</html>
