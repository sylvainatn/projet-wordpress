<?php 
if (get_theme_mod('esgi_corp_parties_enable', true)) : 
    $title = get_theme_mod('esgi_corp_parties_title', 'Corp. Parties');
    $content = get_theme_mod('esgi_corp_parties_content', 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.');
    $image_id = get_theme_mod('esgi_corp_parties_image');
?>

<section class="corp-parties-section">
    <div class="corp-parties-text-content">
        <h3><?php echo esc_html($title); ?></h3>
        <p><?php echo wp_kses_post($content); ?></p>
    </div>
    <?php if ($image_id) : 
        echo wp_get_attachment_image($image_id, 'large', false, ['alt' => esc_attr($title)]);
    else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/9.png" alt="<?php echo esc_attr($title); ?>">
    <?php endif; ?>
</section>

<?php endif; ?>