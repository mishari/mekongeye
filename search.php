<?php get_header(); ?>
<div class="main">
    <div class="section-list">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page'   => 5,
                'paged'            => $paged,
                'offset'           => 0,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence'),
                'post_status'      => 'publish',
                'suppress_filters' => true,
                's'                => get_search_query()
            );
            $query = new WP_Query( $args );
            if( have_posts() ) : ?>
            <header class="section-header">
                <h1 class="page-title">
                <?php
                    printf( __( 'Search Results for: %s', 'mekong eye' ), '<span>' . get_search_query() . '</span>' );
                ?>
                </h1>
            </header>
        <?php
            foreach ( $query->posts as $post ) { 
                get_template_part( 'content', 'search' );
            }
            wp_reset_query();
        else:
            get_template_part( 'no-results', 'search' );
        endif;
        ?>
    <?php
        echo paginate_links( array(
            'base' => '%_%',
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages
    ) );
    ?>
    </div>
</div>
<?php get_footer(); ?>
