<?php

// Template d'un article seul
get_header();

?>

<main class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php 
            // Sauvegarder l'ID du post dès le début pour éviter les conflits
            $current_post_id = get_the_ID();
            ?>
            
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
            </div>

            <section class="blog-content single-blog">
                <?php get_template_part('template-parts/blog-sidebar'); ?>

                <!-- Contenu principal de l'article -->
                <div class="main-posts-section">
                    <article class="single-post" id="post-<?php echo $current_post_id; ?>">
                        <!-- Image en pleine largeur -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                <div class="post-category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    } else {
                                        echo 'Non classé';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="post-thumbnail">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/src/images/png/1.png" alt="Image par défaut" class="img-fluid" />
                                <div class="post-category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    } else {
                                        echo 'Non classé';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Contenu avec padding -->
                        <div class="post-info">
                            <div class="post-category-text">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'Non classé';
                                }
                                ?> - <?php echo get_the_date('F j, Y'); ?>
                            </div>

                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>

                            <?php get_template_part('template-parts/post-footer-menu'); ?>
                        </div>
                    </article>
                    
                    <!-- Section commentaires -->
                    <?php if (comments_open($current_post_id) || get_comments_number($current_post_id)) : ?>
                        <section class="comments-section">
                            <?php
                            // S'assurer que le contexte global est correct
                            global $post;
                            
                            // Forcer le post courant
                            $post = get_post($current_post_id);
                            setup_postdata($post);
                            
                            // Afficher le template des commentaires
                            comments_template();
                            
                            // Restaurer le contexte
                            wp_reset_postdata();
                            ?>
                        </section>
                    <?php endif; ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="hero-content">
            <h1 class="hero-title">Article non trouvé</h1>
        </div>
        <section class="blog-content">
            <p>Désolé, cet article n'existe pas ou a été supprimé.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>">Retour à l'accueil</a>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>