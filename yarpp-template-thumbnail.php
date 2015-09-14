<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
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
                                $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_large ) . '" alt="' . $post->post_title . '" />';
                                echo $featured_image;
                            }
                        ?>
                    </div>
                    <a href="<?php echo post_permalink($post->ID) ?>">
                        <div class="sc-story__bd">
                            <h4><?php echo $post->post_title; ?></h4>
                            <p class="dateline"><?php echo get_the_date( 'j M Y', $post->ID ); ?></p>
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
