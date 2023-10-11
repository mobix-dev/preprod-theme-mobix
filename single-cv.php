<?php
/**
 * The template for displaying any single post.
 */

get_header();

// Profil
$nom = get_field('nom') ?? '';
$prenom = get_field('prenom') ?? '';
$poste = get_field('poste') ?? '';
$photo_de_profil = get_field('photo_de_profil');
$couleur_profil = get_field('couleur_profil') ?? '#000000';

// Expertises fonctionelles
$expertises_fonctionnelles = get_field('expertises_fonctionnelles');

// Expertises Zoho
$expertises_zoho = get_field('expertises_zoho');

// Formation et certification officielles zoho
$formation_et_certification_officielles_zoho_inc = get_field('formation_et_certification_officielles_zoho_inc');

// Certifications officielles Zoho
$certifications_officielles_zoho = get_field('certifications_officielles_zoho');

// Certifications Zoho Spark
$certifications_zoho_spark = get_field('certifications_zoho_spark');

// Formateur
$formateurs = get_field('formateur');

// Langues
$langues = get_field('langues');

// Compétences clés
$competences_cles = get_field('competences_cles');

// Cursus
$cursus = get_field('cursus');

// Publications et vacations
$publications_et_vacations = get_field('publications_et_vacations');

// Principales missions réalisées
$principales_missions_realisees = get_field('principales_missions_realisees');

// Expérience de formation
$experience_de_formation = get_field('experience_de_formation');

// Parcours Professionnel
$parcours_professionnel = get_field('parcours_professionnel');

// Calendrier
$calendrier_zoho_lien = get_field('calendrier_zoho_lien');

