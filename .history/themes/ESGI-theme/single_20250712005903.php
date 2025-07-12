<?php

// Template d'un article seul
get_header();

// Dans un template d'article seul, WP crée une variable $post : utilisons-la !

?>

<main class="post">
    <div class="container">
        <section class="blog-content">
            <?php get_template_part('template-parts/blog-sidebar'); ?>

            <!-- Contenu principal de l'article -->
            <div class="main-posts-section">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="single-post">
                            <h1><?php the_title() ?></h1> <!-- Fait référence au post courant -->
                            <div class="post-meta">
                                <div class="post-author">
                                    <img src="<?= get_avatar_url(get_the_author_meta('ID')) ?>" alt="<?= get_the_author_meta('nickname')  ?>">
                                    <?= get_the_author_meta('nickname')  ?>
                                </div>
                                <time>
                                    <?= get_the_date('j F Y') ?>
                                </time>
                            </div>
                            <!-- Debug: affichage de l'ID du post -->
                            <!-- Post ID: <?php echo get_the_ID(); ?> -->
                            <!-- Has thumbnail: <?php echo has_post_thumbnail() ? 'Yes' : 'No'; ?> -->

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <?php
                                    // Debug: essayons différentes tailles
                                    the_post_thumbnail('large', array('class' => 'img-fluid'));
                                    ?>
                                </div>
                            <?php else : ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/1.png" alt="Image par défaut" class="img-fluid" />
                                </div>
                            <?php endif; ?>
                            <div class="post-content">
                                <?php
                                the_content();
                                get_template_part('template-parts/post-footer-menu');
                                ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
        </section>
    </div>
</main>

<?php
get_footer();
