<?php

/**
 * Template pour afficher les commentaires du post courant uniquement
 */

// Si le post est protégé par mot de passe et que l'utilisateur n'a pas entré le mot de passe
if (post_password_required()) {
   return;
}

// Méthode plus robuste pour obtenir l'ID du post
$current_post_id = get_the_ID();
if (!$current_post_id) {
   global $post;
   if (is_object($post) && isset($post->ID)) {
      $current_post_id = $post->ID;
   } else {
      return; // Pas d'ID valide, on abandonne
   }
}

// Récupérer uniquement les commentaires du post courant
$current_post_comments = get_comments(array(
   'post_id' => $current_post_id,
   'status'  => 'approve',
   'order'   => 'ASC'
));

?>

<div id="comments" class="comments-area">

   <?php if (!empty($current_post_comments)) : ?>


      <ol class="comment-list">
         <h2 class="comments-title">
            <?php
            $comments_number = count($current_post_comments);
            if ($comments_number == 1) {
               printf('Un commentaire sur "%s"', get_the_title($current_post_id));
            } else {
               printf('Comments (%1$s)', number_format_i18n($comments_number), get_the_title($current_post_id));
            }
            ?>
         </h2>
         <?php foreach ($current_post_comments as $comment) : ?>
            <li class="comment-card">
               <div class="comment-author">
                  <?php
                  // Affiche le champ personnalisé 'Full name' si présent, sinon l'auteur classique
                  $full_name = get_comment_meta($comment->comment_ID, 'author', true);
                  echo esc_html($full_name ? $full_name : get_comment_author($comment));
                  ?>
               </div>
               <div class="comment-content">
                  <?php echo esc_html($comment->comment_content); ?>
               </div>
               <div>
                  <?php
                  $reply_link = get_comment_reply_link(array(
                     'reply_text' => '<span class="reply-link-content"><svg class="reply-link-icon" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.259652 4.93237L5.75978 0.182841C6.24122 -0.23294 7 0.104591 7 0.750466V3.25212C12.0197 3.30959 16 4.31562 16 9.07268C16 10.9927 14.7631 12.8948 13.3958 13.8893C12.9692 14.1997 12.3611 13.8102 12.5184 13.3071C13.9354 8.77547 11.8463 7.5724 7 7.50265V10.25C7 10.8969 6.24062 11.2329 5.75978 10.8176L0.259652 6.06762C-0.0863164 5.76881 -0.0867851 5.23159 0.259652 4.93237Z"/></svg>Reply</span>',
                     'depth' => 1,
                     'max_depth' => get_option('thread_comments_depth'),
                     'add_below' => 'comment-card',
                     'before' => '',
                     'after' => '',
                  ), $comment);
                  if ($reply_link) echo $reply_link;
                  ?>
               </div>
            </li>
         <?php endforeach; ?>
      </ol>

      <?php
      // Navigation pour les commentaires paginés (si nécessaire)
      $comments_per_page = get_option('comments_per_page');
      if ($comments_per_page && count($current_post_comments) > $comments_per_page) :
      ?>
         <nav class="navigation comment-navigation">
            <div class="nav-links">
               <div class="nav-previous"><?php previous_comments_link('Commentaires plus anciens'); ?></div>
               <div class="nav-next"><?php next_comments_link('Commentaires plus récents'); ?></div>
            </div>
         </nav>
      <?php endif; ?>

   <?php else : ?>
      <p class="no-comments">Aucun commentaire pour cet article.</p>
   <?php endif; ?>

   <?php
   // Si les commentaires sont fermés et qu'il y en a au moins un, afficher un message
   if (!comments_open($current_post_id) && count($current_post_comments) > 0 && post_type_supports(get_post_type($current_post_id), 'comments')) :
   ?>
      <p class="no-comments">Les commentaires sont fermés.</p>
   <?php endif; ?>

   <?php
   // Formulaire de commentaire simple HTML
   if (comments_open($current_post_id)) : ?>
      <form class="comment-form" method="post" action="<?php echo site_url('/wp-comments-post.php'); ?>">
         <h2 class="reply-title">Leave a reply</h2>
         <input type="hidden" name="comment_post_ID" value="<?php echo esc_attr($current_post_id); ?>" />
         <input class="full-name" name="author" id="author" placeholder="Full name" required />
         <textarea class="comment-message" name="comment" id="comment" placeholder="Message" required></textarea>
         <button class="submit-button" type="submit">Submit</button>
      </form>
   <?php endif; ?>
</div>