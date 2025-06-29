<?php if (has_nav_menu('post_footer_menu')) : ?>
   <nav class="post-footer-navigation">
      <?php wp_nav_menu([
         'theme_location' => 'post_footer_menu',
         'container' => false,
         'menu_class' => 'post-footer-menu',
      ]); ?>
   </nav>
<?php endif; ?>