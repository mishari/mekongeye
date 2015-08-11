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
        <h2 class="alt-group">Mekong Eye <br> News Digest</h2>
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
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            ?>
                            <h4><?php echo ($kicker[0] == '' ? '' : '<b class="kicker">' . $kicker[0] . '</b> ');?><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_first_name . ' ' . $author_last_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>

        <section class="sc-container" id="resource">
            <h2 class="alt">Resources & Press Releases</h2>
            <div class="sc-slice size-xs">
            <?php
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence', 'map'),
                'post_status'      => 'publish',
                'pub_type'         => 'Kicker, Eye Original, Opinion',
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
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            ?>
                            <h4><?php echo ($kicker[0] == '' ? '' : '<b class="kicker">' . $kicker[0] . '</b> ');?><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_first_name . ' ' . $author_last_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>

        <section class="sc-container" id="editor">
            <h2 class="alt">Editor’s Picks</h2>
            <div class="sc-slice size-xs">
            <?php
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence', 'map'),
                'post_status'      => 'publish',
                'meta_key'         => 'editor_pick',
                'meta_value'       => "true",
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
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            ?>
                            <h4><?php echo ($kicker[0] == '' ? '' : '<b class="kicker">' . $kicker[0] . '</b> ');?><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_first_name . ' ' . $author_last_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>

        <div id="subscribe-right">
            <h3>Subscribe for email updates</h3>
            <form class="email-signup form-color-e">
                <label for="email-signup__name" class="hidden-label">Name</label>
                <input type="email" value="" name="EMAIL" class="email" id="email-signup__name" placeholder="name" required="">
                <label for="email-signup__mail" class="hidden-label">Email Address</label>
                <input type="email" value="" name="EMAIL" class="email" id="email-signup__mail" placeholder="email address" required="">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button ss-icon">
            </form>
        </div>
        <div class="front-social social-subscribe">
            <h3>Follow us on social media</h3>
            <a href="#"><img src="/static/images/twitter-icon.png" alt="twitter"></a>
            <a href="#"><img src="/static/images/facebook-icon.png" alt="facebook"></a>
        </div>

        <section class="sc-container" id="views">
            <h2 class="alt">Most Read</h2>
            <div class="sc-slice size-xs">
            <?php
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'meta_value',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence', 'map'),
                'post_status'      => 'publish',
                'meta_key'         => 'post_views_count',
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
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            ?>
                            <h4><?php echo ($kicker[0] == '' ? '' : '<b class="kicker">' . $kicker[0] . '</b> ');?><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_first_name . ' ' . $author_last_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>

    </div>
</div>

<?php get_footer(); ?>
