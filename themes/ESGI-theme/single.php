<?php

// Template d'un article seul
get_header();

// Dans un template d'article seul, WP crée une variable $post : utilisons-la !

?>

<main class="post">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1><?php the_title() ?></h1> <!-- Fait référence au post courant -->
                <div class="post-meta">
                    <div class="post-author">
                        <img src="<?= get_avatar_url($post->post_author) ?>" alt="<?= get_the_author_meta('nickname', $post->post_author)  ?>">
                        <?= get_the_author_meta('nickname', $post->post_author)  ?>
                    </div>
                    <time>
                        <?= wp_date('j F Y', strtotime($post->post_date)) ?>
                    </time>
                </div>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail() ?>
                </div>
                <div>
                    <?php
                    the_content();
                    get_template_part('template-parts/post-footer-menu');
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
