<?php get_header(); ?>

<style>
   .search-results {
      padding: 2rem 0;
      background: #f8f9fa;
      min-height: 60vh;
   }

   .search-content {
      background: white;
      padding: 2rem;
      border-radius: 8px;
   }

   .search-title {
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      color: #343a40;
   }

   .results-section h2 {
      font-size: 1.2rem;
      color: #007bff;
      margin: 1.5rem 0 1rem 0;
      border-bottom: 2px solid #e9ecef;
      padding-bottom: 0.5rem;
   }

   .results-list {
      list-style: none;
      padding: 0;
   }

   .results-list li {
      padding: 0.75rem 0;
      border-bottom: 1px solid #f1f1f1;
   }

   .results-list li:last-child {
      border-bottom: none;
   }

   .results-list a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
   }

   .results-list a:hover {
      color: #0056b3;
      text-decoration: underline;
   }

   .no-results {
      text-align: center;
      color: #6c757d;
      padding: 2rem;
   }
</style>

<div class="search-results">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="search-content">
               <h1 class="search-title">Résultats de la recherche pour "<?php echo get_search_query(); ?>"</h1>

               <?php
               $has_results = false;

               // Recherche des pages
               $pages_query = new WP_Query([
                  'post_type' => 'page',
                  's' => get_search_query(),
                  'posts_per_page' => -1
               ]);

               if ($pages_query->have_posts()) :
                  $has_results = true; ?>
                  <div class="results-section">
                     <h2><?php echo $pages_query->found_posts; ?> page(s) trouvée(s)</h2>
                     <ul class="results-list">
                        <?php while ($pages_query->have_posts()) : $pages_query->the_post(); ?>
                           <li>
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </li>
                        <?php endwhile; ?>
                     </ul>
                  </div>
               <?php
               endif;
               wp_reset_postdata();

               // Recherche des articles
               $posts_query = new WP_Query([
                  'post_type' => 'post',
                  's' => get_search_query(),
                  'posts_per_page' => -1
               ]);

               if ($posts_query->have_posts()) :
                  $has_results = true; ?>
                  <div class="results-section">
                     <h2><?php echo $posts_query->found_posts; ?> article(s) trouvé(s)</h2>
                     <ul class="results-list">
                        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                           <li>
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </li>
                        <?php endwhile; ?>
                     </ul>
                  </div>
               <?php
               endif;
               wp_reset_postdata();

               if (!$has_results) : ?>
                  <div class="no-results">
                     <p>Aucun résultat trouvé pour votre recherche.</p>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>