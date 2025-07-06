<section class="partners-section">
        <h2 class="partners-title"><?php echo esc_html(get_theme_mod('esgi_partners_title', 'Our Partners')); ?></h2>
        <div class="partners-grid">
            <?php for ($i = 1; $i <= 6; $i++) : 
                $partner_image_id = get_theme_mod("esgi_partners_image_$i");
            ?>
                <div class="partner-logo">
                    <?php if ($partner_image_id) : 
                        $partner_image = wp_get_attachment_image($partner_image_id, 'medium', false, ['alt' => "Partner $i"]);
                        echo $partner_image;
                    else : ?>
                        <!-- Image par défaut -->
                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/partner-<?php echo $i; ?>.svg" alt="Partner <?php echo $i; ?>">
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
</section>
