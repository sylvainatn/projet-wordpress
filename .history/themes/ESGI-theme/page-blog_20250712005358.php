<?php get_header(); ?>

<main class="container">
   <h1 class="hero-title">Blog.</h1>



   <section class="blog-content">
      <!-- Section principale avec les posts -->
      <div class="main-posts-section">
         <div class="posts-grid">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_query = new WP_Query(array(
               'post_type' => 'post',
               'posts_per_page' => 6,
               'paged' => $paged,
               'post_status' => 'publish'
            ));

            if ($posts_query->have_posts()) :
               while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                  <article class="post-card">
                     <div class="post-image">
                        <?php
                        if (has_post_thumbnail()) {
                           the_post_thumbnail('medium');
                        } else {
                           echo '<img src="' . get_template_directory_uri() . '/src/images/png/1.png" alt="Default image" />';
                        }
                        ?>
                        <div class="post-category">
                           <?php
                           $categories = get_the_category();
                           if ($categories) {
                              echo $categories[0]->name;
                           } else {
                              echo 'Uncategorized';
                           }
                           ?>
                        </div>
                     </div>
                     <div class="post-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                     </div>
                  </article>
               <?php endwhile;

               // Pagination
               if ($posts_query->max_num_pages > 1) : ?>
                  <div class="pagination-wrapper">
                     <?php
                     echo paginate_links(array(
                        'total' => $posts_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                     ));
                     ?>
                  </div>
            <?php endif;
               wp_reset_postdata();
            endif;
            ?>
         </div>
      </div>


   </section>
</main>

<?php get_footer(); ?>