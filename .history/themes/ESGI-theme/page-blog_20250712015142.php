<?php get_header(); ?>

<main class="container">

   <h1 class="hero-title">Blog.</h1>

   <section class="blog-content">
      <?php get_template_part('template-parts/blog-sidebar'); ?>

      <!-- Section principale avec les posts -->
      <div class="main-posts-section">
         
         <?php
         // Afficher les filtres actifs
         $active_filters = array();
         
         if (isset($_GET['m']) && !empty($_GET['m'])) {
            $date_filter = $_GET['m'];
            $year = substr($date_filter, 0, 4);
            $month = substr($date_filter, 4, 2);
            if (!empty($month)) {
               $month_name = date('F', mktime(0, 0, 0, $month, 1));
               $active_filters[] = array('type' => 'archive', 'label' => $month_name . ' ' . $year, 'param' => 'm');
            } else {
               $active_filters[] = array('type' => 'archive', 'label' => 'Year ' . $year, 'param' => 'm');
            }
         }
         
         if (isset($_GET['cat']) && !empty($_GET['cat'])) {
            $category = get_category($_GET['cat']);
            if ($category) {
               $active_filters[] = array('type' => 'category', 'label' => 'Category: ' . $category->name, 'param' => 'cat');
            }
         }
         
         if (isset($_GET['tag']) && !empty($_GET['tag'])) {
            $active_filters[] = array('type' => 'tag', 'label' => 'Tag: ' . $_GET['tag'], 'param' => 'tag');
         }
         
         if (isset($_GET['s']) && !empty($_GET['s'])) {
            $active_filters[] = array('type' => 'search', 'label' => 'Search: "' . $_GET['s'] . '"', 'param' => 's');
         }
         
         if (!empty($active_filters)) : ?>
            <div class="active-filters">
               <span class="filters-label">Active filters:</span>
               <?php foreach ($active_filters as $filter) : 
                  $clear_url = remove_query_arg($filter['param']);
               ?>
                  <span class="filter-tag">
                     <?php echo $filter['label']; ?>
                     <a href="<?php echo $clear_url; ?>" class="remove-filter">×</a>
                  </span>
               <?php endforeach; ?>
               <a href="<?php echo get_permalink(); ?>" class="clear-all-filters">Clear all</a>
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
            );

            // Vérifier s'il y a un filtre par date (archive)
            if (isset($_GET['m']) && !empty($_GET['m'])) {
               $date_filter = $_GET['m'];
               $year = substr($date_filter, 0, 4);
               $month = substr($date_filter, 4, 2);
               
               $query_args['year'] = $year;
               if (!empty($month)) {
                  $query_args['monthnum'] = $month;
               }
            }

            // Vérifier s'il y a un filtre par catégorie
            if (isset($_GET['cat']) && !empty($_GET['cat'])) {
               $query_args['cat'] = $_GET['cat'];
            }

            // Vérifier s'il y a un filtre par tag
            if (isset($_GET['tag']) && !empty($_GET['tag'])) {
               $query_args['tag'] = $_GET['tag'];
            }

            // Vérifier s'il y a une recherche
            if (isset($_GET['s']) && !empty($_GET['s'])) {
               $query_args['s'] = $_GET['s'];
            }

            $posts_query = new WP_Query($query_args);

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
            endif;
            ?>
         </div>
      </div>


   </section>

</main>

<?php get_footer(); ?>