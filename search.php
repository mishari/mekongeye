<?php get_header(); ?>
<div class="main">
    <div class="section-list">
        <?php
            global $query_string;
            if( have_posts() ) : ?>
            <header class="section-header">
                <h1 class="page-title">
                <?php
                    printf( __( 'Search Results for: %s', 'mekong eye' ), '<span>' . get_search_query() . '</span>' );
                ?>
                </h1>
            </header>
        <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'content', 'search' );
            endwhile;
            wp_reset_query();

            pagination();
        else:
            get_template_part( 'no-results', 'search' );
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>
