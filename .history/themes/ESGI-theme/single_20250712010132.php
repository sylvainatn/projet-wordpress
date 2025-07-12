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
                            <!-- Image en pleine largeur -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                    <div class="post-category">
                                        <?php
                                        $categories = get_the_category();
                                        if ($categories) {
                                            echo $categories[0]->name;
                                        } else {
                                            echo 'Uncategorized';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/1.png" alt="Image par défaut" class="img-fluid" />
                                    <div class="post-category">Uncategorized</div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Contenu avec padding -->
                            <div class="post-info">
                                <div class="post-category-text">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        echo $categories[0]->name;
                                    } else {
                                        echo 'Uncategorized';
                                    }
                                    ?> - <?php echo get_the_date('F j, Y'); ?>
                                </div>
                                
                                <h1><?php the_title() ?></h1>
                                
                                <div class="post-content">
                                    <?php the_content(); ?>
                                </div>
                                
                                <?php get_template_part('template-parts/post-footer-menu'); ?>
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
