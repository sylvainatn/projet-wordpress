<?php

/**
 * Template pour afficher les commentaires
 */

// Si le post est protégé par mot de passe et que l'utilisateur n'a pas entré le mot de passe
if (post_password_required()) {
   return;
}
?>

<div id="comments" class="comments-area">
   <?php if (have_comments()) : ?>
      <h2 class="comments-title">
         <?php
         $comments_number = get_comments_number();
         if ($comments_number == 1) {
            printf('Un commentaire sur "%s"', get_the_title());
         } else {
            printf('%1$s commentaires sur "%2$s"', number_format_i18n($comments_number), get_the_title());
         }
         ?>
      </h2>

      <ol class="comment-list">
         <?php
         wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 50,
         ));
         ?>
      </ol>

      <?php
      // Navigation pour les commentaires paginés
      if (get_comment_pages_count() > 1 && get_option('page_comments')) :
      ?>
         <nav class="navigation comment-navigation">
            <div class="nav-links">
               <div class="nav-previous"><?php previous_comments_link('Commentaires plus anciens'); ?></div>
               <div class="nav-next"><?php next_comments_link('Commentaires plus récents'); ?></div>
            </div>
         </nav>
      <?php endif; ?>

   <?php endif; // Fin de have_comments() 
   ?>

   <?php
   // Si les commentaires sont fermés et qu'il y en a au moins un, afficher un message
   if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
   ?>
      <p class="no-comments">Les commentaires sont fermés.</p>
   <?php endif; ?>

   <?php
   // Formulaire de commentaire
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
   ));
   ?>
</div>