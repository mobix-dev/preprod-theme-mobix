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

<div class="slider-leads-block">

    <div class="slider-problematics slider-center" id="slider-problematics">
        <?php foreach ($leads as $aSlide): ?>
            <div class="slider-leads-slide">
                <div class="slide-content slider-leads-slide-content">
                    <div class="slider-leads-image-container">
                        <div class="slider-leads-image-filter"></div>
                        <img src="<?php echo $aSlide['logo']['url']; ?>" class="slider-leads-image" alt="" loading="lazy" />
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>