<?php get_header(); ?>

<main class="blog-page">
   <h1 class="page-title">Blog</h1>

   <div class="container">
      <header class="page-header">
         <p class="page-description">Découvrez nos derniers articles et actualités</p>
      </header>

      <div class="blog-posts">
         <?php if (have_posts()) : ?>
            <div class="posts-grid">
               <?php while (have_posts()) : the_post(); ?>
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
               the_posts_pagination([
                  'mid_size' => 2,
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
         <?php endif; ?>
      </div>
   </div>
</main>

<?php get_footer(); ?>