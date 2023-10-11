<div class="product-feature-block product-feature-block--<?php echo $featureNumber; ?> <?php echo ($featureNumber % 2 !== 0) ? 'even' : ''; ?>">
    <div class="product-feature-content">
        <div class="block-product-subtitle-container">
            <?php if ($productFeatureLogo): ?>
                <div class="block-product-subtitle-picto">
                    <img src="<?php echo $productFeatureLogo['url']; ?>" alt="" loading="lazy" />

                    <span class="block-product-subtitle-picto-count"><?php echo ($featureNumber + 1); ?></span>
                </div>
            <?php endif; ?>
        </div>

        <h2 class="block-title block-title--feature"><?php echo $productFeatures[$featureNumber]['product_feature_title']; ?></h2>

        <div class="product-feature-description"><?php echo $productFeatures[$featureNumber]['product_feature_description']; ?></div>
    </div>

    <?php if (!empty($productFeatures[$featureNumber]['product_feature_image'])): ?>
        <?php
            $extension = '.svg';
            $posExtension = strpos($productFeatures[$featureNumber]['product_feature_image']['filename'], $extension, strlen($productFeatures[$featureNumber]['product_feature_image']['filename']) - strlen($extension));
            $classSvg = '';
            if ($posExtension) {
                $classSvg = 'product-feature-image--svg';
            }
        ?>
        <div class="product-feature-image <?php echo $classSvg; ?> product-image">
            <img src="<?php echo $productFeatures[$featureNumber]['product_feature_image']['sizes']['medium_large']; ?>" alt="<?php echo get_the_title(); ?> <?php _e('fonctionnalité', 'themede'); ?> <?php echo ($featureNumber + 1); ?>" loading="lazy" />
        </div>
    <?php endif; ?>
</div>