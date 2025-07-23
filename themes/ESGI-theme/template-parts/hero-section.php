<?php
// Détecter la page actuelle pour afficher les bonnes données
$current_page = '';
$hero_title = '';
$hero_image_id = '';


if (is_page_template('page-about-us.php') || is_page('about-us')) {
    // Page About Us
    $current_page = 'about';
    $hero_title = get_theme_mod('hero_about_title', 'About us.');
    $hero_image_id = get_theme_mod('hero_about_image');
} else {
    $current_page = 'front';
    $hero_title = get_theme_mod('hero_front_title', 'A really professional structure for all your events!');
    $hero_image_id = get_theme_mod('hero_front_image');
}
?>

<section class="hero-section" data-page="<?php echo esc_attr($current_page); ?>">
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
    </div>
    <div class="hero-image">
        <?php
        if ($hero_image_id) :
            $hero_image = wp_get_attachment_image($hero_image_id, 'large', false, ['class' => 'hero-img']);
            echo $hero_image;
        else : ?>
            <!-- Image par defaut  -->
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/1.png" alt="Hero Image" class="hero-img">
        <?php endif; ?>
    </div>
</section>