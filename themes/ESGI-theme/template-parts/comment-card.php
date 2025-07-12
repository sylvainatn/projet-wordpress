<?php

/**
 * Template part pour une carte commentaire
 * @var WP_Comment $comment
 */
?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-card'); ?>>
   <div class="comment-card-inner">
      <div class="comment-author">
         <strong><?php echo get_comment_author(); ?></strong>
      </div>
      <div class="comment-content">
         <?php comment_text(); ?>
      </div>
      <div class="reply">
         <?php comment_reply_link(array_merge($args, [
            'reply_text' => '↩️ Reply',
            'depth' => $depth,
            'max_depth' => $args['max_depth'],
         ])); ?>
      </div>
   </div>
</li>