<?php
    $content = get_the_content();

    $content = preg_replace('/\<img (.*) class="wp-image(.*)\>/', '<img loading="lazy" $1 class="wp-image$2>', $content);

    if (isset($featuredImageUrl) && trim($featuredImageUrl) !== '') {
        $content = preg_replace('/<\/p>/', '</p> <img src="' . $featuredImageUrl . '" alt="" class="featured-image" loading="lazy" />', $content, 1);
    }

    $content = str_replace('is-style-outline"><a class="wp-block-button__link"', 'is-style-outline"><a class="button button-stroke"', $content);
    $content = str_replace('wp-block-button__link', 'button', $content);

    echo $content;
?>