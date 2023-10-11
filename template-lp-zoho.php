<?php
/**
 * 	Template Name: LP - Zoho
 *
 *	This page template has a sidebar built into it,
 * 	and can be used as a home page, in which case the title will not show up.
 *
 */
get_header('lp');

// Head
if (have_rows('header_crm')) {
    while (have_rows('header_crm')) {
        the_row();
        $header_title = get_sub_field('header_titre');
        $header_description = get_sub_field('header_description');
        $skills = get_sub_field('header_skills');
    }
}

// Témoignages
if (have_rows('temoignages')) {
    while (have_rows('temoignages')) {
        the_row();
        $testimonial_title = get_sub_field('titre');
        $testimonies = get_sub_field('temoignage');
    }
}

// Services
if (have_rows('services')) {
    while (have_rows('services')) {
        the_row();
        $services_title = get_sub_field('titre');
        $services = get_sub_field('services_child');
    }
}

// Chiffres
if (have_rows('chiffres')) {
    while (have_rows('chiffres')) {
        the_row();
        $numbers_title = get_sub_field('titre');
        $numbers_list = get_sub_field('chiffres_liste');
        $key_figures = get_sub_field('chiffres_cles_');
    }
}

// Cértifications
if (have_rows('certifications')) {
    while (have_rows('certifications')) {
        the_row();
        $certif_title = get_sub_field('titre');
        $certif = get_sub_field('certifications');
    }
}

// Clients
if (have_rows('clients')) {
    while (have_rows('clients')) {
        the_row();
        $leads_title = get_sub_field('titre');
        $leads = get_sub_field('clients');
    }
}

?>

    <div role="main" class="lp">
        <div class="lp-hero lp-container">
            <div class="lp-hero__content">
                <div class="lp-hero__text">
                    <h1 class="lp-hero__title">
                        <?= (isset($header_title)) ? $header_title : '' ?>
                    </h1>
                    <div class="lp-excerpt">
                        <?= (isset($header_description)) ? $header_description : '' ?>
                    </div>

                    <?php if (isset($skills)): ?>
                        <ul class="lp-hero__list">
                            <?php foreach ($skills as $skill) { ?>
                                <li>
                                    <div class="lp-hero__icon"><img src="<?= $skill['icone']['url'] ?>" alt="<?= $skill['icone']['alt'] ?>"></div>
                                    <div class="lp-hero__label"><?= $skill['label'] ?></div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="lp-hero__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mobix-zoho-premium-partner.png" alt="Mobix Zoho Premium Partner" />
                </div>
            </div>
        </div>

        <div class="grey-block lp-grey-block lp-grey-block--padbot lp-grey-block--half">
            <div class="lp-container">
                <div class="lp-grid">
                    <section class="testimonial lp-testimonial">
                        <div class="testimonial-content">
                            <div class="lp-surtitle">
                                <?php _e('Témoignages', 'themede'); ?>
                            </div>
                            <h2 class="lp-title">
                                <?= (isset($testimonial_title)) ? $testimonial_title : '' ?>
                            </h2>

                            <?php include get_stylesheet_directory() . '/inc/testimonies-lp.php'; ?>
                        </div>
                    </section>

                    <section class="contact lp-contact">
                        <div class="lp-contact__container" id="contact">
                            <div class="lp-surtitle">
                                <?php _e('Demandez', 'themede'); ?>
                            </div>
                            <h2 class="lp-title">
                                <?php _e('Une démonstration ou un rendez-vous avec un expert ZOHO', 'themede'); ?>
                            </h2>

                            <?php include get_stylesheet_directory() . '/inc/forms/contact.php'; ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <section class="lp-services">
            <div class="lp-container">
                <div class="lp-content">
                    <h2 class="lp-surtitle">
                        <?php _e('Nos Services', 'themede'); ?>
                    </h2>
                    <div class="lp-title">
                        <?= (isset($services_title)) ? $services_title : '' ?>
                    </div>
                </div>
                <div class="lp-grid">
                        <?php foreach ($services as $aService) { ?>
                            <div class="service-card">
                                <div class="service-card__heading">
                                    <h3 class="service-card__title">
                                        <?= $aService['titre'] ?>
                                    </h3>
                                    <div class="service-card__description">
                                        <?= $aService['description'] ?>
                                    </div>
                                </div>

                                <?php if ($aService['type_de_liste'] == 'Liste numérotée'): ?>
                                    <ol class="lp-services__list lp-services__list--num">
                                        <?php foreach ($aService['liste'] as $aList) { ?>
                                            <li><?= $aList['texte'] ?></li>
                                        <?php } ?>
                                    </ol>
                                <?php endif; ?>

                                <?php if ($aService['type_de_liste'] == 'Liste à puce'): ?>
                                    <ul class="lp-services__list lp-services__list--ord">
                                        <?php foreach ($aService['liste'] as $aList) { ?>
                                            <li><?= $aList['texte'] ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php endif; ?>

                                <figure class="lp-services__img">
                                    <img src="<?= $aService['logo']['url'] ?>">
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
            </div>
        </section>

        <section class="lp-numbers">
            <div class="grey-block lp-grey-block">
                <div class="lp-container">
                    <div class="lp-content">
                        <div class="lp-grid lp-grid--align">
                            <div class="lp-numbers__content">
                                <h2 class="lp-title">
                                    <?= (isset($numbers_title)) ? $numbers_title : '' ?>
                                </h2>
                                <ul class="lp-numbers__list">
                                    <?php foreach ($numbers_list as $aNumberItem) { ?>
                                        <li>
                                            <div class="lp-numbers__icon">
                                                <img src="<?= $aNumberItem['icone']['url'] ?>" alt="<?= $aNumberItem['icone']['alt'] ?>">
                                            </div>
                                            <div class="lp-numbers__text">
                                                <?= $aNumberItem['texte'] ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="lp-numbers__img">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoho-chiffres.png" alt="Mobix Zoho key figures" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lp-container">
                <div class="lp-numbers-keys">
                    <div class="lp-grid">
                        <div class="col">
                            <div class="number">
                                <?= $key_figures['chiffre_cle_1']['chiffre'] ?>
                            </div>
                            <div class="label">
                                <?= $key_figures['chiffre_cle_1']['label'] ?>
                            </div>
                        </div>

                        <div class="col">
                            <div class="number">
                                <?= $key_figures['chiffre_cle_2']['chiffre'] ?>
                            </div>
                            <div class="label">
                                <?= $key_figures['chiffre_cle_2']['label'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-certif">
            <div class="lp-container">
                <h2 class="lp-title">
                    <?= $certif_title ?>
                </h2>
                <ul class="lp-certif__list">
                    <?php foreach ($certif as $aCertif) { ?>
                        <li>
                            <figure class="lp-certif__img">
                                <img src="<?= $aCertif['picto_certification']['url'] ?>" alt="<?= $aCertif['picto_certification']['alt'] ?>">
                            </figure>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>

        <section class="lp-leads">
            <div class="lp-container">
                <div class="lp-content">
                    <h2 class="lp-title">
                        <?= $leads_title ?>
                    </h2>
                    <?php include get_stylesheet_directory() . '/inc/leads.php'; ?>
                </div>
            </div>
        </section>
    </div>

<?php
get_footer('lp');
?>