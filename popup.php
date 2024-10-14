<div class="popup">
    <div class="popup-section">
        <img src="<?php echo get_theme_mod('popup_background_image') ?>" alt="">
    </div>
    <div class="popup-section">
        <?php the_custom_logo(); ?>
        <h2><?php echo get_theme_mod('popup-title') ?></h2>
        <p><?php echo get_theme_mod('popup-description') ?></p>

        <form action="">
            <div class="form-field form-inline">
                <input type="text" class="form-control" name="name" placeholder="Name">
                <input type="text" class="form-control" name="lastname" placeholder="Lastname">
            </div>
            <div class="form-field">
                <input type="tel" class="form-control" name="telephone" id="" placeholder="Phone Number">
            </div>
            <div class="form-field">
                <input type="email" class="form-control" name="email" id="" placeholder="Email">
            </div>
            <div class="form-field">
                <input type="date" class="form-control" name="birthdate" id="" placeholder="Birthdate">
            </div>
            <button class="btn btn-primary">Confirmar</button>
        </form>
    </div>
</div>