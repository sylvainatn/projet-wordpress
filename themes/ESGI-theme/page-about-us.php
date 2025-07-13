<?php
/*
Template Name: About Us Template
*/

get_header(); ?>

<main class="container">

    <div id="heros">
        <?php get_template_part('template-parts/hero-section'); ?>
    </div>

    <div id="about">
        <?php get_template_part('template-parts/about-section'); ?>
    </div>

    <div id="team">
        <?php get_template_part('template-parts/team-section'); ?>
    </div>
</main>

<?php get_footer(); ?>