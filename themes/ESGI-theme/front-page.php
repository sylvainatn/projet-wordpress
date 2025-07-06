<?php get_header(); ?>

<main class="container">
    <?php get_template_part('template-parts/hero-section'); ?>

    <?php if (get_theme_mod('esgi_about_enable', true)) : ?>
        <?php get_template_part('template-parts/about-section'); ?>
    <?php endif; ?>

    <?php if (get_theme_mod('esgi_services_enable', true)) : ?>
        <?php get_template_part('template-parts/services-section'); ?>
    <?php endif; ?>

    <?php if (get_theme_mod('esgi_partners_enable', true)) : ?>
        <?php get_template_part('template-parts/partners-section'); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>