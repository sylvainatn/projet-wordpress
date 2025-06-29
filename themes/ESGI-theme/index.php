<?php get_header(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php include('template-parts/identity-card.php'); ?>
                <?php
                if (!is_front_page()) {
                    include('template-parts/post-list.php');
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>