?>
    <div id="primary">
        <div id="content" role="main">
            <div class="container-big">
                <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
            </div>

            <div class="container page-content page-content--big">

                <article class="post page-content-container" itemscope itemtype="https://schema.org/BlogPosting">
                    <header>
                        <h1 class="blog-post-list-title"><?php _e('Découvrez les membres de notre équipe', 'themede'); ?> - <?php the_title(); ?></h1>
                    </header>

                    <div class="cv the-content <?php if (isset($featuredImageUrl) && trim($featuredImageUrl) !== ''): ?>first-element-center<?php endif; ?>">
                        <div class="cv__grid">
                            <div class="cv__col">
                                <div class="profil">
                                    <div class="profil__heading">
                                        <div class="profil__name">
                                            <?=$prenom?> <?=$nom?>
                                        </div>
                                        <div class="profil__job">
                                            <?=$poste?>
                                        </div>
                                    </div>

                                    <?php if (!empty($photo_de_profil)): ?>
                                        <figure class="profil__img">
                                            <img src="<?=$photo_de_profil['url']?>" alt="<?=$photo_de_profil['alt']?>">
                                        </figure>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($expertises_fonctionnelles)): ?>
                                    <div class="cv__block-bg expertise-fonctionnelles">
                                        <h2 class="cv__title cv__title--center">
                                            <?php _e('Expertises Fonctionnelles', 'themede'); ?>
                                        </h2>
                                        <ul class="expertise-fonctionnelles__list">
                                            <?php foreach ($expertises_fonctionnelles as $expertise): ?>
                                                <li class="expertise-fonctionnelles__item">
                                                    <?= $expertise["nom_expertise"]; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($expertises_zoho)): ?>
                                    <div class="cv__block-bg expertise-zoho">
                                        <h2 class="cv__title cv__title--center">
                                            <?php _e('Expertises Zoho', 'themede'); ?>
                                        </h2>
                                        <div class="expertise-zoho__logo">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoho-logo-Mobix.png" alt="Zoho logo" />
                                        </div>
                                        <ul class="expertise-zoho__list">
                                            <?php foreach ($expertises_zoho as $expertise): ?>
                                                <li class="expertise-zoho__item">
                                                <span class="expertise-zoho__name">
                                                    <?= $expertise["expertise_zoho"]["libelle"]; ?>
                                                </span><span class="star star-<?= $expertise["expertise_zoho"]["note"]; ?>"></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="cv__col">
                                <?php if (!empty($formation_et_certification_officielles_zoho_inc)): ?>
                                    <div class="cv__block formations-certifications">
                                        <h2 class="cv__title">
                                            <?php _e('Formation et certification officielles Zoho Inc.', 'themede'); ?>
                                        </h2>

                                        <?= $formation_et_certification_officielles_zoho_inc; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($certifications_officielles_zoho)): ?>
                                    <div class="cv__block certifications-officielles">
                                        <h2 class="cv__title">
                                            <?php _e('Certifications officielles Zoho', 'themede'); ?>
                                        </h2>

                                        <div class="certifications-officielles__wrapper">
                                            <?php foreach ($certifications_officielles_zoho as $certif): ?>
                                                <figure class="certifications-officielles__img">
                                                    <img src="<?= $certif['picto_certification']['url'] ?>" alt="<?= $certif['picto_certification']['alt'] ?>">
                                                </figure>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($certifications_zoho_spark)): ?>
                                    <div class="cv__block certifications-zoho-spark">
                                        <h2 class="cv__title">
                                            <?php _e('Certifications Zoho Spark', 'themede'); ?>
                                        </h2>

                                        <div class="certifications-zoho-spark__wrapper">
                                            <?php foreach ($certifications_zoho_spark as $certif): ?>
                                                <figure class="certifications-zoho-spark__img">
                                                    <img src="<?= $certif['picto_certification']['url'] ?>" alt="<?= $certif['picto_certification']['alt'] ?>">
                                                </figure>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($formateurs)): ?>
                                    <div class="cv__block formateur">
                                        <h2 class="cv__title">
                                            <?php _e('Formateur', 'themede'); ?>
                                        </h2>

                                        <div class="formateur__wrapper">
                                            <?php foreach ($formateurs as $formateur): ?>
                                                <figure class="formateur__img">
                                                    <img src="<?= $formateur['logo_formation']['url'] ?>" alt="<?= $formateur['logo_formation']['alt'] ?>">
                                                </figure>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($langues)): ?>
                                    <div class="cv__block langues">
                                        <h2 class="cv__title">
                                            <?php _e('Langues', 'themede'); ?>
                                        </h2>

                                        <?php foreach ($langues as $langue): ?>
                                            <ul class="langues__list">
                                                <li class="langues__item">
                                                    <p><?= $langue['langue']['libelle_langue'] ?></p>
                                                    <div class="progress">
                                                        <div class="bar" style="width:<?= $langue['langue']['niveau'] ?>%">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="cv__col cv__col--responsive">
                                <?php if (!empty($competences_cles)): ?>
                                    <div class="cv__block-icon competences_cles">
                                        <h2 class="cv__title">
                                            <?php _e('Compétences Clés', 'themede'); ?>
                                        </h2>

                                        <?= $competences_cles ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($cursus)): ?>
                                    <div class="cv__block-icon cursus">
                                        <h2 class="cv__title">
                                            <?php _e('Cursus', 'themede'); ?>
                                        </h2>

                                        <?= $cursus ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($publications_et_vacations)): ?>
                                    <div class="cv__block-icon publi-vaca">
                                        <h2 class="cv__title">
                                            <?php _e('Publications et Vacations', 'themede'); ?>
                                        </h2>

                                        <?= $publications_et_vacations ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($experience_de_formation)): ?>
                                    <div class="cv__block-icon exp-formation">
                                        <h2 class="cv__title">
                                            <?php _e('Expérience de Formation', 'themede'); ?>
                                        </h2>

                                        <?= $experience_de_formation ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($parcours_professionnel)): ?>
                                    <div class="cv__block-icon parcours-pro">
                                        <h2 class="cv__title">
                                            <?php _e('Parcours Professionnel', 'themede'); ?>
                                        </h2>

                                        <?= $parcours_professionnel ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($calendrier_zoho_lien)): ?>
                                <div class="calendar">
                                    <iframe src="<?= $calendrier_zoho_lien ?>" width="100%" height="100%" frameborder="0"></iframe>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            </div>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
get_footer();
?>

<style>
    :root {
        --my-color: <?= $couleur_profil ?>;
    }

    .cv__title,
    .profil__name {
        color: var(--my-color);
    }

    .bar {
        background-color: var(--my-color);
    }
</style>
