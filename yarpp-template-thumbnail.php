<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ 
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
<section class="sc-container">

    <h2>Related</h2>

    <!-- begin slice -->
    <div class="sc-slice size-md">
        <?php if (have_posts()):?>
                <?php while (have_posts()) : the_post(); ?>
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
                            <h4><?php echo $post->post_title; ?></h4>
                            <?php
                            $date = get_post_meta( $post->ID, 'date', true);
                            if ($date == '') {
                                $date = get_the_date( 'j M Y', $post->ID );
                            }
                            ?>
                            <p class="dateline"><?php echo $date; ?></p>
                        </div>
                    </a>
                </article>
                <?php endwhile; ?>
        
        <?php else: ?>
        <p>No related photos.</p>
        <?php endif; ?>

    </div>
    <!-- / slice -->

</section>
