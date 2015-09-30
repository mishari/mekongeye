<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
    <?php 
    set_posts_views($id);
    $sub_title   = get_post_meta( $id, 'sub_title', true );
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
                <h2 class="subhead"><?php echo $sub_title; ?></h2>
            </header>
            <?php
            if ( has_post_thumbnail() ) {?>
                <div class="story__big-image">
                    <?php echo $featured_image; ?>
                </div>
            <?php
            }
            ?>
            <div id="stories-left">
            <div class="story__meta">
                <p class="byline">By <strong><?php echo $author_name ?></strong></p>
                <p class="dateline"><i><?php echo $story_location?>,</i> <?php echo $date; ?> </p>
                <p class="source"><?php echo $pub_name ?></p>
            </div>
            <div class="story__bd">
                <?php the_content(); ?>
            </div>
            </div>
        </article>
        <?php related_posts(); ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
