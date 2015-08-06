<?php 
/*
Template Name: Front Page
*/
get_header(); ?>
		
<div class="main">
    <div id="stories-left">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    </div>
    <div id="stories-right">
        <section class="sc-container" id="recent">
            <h2 class="alt">NewsStream</h2>
            <div class="sc-slice size-xs">
            <?php 
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence', 'map'),
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
                $author_first_name = get_the_author_meta( 'first_name', $post->post_author );
                $author_last_name = get_the_author_meta( 'last_name', $post->post_author );
            ?>
                <article class="sc-story">
                    <?php 
                    if ($post->post_type == 'link') {
                        $link = get_post_meta($post->ID, 'link_target', true);
                        echo '<a href="' . $link .'">';
                    }
                    else {
                        echo '<a href="' . $post->guid .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <h4><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_first_name . ' ' . $author_last_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>

        <section class="sc-container" id="">
            <h2 class="alt">Press Releases</h2>
            <div class="sc-slice size-xs">
                <article class="sc-story ">
                    <a href="#">
                        <div class="sc-story__bd">
                            <h4>If there is no image, show only the text headine for the story <i class="dateline">25 May 2015</i></h4>
                        </div>
                    </a>
                </article>
            </div>
        </section>

        <div id="subscribe-right">

            <h3>Subscribe</h3>

        </div>

    </div>
</div>

<?php get_footer(); ?>
