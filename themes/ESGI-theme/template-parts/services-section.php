<?php

/**
 * Template part for displaying Services section
 */

$services_title = get_theme_mod('esgi_services_title', 'Our Services');
?>

<section class="services-section">
    <div class="services-wrapper">
        <h2 class="services-title"><?php echo esc_html($services_title); ?></h2>
        <div class="services-grid">
            <?php 
            // Images par défaut
            $default_images = ['12.png', '5.png', '5.png', '3.png'];
            
            for ($i = 1; $i <= 4; $i++) : 
                $service_image_id = get_theme_mod("esgi_services_image_$i");
            ?>
                <div class="service-item">
                    <?php if ($service_image_id) : 
                        $service_image = wp_get_attachment_image($service_image_id, 'large', false, ['class' => 'hero-img']);
                        echo $service_image;
                    else : ?>
                        <!-- Image par défaut -->
                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/<?php echo $default_images[$i-1]; ?>" alt="Service Image <?php echo $i; ?>" class="hero-img">
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div> 
    </div>
</section>