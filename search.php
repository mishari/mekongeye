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
        else:
            get_template_part( 'no-results', 'search' );
        endif;
        ?>
    </div>
    <?php
        echo paginate_links( array(
            'base' => '%_%',
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages
    ) );
    ?>
</div>
<?php get_footer(); ?>
