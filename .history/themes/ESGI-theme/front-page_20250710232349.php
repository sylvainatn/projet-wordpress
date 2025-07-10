<?php get_header(); ?>

<main class="container">
    <?php get_template_part('template-parts/hero-section'); ?>

    <?php if (get_theme_mod('esgi_about_enable', true)) : ?>
        <div id="about">
            <?php get_template_part('template-parts/about-section'); ?>
        </div>
    <?php endif; ?>

    <?php if (get_theme_mod('esgi_services_enable', true)) : ?>
        <div id="services">
            <?php get_template_part('template-parts/services-section'); ?>
        </div>
    <?php endif; ?>

    <?php if (get_theme_mod('esgi_partners_enable', true)) : ?>
        <div id="partners">
            <?php get_template_part('template-parts/partners-section'); ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>