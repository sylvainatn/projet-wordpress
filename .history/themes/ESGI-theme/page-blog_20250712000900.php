<?php get_header(); ?>

<main class="container">
   <h1 class="hero-title">Blog.</h1>

   <section class="blog-content">

      <!-- Section de recherche -->
      <div class="search-section">
         <h2>Search</h2>
         <form role="search" method="get" action="<?php echo home_url('/'); ?>">
            <input type="search" placeholder="Type to search" value="<?php echo get_search_query(); ?>" name="s" />
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
                     <h3><?php echo $post['post_title']; ?></h3>
                     <p><?php echo get_the_date('j M, Y', $post['ID']); ?></p>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>

      <!-- Section des archives -->
      <div class="archives-section">
         <h2>Archives</h2>
         <ul class="archives-list">
            <?php
            $archives = wp_get_archives(array(
               'type' => 'monthly',
               'limit' => 12,
               'format' => 'html',
               'echo' => 0,
               'after' => '</li>'
            ));
            echo $archives;
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
            foreach ($categories as $category) : ?>
               <li>
                  <a href="<?php echo get_category_link($category->term_id); ?>">
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
            foreach ($tags as $tag) : ?>
               <li>
                  <a href="<?php echo get_tag_link($tag->term_id); ?>">
                     <?php echo $tag->name; ?>
                  </a>
               </li>
            <?php endforeach; ?>
         </ul>
      </div>       





















   </section>
</main>

<?php get_footer(); ?>