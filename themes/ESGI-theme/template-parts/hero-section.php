<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html(get_theme_mod('esgi_hero_title', 'A really professional structure for all your events!')); ?></h1>
    </div>
    <div class="hero-image">
        <?php
        $hero_image_id = get_theme_mod('esgi_hero_image');
        if ($hero_image_id) :
            $hero_image = wp_get_attachment_image($hero_image_id, 'large', false, ['class' => 'hero-img']);
            echo $hero_image;
        else : ?>
            <!-- Image par defaut  -->
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/1.png" alt="Hero Image" class="hero-img">
        <?php endif; ?>
    </div>
</section>