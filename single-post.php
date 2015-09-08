<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
    <?php 
    set_posts_views($id);
    $pub_name   = get_post_meta( $id, 'pub_name' , true );
    $source_link   = get_post_meta( $id, 'source_link', true );
    if ($pub_name != '' and $source_link != '') {
        $pub_name = '<a href="' . $source_link . '">' . $pub_name . '</a>';
    } else {
        $pub_name = '';
    }
    $kicker = wp_get_post_terms($id, 'pub_type', array('fields' => 'names'));
    if ($kicker[0] != '') {
        $kicker = '<h3 class="kicker">' . $kicker[0] . '</h3>';
    } else {
        $kicker = '';
    }
    $author_name   = get_post_meta( $id, 'author_name', true );
    $story_location   = get_post_meta( $id, 'geocode_address', true );
    $arg_defaults = array(
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
        $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        if ($image_src != '') {
            $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_defaults ) . '" alt="' . get_the_title() . '" />';
        }
    $date = get_post_meta( $id, 'date', true);
    if ($date == '') {
        $date = get_the_date( 'j M Y', $id );
    }
    ?>

    <div class="main">
        <article id="content" class="story">
            <header class="story__hd">
                <?php echo $kicker ?>
                <h1><?php the_title(); ?></h1>
            </header>
            <?php
            if ( has_post_thumbnail() ) {?>
                <div class="story__big-image">
                    <?php echo $featured_image; ?>
                </div>
            <?php
            }
            ?>
            <div class="story__meta">
                <p class="byline">By <strong><?php echo $author_name ?></strong></p>
                <p class="dateline"><i><?php echo $story_location?>,</i> <?php echo $date; ?> </p>
                <p class="source"><?php echo $pub_name ?></p>
            </div>
            <div class="story__bd">
                <?php the_content(); ?>
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
            	$author_name = get_post_meta( $post->ID, 'author_name', true );
            ?>
                <article class="sc-story">
                    <?php 
                    if ($post->post_type == 'link') {
                        $link = get_post_meta($post->ID, 'link_target', true);
                        echo '<a href="' . $link .'">';
                    }
                    else {
                        echo '<a href="' . post_permalink($post->ID) .'">';
                    }
                    ?>
                        <div class="sc-story__bd">
                            <?php
                            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                            ?>
                            <h4><?php echo ($kicker[0] == '' ? '' : '<b class="kicker">' . $kicker[0] . '</b> ');?><?php echo $post->post_title; ?><i class="dateline"> <?php echo $author_name; ?></i></h4>
                        </div>
                    </a>
                </article>
            <?php 
            }
            ?>
            </div>
        </section>
    </div>
        </article>
        <section class="sc-container">

                <h2>Related</h2>

                <!-- begin slice -->
                <div class="sc-slice size-md">

                    <article class="sc-story option-image">
                        <a href="#">
                            <div class="sc-story__hd">
                                <img src="/static/images/preview-64x64px.jpg" alt="story preview">
                            </div>
                            <div class="sc-story__bd">
                                <p class="kicker">Eye Original</p>
                                <h4>Small story hed goes here spot for story</h4>
                                <p class="dateline">25 May 2015</p>
                            </div>
                        </a>
                    </article>

                    <article class="sc-story ">
                        <a href="#">
                            <div class="sc-story__bd">
                                <h4>If there is no image, show only the text headine for the story</h4>
                                <p class="dateline">25 May 2015</p>
                            </div>
                        </a>
                    </article>

                    <article class="sc-story option-image">
                        <a href="#">
                            <div class="sc-story__hd">
                                <img src="/static/images/preview-64x64px.jpg" alt="story preview">
                            </div>
                            <div class="sc-story__bd">
                                <h4>Small story hed goes here spot for story</h4>
                                <p class="dateline">25 May 2015</p>
                            </div>
                        </a>
                    </article>

                    <article class="sc-story ">
                        <a href="#">
                            <div class="sc-story__bd">
                                <h4>If there is no image, show only the text headine for the story</h4>
                                <p class="dateline">25 May 2015</p>
                            </div>
                        </a>
                    </article>

                </div>
                <!-- / slice -->

            </section>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
