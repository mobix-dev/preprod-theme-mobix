<?php
/**
 * 	Template Name: LP - CRM
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
        $header_title = get_sub_field('header_title');
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

// Avantages
if (have_rows('avantages')) {
    while (have_rows('avantages')) {
        the_row();
        $benefits_title = get_sub_field('titre');
        $benefits_description = get_sub_field('description');
        $benefits_list = get_sub_field('liste');
        $benefits_ref = get_sub_field('references');
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

        <div class="grey-block lp-grey-block lp-grey-block--half">
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

        <section class="lp-benefits">
            <div class="lp-container">
                <div class="lp-content">
                    <div class="lp-grid lp-grid--align">
                        <div class="lp-benefits__img">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoho-benefits.png" alt="Mobix Zoho benefits" />
                            </figure>
                        </div>
                        <div class="lp-benefits__text">
                            <h2 class="lp-title">
                                <?= (isset($benefits_title)) ? $benefits_title : '' ?>
                            </h2>
                            <div class="lp-excerpt">
                                <?= (isset($benefits_description)) ? $benefits_description : '' ?>
                            </div>
                        </div>
                    </div>

                    <ul class="lp-benefits__list">
                        <?php foreach ($benefits_list as $aBenefit) { ?>
                            <li>
                                <?= $aBenefit['texte'] ?>
                            </li>
                        <?php } ?>
                    </ul>

                    <div class="lp-benefits-ref">
                        <ul class="lp-benefits-ref__list">
                            <?php foreach ($benefits_ref as $aBenefitRef) { ?>
                                <li>
                                    <figure class="lp-benefits-ref__img">
                                        <img src="<?= $aBenefitRef['image']['url'] ?>" alt="<?= $aBenefitRef['image']['alt'] ?>">
                                    </figure>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
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