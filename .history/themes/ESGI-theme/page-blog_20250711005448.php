<?php
/*
Template Name: Blog Page
*/
get_header(); ?>

<main class="container">
   <section class="hero-section">
      <div class="hero-content">
         <h1 class="hero-title"><?php echo esc_html(get_theme_mod('esgi_hero_title', 'A really professional structure for all your events!')); ?></h1>
      </div>
   </section>
</main>

<?php get_footer(); ?>