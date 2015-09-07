<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
    <?php
    set_posts_views($id);
    $pub_name = get_post_meta( $id, 'pub_name' , true );
    $source_link = get_post_meta( $id, 'source_link', true );
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
    $author_name = get_post_meta( $id, 'author_name', true );
    $count = 0;
    $img_list = array();

    for ($index = 1; $index <= 5; $index++) {
        $img_id = 'sequence_image_' . $index;
        $sequence_image = get_post_meta( $id, $img_id, true );
        if ($sequence_image != '') {
            array_push($img_list, '<img src="' . wpthumb( $sequence_image, $arg_defaults ) . '"/>');
            $count++;
        }

    }

    $img_speed = get_post_meta( $id, 'img_speed' , true );
    $video_source = get_post_meta( $id, 'video_source' , true );
    $story_location = get_post_meta( $id, 'geocode_address', true );
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
    $date = get_post_meta( $id, 'date', true);
    if ($date == '') {
        $date = get_the_date( 'j M Y', $id );
    }
    ?>
    <div class="container">
        <?php if ($video_source != '') {
            echo '<iframe width="1080" height="460" src="' . $video_source . '" frameborder="0" allowfullscreen></iframe>';
        } else { ?>
        <div id="sequence-image">
            <div id="sequence-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php
                    for ($index = 0; $index < $count; $index++) {
                        if ($index == 0) {
                            echo '<li data-target="#sequence-carousel" data-slide-to="0" class="active"></li>';
                        }
                        else {
                            echo '<li data-target="#sequence-carousel" data-slide-to="' . $index . '"></li>';
                        }
                    }
                ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                    for ($index = 0; $index < $count; $index++) {
                        if ($index == 0) {
                            echo '<div class="item active">';
                        }
                        else {
                            echo '<div class="item">';
                        }
                        echo $img_list[$index];
                        echo '<div class="carousel-caption">';
                        echo 'image caption';
                        echo '</div>';
                        echo '</div>'
                    }
                    ?>
                </div>

                <a class="left carousel-control" href="#sequence-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#sequence-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        <div class="main">
            <a name="content"></a>
            <article class="sequence">
                <header class="sequence__hd">
                    <?php echo $kicker ?>
                    <h1><?php the_title(); ?></h1>
                    <h2 class="subhead">Subhead Here Below the Main Hed</h2>
                </header>
                <div class="sequence__meta">
                    <p class="byline">By <strong><?php echo $author_name ?></strong></p>
                    <p class="dateline"><?php echo $date; ?> </p>
                    <p class="source"><?php echo $pub_name ?></p>
                </div>
                <div class="sequence__bd">
                    <?php the_content(); ?>
                </div>
            </article>

            <section class="sc-container">
                <h2>Related</h2>
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
    </div>

<?php endif; ?>

<?php get_footer(); ?>
