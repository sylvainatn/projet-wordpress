<?php get_header(); ?>

<div class="error-page">
    <!-- Contenu principal -->
    <div class="error-content">
        <div class="error-number">404 Error.</div>
        <div class="error-description">The page you were looking for couldn't be found.</div>
        <div class="error-suggestion">Maybe try a search?</div>
        
        <div class="search-form">
            <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                <input type="search"
                       placeholder="Type something to search..."
                       value="<?php echo get_search_query(); ?>"
                       name="s"
                       autocomplete="off" />
                <span class="search-icon">🔍</span>
            </form>
        </div>
    </div>

 
<?php get_footer(); ?>