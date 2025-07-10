<?php get_header(); ?>

<main class="container">
   <h1 class="hero-title">Blog.</h1>
   
   <section class="blog-content">
       <!-- Section de recherche -->
       <div class="search-section">
           <h2>Search</h2>
           <form role="search" method="get" action="<?php echo home_url('/'); ?>">
               <input type="search" placeholder="Type to search" value="<?php echo get_search_query(); ?>" name="s" />
               <button type="submit">🔍</button>
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
               
               foreach($recent_posts as $post) : ?>
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
   </section>
</main>

<?php get_footer(); ?>