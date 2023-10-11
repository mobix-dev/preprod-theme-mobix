<div class="slider-training-testimonies container--only-desktop" id="slider-training-testimonies">
    <?php foreach ($testimonies as $aTestimony): ?>
<!--    --><?php //var_dump($aTestimony) ?>
        <div class="slider-training-testimonies-slide">
            <div class="slider-training-testimonies-slide-content">
                <p class="training-testimony-person-data">
                    <span class="quote-icon"></span>
                    <span class="star star-<?= $aTestimony['note'] ?> lp-crm-testimony-score"></span>
                    <span class="lp-crm-testimony-message"><?php echo $aTestimony['message']; ?></span>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>