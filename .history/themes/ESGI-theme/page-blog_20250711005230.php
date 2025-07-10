<?php
/*
Template Name: Blog Page
*/
get_header(); ?>

<main class="container">
   <div class="hero-content">
      <h1 class="hero-title">Blog</h1>
<
   <div class="blog-posts">
      <?php
      $blog_posts = new WP_Query([
         'post_type' => 'post',
         'posts_per_page' => 10,
         'post_status' => 'publish',
         'paged' => get_query_var('paged') ?: 1
      ]);

      if ($blog_posts->have_posts()) : ?>
         <div class="posts-grid">
            <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
               <article class="post-card">
                  <?php if (has_post_thumbnail()) : ?>
                     <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                           <?php the_post_thumbnail('medium'); ?>
                        </a>
                     </div>
                  <?php endif; ?>

                  <div class="post-content">
                     <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     </h2>

                     <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author">Par <?php the_author(); ?></span>
                     </div>

                     <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                     </div>

                     <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                  </div>
               </article>
            <?php endwhile; ?>
         </div>

         <div class="pagination">
            <?php
            echo paginate_links([
               'total' => $blog_posts->max_num_pages,
               'current' => max(1, get_query_var('paged')),
               'prev_text' => '← Précédent',
               'next_text' => 'Suivant →',
            ]);
            ?>
         </div>

      <?php else : ?>
         <div class="no-posts">
            <h2>Aucun article trouvé</h2>
            <p>Il n'y a pas encore d'articles publiés sur ce blog.</p>
         </div>
      <?php endif;
      wp_reset_postdata(); ?>
   </div>
</main>

<?php get_footer(); ?>