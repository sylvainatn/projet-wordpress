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
         if ($comments_number >= 1) {
            printf('Comments (%1$s)', number_format_i18n($comments_number));
         }
         ?>
      </h2>

      <ol class="comment-list">
         <?php
         wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 50,
            'callback'    => function ($comment, $args, $depth) {
               require locate_template('template-parts/comment-card.php');
            }
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
   get_template_part('template-parts/comment-form');
   ?>
</div>