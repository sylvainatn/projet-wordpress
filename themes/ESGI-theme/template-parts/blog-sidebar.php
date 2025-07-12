<aside class="blog-sidebar">

   <?php
   // Définir l'URL de la page blog une seule fois pour toute la sidebar
   $blog_page_id = get_page_by_path('blog');
   if ($blog_page_id) {
      $blog_url = get_permalink($blog_page_id->ID);
   } else {
      $blog_url = home_url('/blog/');
   }
   ?>

   <!-- Section de recherche -->
   <div class="search-section">
      <h2>Search</h2>
      <form role="search" method="get" action="<?php echo $blog_url; ?>">
         <input type="search" placeholder="Type to search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" name="search" />
         <button type="submit"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6656 10.7188L15.7812 13.8344C16.0719 14.1281 16.0719 14.6031 15.7781 14.8969L14.8938 15.7812C14.6031 16.075 14.1281 16.075 13.8344 15.7812L10.7188 12.6656C10.5781 12.525 10.5 12.3344 10.5 12.1344V11.625C9.39688 12.4875 8.00937 13 6.5 13C2.90937 13 0 10.0906 0 6.5C0 2.90937 2.90937 0 6.5 0C10.0906 0 13 2.90937 13 6.5C13 8.00937 12.4875 9.39688 11.625 10.5H12.1344C12.3344 10.5 12.525 10.5781 12.6656 10.7188ZM2.5 6.5C2.5 8.7125 4.29063 10.5 6.5 10.5C8.7125 10.5 10.5 8.70938 10.5 6.5C10.5 4.2875 8.70938 2.5 6.5 2.5C4.2875 2.5 2.5 4.29063 2.5 6.5Z" fill="#969696" />
            </svg>
         </button>
      </form>
   </div>

   <!-- Section des articles récents -->
   <div class="recent-posts-section">
      <h2>Recent posts</h2>
      <div class="recent-posts">
         <?php
         $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 4,
            'post_status' => 'publish'
         ));

         $backup_post = $post ?? null;
         foreach ($recent_posts as $post) : ?>
            <div class="recent-post-item">
               <div class="post-thumbnail">
                  <?php
                  if (has_post_thumbnail($post['ID'])) {
                     echo get_the_post_thumbnail($post['ID'], 'thumbnail');
                  } else {
                     echo '<img src="' . get_template_directory_uri() . '/src/images/png/1.png" alt="Default image" />';
                  }
                  ?>
               </div>
               <div class="post-content">
                  <h3><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h3>
                  <p><?php echo get_the_date('j M, Y', $post['ID']); ?></p>
               </div>
            </div>
         <?php endforeach;
         if (isset($backup_post)) {
            $post = $backup_post;
         } else {
            unset($post);
         }
         ?>
      </div>
   </div>

   <!-- Section des archives -->
   <div class="archives-section">
      <h2>Archives</h2>
      <ul class="archives-list">
         <?php
         // Si wp_get_archives ne fonctionne pas en format custom, on fait manuellement
         global $wpdb;
         $months = $wpdb->get_results("
            SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts
            FROM $wpdb->posts 
            WHERE post_type = 'post' AND post_status = 'publish'
            GROUP BY YEAR(post_date), MONTH(post_date) 
            ORDER BY post_date DESC
            LIMIT 12
         ");

         if ($months) {
            foreach ($months as $month) {
               $month_name = date('F', mktime(0, 0, 0, $month->month, 1));
               $archive_date = $month->year . sprintf('%02d', $month->month);

               // Conserver les paramètres existants et ajouter/remplacer le filtre archive
               $current_params = $_GET;
               $current_params['archive'] = $archive_date; // Utiliser 'archive' au lieu de 'm'
               // Supprimer le paramètre de page pour éviter les conflits
               unset($current_params['paged']);
               $archive_url = add_query_arg($current_params, $blog_url);

               $is_active = (isset($_GET['archive']) && $_GET['archive'] == $archive_date) ? ' class="active"' : '';

               echo '<li' . $is_active . '><a href="' . $archive_url . '">' . $month_name . ' ' . $month->year . ' (' . $month->posts . ')</a></li>';
            }
         } else {
            echo '<li>No archives found</li>';
         }
         ?>
      </ul>
   </div>

   <!-- Section des catégories -->
   <div class="categories-section">
      <h2>Categories</h2>
      <ul class="categories-list">
         <?php
         $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC'
         ));

         foreach ($categories as $category) :
            // Conserver les paramètres existants et ajouter/remplacer le filtre catégorie
            $current_params = $_GET;
            $current_params['category'] = $category->term_id; // Utiliser 'category' au lieu de 'cat'
            $category_url = add_query_arg($current_params, $blog_url);

            $is_active = (isset($_GET['category']) && $_GET['category'] == $category->term_id) ? ' class="active"' : '';
         ?>
            <li<?php echo $is_active; ?>>
               <a href="<?php echo $category_url; ?>">
                  <?php echo $category->name; ?>
               </a>
               </li>
            <?php endforeach; ?>
      </ul>
   </div>

   <!-- Section des tags -->
   <div class="tags-section">
      <h2>Tags</h2>
      <ul class="tags-list">
         <?php
         $tags = get_tags(array(
            'orderby' => 'name',
            'order' => 'ASC'
         ));
         foreach ($tags as $tag) :
            // Conserver les paramètres existants et ajouter/remplacer le filtre tag
            $current_params = $_GET;
            $current_params['tag_filter'] = $tag->slug; // Utiliser 'tag_filter' au lieu de 'tag'
            $tag_url = add_query_arg($current_params, $blog_url);

            $is_active = (isset($_GET['tag_filter']) && $_GET['tag_filter'] == $tag->slug) ? ' class="active"' : '';
         ?>
            <li<?php echo $is_active; ?>>
               <a href="<?php echo $tag_url; ?>">
                  <?php echo $tag->name; ?>
               </a>
               </li>
            <?php endforeach; ?>
      </ul>
   </div>
</aside>