<?php

/**
 * Template part for displaying About Us section
 */

$about_title = get_theme_mod('esgi_about_title', 'About Us');
// $about_subtitle = get_theme_mod('esgi_about_subtitle', 'Discover our story');
$about_content = get_theme_mod('esgi_about_content', 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.');
?>

<section class="about-section">
    <div class="about-wrapper">
        <div class="about-content">
            <h2 class="about-title"><?php echo esc_html($about_title); ?></h2>
            <div class="about-text">
                <p>
                    <?php echo wp_kses_post($about_content); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="about-us-information">
        <div>
            <?php
            $about_image_id = get_theme_mod('esgi_about_image');
            if ($about_image_id) :
                $about_image = wp_get_attachment_image($about_image_id, 'large', false, ['class' => 'hero-img']);
                echo $about_image;
            else : ?>
                <!-- Image par défaut -->
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/2.png" alt="About Us Image" class="hero-img">
            <?php endif; ?>
        </div>
        <div class="about-us-information-text">
            <div>
                <h3><?php echo esc_html(get_theme_mod('esgi_about_who_title', 'Who are we?')); ?></h3>
                <p><?php echo wp_kses_post(get_theme_mod('esgi_about_who_content', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu convallis elit, at convallis magna.')); ?></p>
            </div>
            <div>
                <h3><?php echo esc_html(get_theme_mod('esgi_about_vision_title', 'Our vision')); ?></h3>
                <p><?php echo wp_kses_post(get_theme_mod('esgi_about_vision_content', 'Nullam faucibus interdum massa. Duis eget leo mattis, pulvinar nisi et, consequat lectus. Suspendisse commodo magna orci, id luctus risus porta pharetra. Fusce vehicula aliquet urna non ultricies.')); ?></p>
            </div>
            <div>
                <h3><?php echo esc_html(get_theme_mod('esgi_about_mission_title', 'Our mission')); ?></h3>
                <p><?php echo wp_kses_post(get_theme_mod('esgi_about_mission_content', 'Vivamus et viverra neque, ut pharetra ipsum. Aliquam eget consequat libero, quis cursus tortor. Aliquam suscipit eros sit amet velit malesuada dapibus. Fusce in vehicula tellus. Donec quis lorem ut magna tincidunt egestas.')); ?></p>
            </div>
        </div>
    </div>
</section>