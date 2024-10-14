<div class="popup">
    <div class="popup-section">
        <img src="<?php echo get_theme_mod('popup_background_image') ?>" alt="">
    </div>
    <div class="popup-section">
        <?php the_custom_logo(); ?>
        <h2><?php echo get_theme_mod('popup-title') ?></h2>
        <p><?php echo get_theme_mod('popup-description') ?></p>

        <form action="">
            <div class="form-inline">
                <input type="text" class="form-control" name="">
                <input type="text" class="form-control" name="">
            </div>
            <div class="form-field">
                <input type="email" name="" id="">
            </div>
        </form>
    </div>
</div>