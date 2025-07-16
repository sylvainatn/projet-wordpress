<?php get_header(); ?>

<div class="search-page">
    <div class="search-header">
        <h1 class="search-title">
            Search results for: <span class="search-term"><?php echo get_search_query(); ?></span>
        </h1>
    </div>

    <div class="search-results">
        <?php if (have_posts()) : ?>
            <div class="results-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-result-item">
                        <h2 class="result-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="result-meta">
                            <span class="result-category">
                                <?php 
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'Uncategorized';
                                }
                                ?>
                            </span>
                            <span class="result-date"><?php echo get_the_date('F j, Y'); ?></span>
                        </div>
                        
                        <div class="result-excerpt">
                            <?php 
                            $excerpt = get_the_excerpt();
                            if (empty($excerpt)) {
                                $excerpt = wp_trim_words(get_the_content(), 30, '...');
                            }
                            echo wp_kses_post($excerpt);
                            ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="search-pagination">
                <?php 
                echo paginate_links(array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'mid_size' => 2,
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-results">
                <h2>No results found</h2>
                <p>Sorry, no posts were found for "<?php echo get_search_query(); ?>". Try searching for something else.</p>
                
                <!-- Formulaire de recherche -->
                <div class="search-form-container">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
