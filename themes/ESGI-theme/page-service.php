<?php
/*
Template Name: Service Template
*/

get_header(); ?>

<main class="container">

    <div id="services">
        <?php get_template_part('template-parts/services-section'); ?>
    </div>

    <div id="corp-parties">
        <?php get_template_part('template-parts/corp-parties-section'); ?>
    </div>

</main>

<?php get_footer(); ?>