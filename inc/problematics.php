<?php
    $homeId = get_option('page_on_front');

	$sliderProblematicTitle = get_field('problematic_title', $homeId);
	$sliderProblematic = get_field('problematic_slides', $homeId);
	$theProblematics = get_terms('problematic', [
		'hide_empty' => false,
	]);

	$problematics = [];
	foreach ($theProblematics as $aProblematic) {
		$problematics[$aProblematic->term_id] = $aProblematic;
		$problematics[$aProblematic->term_id]->color = get_field('problematic_taxonomy_color', $aProblematic);
	}

	// On trie par type de problématique (pour les regrouper)
	usort($sliderProblematic, function ($a, $b) {
		return $a['problematic_slide_problematic'] - $b['problematic_slide_problematic'];
	});

    $theProblematic = false;
    $termsProblematics = get_the_terms($id, 'problematic');
    if (!empty($termsProblematics)) {
        $theProblematic = $termsProblematics[0];
    }
?>

<div class="slider-problematics-block">
    <p class="slider-problematics-block-title">
        <?php echo $sliderProblematicTitle; ?>
        <br />
        <span class="problematic-choice-container">
            <select name="problematic-choice" autocomplete="off">
                <?php if (!$theProblematic): ?>
                    <option value="" selected="selected"><?php _e('thématique', 'themede'); ?></option>
                <?php endif; ?>
                <?php foreach ($problematics as $aProblematic): ?>
                    <option value="<?php echo $aProblematic->term_id; ?>" <?php if ($theProblematic && $theProblematic->term_id === $aProblematic->term_id): ?>selected="selected"<?php endif; ?>><?php echo $aProblematic->name; ?></option>
                <?php endforeach; ?>
            </select>
        </span>
        <select id="problematic-choice-tmp"><option id="problematic-choice-tmp-option"></option></select>
    </p>

    <?php foreach ($sliderProblematic as $aSlide): ?>
        <style>
            [data-problematic="<?php echo $aSlide['problematic_slide_problematic']; ?>"] .slider-problematics-link:hover {
                background-color: transparent !important;
                color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?> !important;
            }
        </style>
    <?php endforeach; ?>

    <div class="slider-problematics slider-center" id="slider-problematics">
        <?php foreach ($sliderProblematic as $aSlide): ?>
            <div class="slider-problematics-slide" data-problematic="<?php echo $aSlide['problematic_slide_problematic']; ?>">
                <div class="slide-content slider-problematics-slide-content">
                    <div class="slider-problematics-image-container">
                        <div class="slider-problematics-image-filter" style="background-color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?>;"></div>
                        <img src="<?php echo $aSlide['problematic_slide_image']['sizes']['medium_large']; ?>" class="slider-problematics-image" alt="" loading="lazy" />
                    </div>

                    <div class="slider-problematics-content">
                        <p class="slider-problematics-content-title" style="border-color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?>; color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?>;"><?php echo $aSlide['problematic_slide_title']; ?></p>

                        <div class="slider-problematics-content-hidden">
                            <p class="slider-problematics-content-subtitle"><?php echo $aSlide['problematic_slide_subtitle']; ?></p>
                            <p class="slider-problematics-content-description"><?php echo $aSlide['problematic_slide_description']; ?></p>

                            <a href="<?php echo $aSlide['problematic_slide_link']; ?>" class="button slider-problematics-link" style="background-color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?>; border-color: <?php echo $problematics[$aSlide['problematic_slide_problematic']]->color; ?>;"><?php echo __('Découvrir', 'themede') . ' ' . $aSlide['problematic_slide_title']; ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>