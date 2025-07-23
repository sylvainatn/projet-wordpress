<?php get_header(); ?>

<main class="container">

   <div class="hero-content">
   <h1 class="hero-title">Blog.</h1>
   </div>

   <section class="blog-content">
      <?php get_template_part('template-parts/blog-sidebar'); ?>

      <!-- Section principale avec les posts -->
      <div class="main-posts-section">

         <?php
         // Afficher les filtres actifs
         $active_filters = array();

         // Obtenir l'URL de la page blog pour les liens de suppression
         $blog_page_id = get_page_by_path('blog');
         if ($blog_page_id) {
            $blog_url = get_permalink($blog_page_id->ID);
         } else {
            $blog_url = home_url('/blog/');
         }

         if (isset($_GET['archive']) && !empty($_GET['archive'])) {
            $date_filter = $_GET['archive'];
            $year = substr($date_filter, 0, 4);
            $month = substr($date_filter, 4, 2);
            if (!empty($month)) {
               $month_name = date('F', mktime(0, 0, 0, $month, 1));
               $active_filters[] = array('type' => 'archive', 'label' => $month_name . ' ' . $year, 'param' => 'archive');
            } else {
               $active_filters[] = array('type' => 'archive', 'label' => 'Year ' . $year, 'param' => 'archive');
            }
         }

         if (isset($_GET['category']) && !empty($_GET['category'])) {
            $category = get_category($_GET['category']);
            if ($category) {
               $active_filters[] = array('type' => 'category', 'label' => 'Category: ' . $category->name, 'param' => 'category');
            }
         }

         if (isset($_GET['tag_filter']) && !empty($_GET['tag_filter'])) {
            $active_filters[] = array('type' => 'tag', 'label' => 'Tag: ' . $_GET['tag_filter'], 'param' => 'tag_filter');
         }

         if (isset($_GET['search']) && !empty($_GET['search'])) {
            $active_filters[] = array('type' => 'search', 'label' => 'Search: "' . $_GET['search'] . '"', 'param' => 'search');
         }

         if (!empty($active_filters)) : ?>
            <div class="active-filters">
               <span class="filters-label">Active filters:</span>
               <?php foreach ($active_filters as $filter) :
                  $clear_url = remove_query_arg($filter['param'], $blog_url);
               ?>
                  <span class="filter-tag">
                     <?php echo $filter['label']; ?>
                     <a href="<?php echo $clear_url; ?>" class="remove-filter">×</a>
                  </span>
               <?php endforeach; ?>
               <a href="<?php echo $blog_url; ?>" class="clear-all-filters">Clear all</a>
            </div>
         <?php endif; ?>

         <div class="posts-grid">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // Préparer les arguments de base pour la requête
            $query_args = array(
               'post_type' => 'post',
               'posts_per_page' => 6,
               'paged' => $paged,
               'post_status' => 'publish'
            );            // Vérifier s'il y a un filtre par date (archive)
            if (isset($_GET['archive']) && !empty($_GET['archive'])) {
               $date_filter = $_GET['archive'];
               $year = substr($date_filter, 0, 4);
               $month = substr($date_filter, 4, 2);

               // Utiliser date_query pour plus de robustesse
               $date_query = array(
                  'year' => intval($year)
               );

               if (!empty($month) && $month !== '00') {
                  $date_query['month'] = intval($month);
               }

               $query_args['date_query'] = array($date_query);
            }

            // Vérifier s'il y a un filtre par catégorie
            if (isset($_GET['category']) && !empty($_GET['category'])) {
               $query_args['cat'] = $_GET['category'];
            }

            // Vérifier s'il y a un filtre par tag
            if (isset($_GET['tag_filter']) && !empty($_GET['tag_filter'])) {
               $query_args['tag'] = $_GET['tag_filter'];
            }

            // Vérifier s'il y a une recherche
            if (isset($_GET['search']) && !empty($_GET['search'])) {
               $query_args['s'] = $_GET['search'];
            }

            $posts_query = new WP_Query($query_args);

            // Debug : afficher les paramètres de la requête si nécessaire
            if (isset($_GET['debug']) && current_user_can('administrator')) {
               echo '<pre>';
               echo 'Query args: ';
               print_r($query_args);
               echo 'Found posts: ' . $posts_query->found_posts;
               echo '</pre>';
            }

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
                        // 'next_text' => 'Next →',
                     ));
                     ?>
                  </div>
               <?php endif;
               wp_reset_postdata();
            else : ?>
               <div class="no-posts-found">
                  <h3>No posts found</h3>
                  <p>Sorry, no posts match your current filters. Try adjusting your search criteria or <a href="<?php echo get_permalink(); ?>">view all posts</a>.</p>
               </div>
            <?php endif;
            ?>
         </div>
      </div>


   </section>

</main>

<?php get_footer(); ?>