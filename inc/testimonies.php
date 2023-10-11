<div class="slider-training-testimonies container--only-desktop" id="slider-training-testimonies">
    <?php foreach ($testimonies as $aTestimony): ?>
        <div class="slider-training-testimonies-slide">
            <div class="slider-training-testimonies-slide-content">
                <p class="training-testimony-person-data">
                    <span class="training-testimony-person-data-name"><?php echo $aTestimony[$testimonyKey . 'name']; ?></span>
                    <?php if (isset($aTestimony[$testimonyKey . 'company']) && trim($aTestimony[$testimonyKey . 'company']) !== ''): ?>
                        <span class="training-testimony-person-data-company"><?php echo $aTestimony[$testimonyKey . 'company']; ?></span>
                    <?php endif; ?>
                </p>

                <div class="training-testimony-content"><?php echo $aTestimony[$testimonyKey . 'content']; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>