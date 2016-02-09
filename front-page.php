<?php 
/*
Template Name: Front Page
*/
get_header(); 
$arg_extra_large = array(
    'width'              => 1080,
    'height'             => 460,
    'crop'               => true,
    'crop_from_position' => 'center,center',
    'resize'             => true,
    'cache'              => true,
    'default'            => null,
    'jpeg_quality'       => 70,
    'resize_animations'  => false,
    'return'             => 'url',
    'background_fill'    => null
);
$arg_large = array(
    'width'              => 166,
    'height'             => 166,
    'crop'               => true,
    'crop_from_position' => 'center,center',
    'resize'             => true,
    'cache'              => true,
    'default'            => null,
    'jpeg_quality'       => 70,
    'resize_animations'  => false,
    'return'             => 'url',
    'background_fill'    => null
);
$arg_medium = array(
    'width'              => 64,
    'height'             => 64,
    'crop'               => true,
    'crop_from_position' => 'center,center',
    'resize'             => true,
    'cache'              => true,
    'default'            => null,
    'jpeg_quality'       => 70,
    'resize_animations'  => false,
    'return'             => 'url',
    'background_fill'    => null
);
?>
		
<div class="main">
    <div id="stories-left">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    	<script>
    	$('#map-group li a').click(function() {
			var tab_id = $(this).attr('aria-controls');
			var element = 'div#' + tab_id + ' article div.sc-story__hd div';
			var script = ''
			var html = '<div class="map-container clearfix map-fill map-tall"><div id="map_' + tab_id + '_0"></div></div><script type="text/javascript">jeo({"postID":' + tab_id + ',"count":0});';
			$(element).html(html);
		});
    	</script>
        <section class="sc-container">
            <h2><a href="http://mekongeye.com/opinion-blogs/">Opinion &amp; Blogs <b>»</b></a></h2>
            <div class="sc-slice size-md format-3col">
                <?php
                $args = array(
                    'posts_per_page'   => 3,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => array('post', 'link', 'sequence'),
                    'post_status'      => 'publish',
                    'pub_type'         => 'Opinion, Blogs'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <div class="sc-story__hd">
                        <?php
                            $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            if ($image_src != '') {
                                $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_medium ) . '" alt="' . $post->post_title . '" />';
                                echo $featured_image;
                            }
                        ?>
                    </div>
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
            <div class="sc-slice size-md format-3col">
                <?php
                $args = array(
                    'posts_per_page'   => 3,
                    'offset'           => 3,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => array('post', 'link', 'sequence'),
                    'post_status'      => 'publish',
                    'pub_type'         => 'Opinion, Blogs'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__hd">
                            <?php
                                $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                if ($image_src != '') {
                                    $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_medium ) . '" alt="' . $post->post_title . '" />';
                                    echo $featured_image;
                                }
                            ?>
                        </div>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
        </section>
        <section class="sc-container">
            <h2><a href="http://mekongeye.com/eye-originals/">Eye Originals <b>»</b></a></h2>
            <div class="sc-slice size-md format-3col">
                <?php
                $args = array(
                    'posts_per_page'   => 3,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => array('post', 'link', 'sequence'),
                    'post_status'      => 'publish',
                    'pub_type'         => 'Eye Original'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <div class="sc-story__hd">
                        <?php
                            $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            if ($image_src != '') {
                                $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_medium ) . '" alt="' . $post->post_title . '" />';
                                echo $featured_image;
                            }
                        ?>
                    </div>
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
            <div class="sc-slice size-md format-3col">
                <?php
                $args = array(
                    'posts_per_page'   => 3,
                    'offset'           => 3,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => array('post', 'link', 'sequence'),
                    'post_status'      => 'publish',
                    'pub_type'         => 'Eye Original'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__hd">
                            <?php
                                $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                if ($image_src != '') {
                                    $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_medium ) . '" alt="' . $post->post_title . '" />';
                                    echo $featured_image;
                                }
                            ?>
                        </div>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
        </section>
        <section class="sc-container">
            <h2><a href="#">Video <b>»</b></a></h2>
            <div class="sc-slice size-lg format-color-e">
                <?php
                $args = array(
                    'posts_per_page'   => 2,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'sequence',
                    'post_status'      => 'publish'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <div class="sc-story__hd">
                        <?php
                            $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            if ($image_src != '') {
                                $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_large ) . '" alt="' . $post->post_title . '" />';
                                echo $featured_image;
                            }
                        ?>
                    </div>
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
            <div class="sc-slice size-lg format-color-e">
                <?php
                $args = array(
                    'posts_per_page'   => 2,
                    'offset'           => 2,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'sequence',
                    'post_status'      => 'publish'
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                ?>
                <article class="sc-story option-image">
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__hd">
                            <?php
                            $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                if ($image_src != '') {
                                    $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_large ) . '" alt="' . $post->post_title . '" />';
                                    echo $featured_image;
                                }
                            ?>
                        </div>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            if ($kicker[0] != '') {
                                echo '<p class="kicker">' . $kicker[0] . '</p>';
                            }
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo $pub_name; ?></p>
                        </div>
                    </a>
                </article>
                <?php } ?>
            </div>
        </section>
    </div>
    <div id="stories-right">
        <section class="sc-container" id="recent">
            <h2 class="alt">News Stream</h2>
            <div class="sc-slice size-xs">
            <?php 
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence'),
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
            	$author_name = get_post_meta( $post->ID, 'author_name', true );
            ?>
                <article class="sc-story">
                    <?php 
                    $link = get_post_meta($post->ID, 'link_target', true);
                    if ($link != '') {
                        echo '<a href="' . $link .'" target="_blank">';
                    }
                    else {
                        echo '<a href="' . post_permalink($post->ID) .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?> <em><?php echo $pub_name;?></em></h4>
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
                'post_type'        => array('post', 'link', 'sequence'),
                'post_status'      => 'publish',
                'pub_type'         => 'Resource / PR',
                'suppress_filters' => true
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
                $author_name = get_post_meta( $post->ID, 'author_name', true );
            ?>
                <article class="sc-story">
                    <?php 
                    $link = get_post_meta($post->ID, 'link_target', true);
                    if ($link != '') {
                        echo '<a href="' . $link .'" target="_blank">';
                    }
                    else {
                        echo '<a href="' . post_permalink($post->ID) .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?> <em><?php echo $pub_name;?></em></h4>
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
                'post_type'        => array('post', 'link', 'sequence'),
                'post_status'      => 'publish',
                'meta_key'         => 'editor_pick',
                'meta_value'       => "true",
                'suppress_filters' => true
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
                $author_name = get_post_meta( $post->ID, 'author_name', true );
            ?>
                <article class="sc-story">
                    <?php 
                    $link = get_post_meta($post->ID, 'link_target', true);
                    if ($link != '') {
                        echo '<a href="' . $link .'" target="_blank">';
                    }
                    else {
                        echo '<a href="' . post_permalink($post->ID) .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?> <em><?php echo $pub_name;?></em></h4>
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
            <?php dynamic_sidebar( 'subscriber_widgets' ); ?>
        </div>
        <div class="front-social social-subscribe">
            <h3>Follow us on social media</h3>
            <a href="https://twitter.com/MekongEye"><img class="social" src="<?php bloginfo('stylesheet_directory');?>/images/twitter-icon.png" alt="twitter"></a>
            <a href="https://www.facebook.com/MekongEye"><img class="social" src="<?php bloginfo('stylesheet_directory');?>/images/facebook-icon.png" alt="facebook"></a>
        </div>

        <section class="sc-container" id="views">
            <h2 class="alt">Most Read</h2>
            <div class="sc-slice size-xs">
            <?php
            $args = array(
                'posts_per_page'   => 10,
                'orderby'          => 'meta_value',
                'order'            => 'DESC',
                'post_type'        => array('post', 'link', 'sequence'),
                'post_status'      => 'publish',
                'meta_key'         => 'post_views_count',
                'suppress_filters' => true
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
                $author_name = get_post_meta( $post->ID, 'author_name', true );
            ?>
                <article class="sc-story">
                    <?php 
                    $link = get_post_meta($post->ID, 'link_target', true);
                    if ($link != '') {
                        echo '<a href="' . $link .'" target="_blank">';
                    }
                    else {
                        echo '<a href="' . post_permalink($post->ID) .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                            ?>
                            <h4><?php echo $post->post_title; ?> <em><?php echo $pub_name;?></em></h4>
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
