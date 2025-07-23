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
      <h2 class="comments-title">
         <?php
         $comments_number = count($current_post_comments);
         if ($comments_number == 1) {
            printf('Un commentaire sur "%s"', get_the_title($current_post_id));
         } else {
            printf('%1$s commentaires sur "%2$s"', number_format_i18n($comments_number), get_the_title($current_post_id));
         }
         ?>
      </h2>

      <ol class="comment-list">
         <?php
         // Utiliser wp_list_comments avec les commentaires spécifiques du post
         wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 50,
         ), $current_post_comments);
         ?>
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
   // Formulaire de commentaire - s'assurer qu'il pointe vers le bon post
   if (comments_open($current_post_id)) :
      $commenter = wp_get_current_commenter();
      comment_form(array(
         'title_reply'          => 'Laisser un commentaire',
         'title_reply_to'       => 'Répondre à %s',
         'cancel_reply_link'    => 'Annuler la réponse',
         'label_submit'         => 'Publier le commentaire',
         'comment_field'        => '<p class="comment-form-comment"><label for="comment">Commentaire</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
         'fields'               => array(
            'author' => '<p class="comment-form-author"><label for="author">Nom *</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" required="required" /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">Email *</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" required="required" /></p>',
            'url'    => '<p class="comment-form-url"><label for="url">Site web</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
         ),
      ), $current_post_id); // Spécifier explicitement l'ID du post
   endif;
   ?>
</div>