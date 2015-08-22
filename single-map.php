<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
    <?php
    set_posts_views($id);
    $kicker = wp_get_post_terms($id, 'pub_type', array('fields' => 'names'));
    if ($kicker[0] != '') {
        $kicker = '<h3 class="kicker">' . $kicker[0] . '</h3>';
    } else {
        $kicker = '';
    }
    ?>
    <div class="map">
        <?php jeo_map(); ?>
    </div>
    <div class="container">
        <div class="main">
            <a name="content"></a>
            <article class="sequence">
                <header class="sequence__hd">
                    <?php echo $kicker ?>
                    <h1><?php the_title(); ?></h1>
                    <h2 class="subhead">Subhead Here Below the Main Hed</h2>
                </header>
                <div class="sequence__meta">
                    <p class="byline">By <strong><?php echo $author_first_name . ' ' . $author_last_name ?></strong></p>
                    <p class="dateline"><?php the_date( 'j M Y', '', '', true ); ?> </p>
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
