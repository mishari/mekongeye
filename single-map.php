<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
    <?php
    set_posts_views($id);
    $sub_title   = get_post_meta( $id, 'sub_title', true );
    $pub_name   = get_post_meta( $id, 'pub_name' , true );
    $source_link   = get_post_meta( $id, 'source_link', true );
        if ($pub_name != '') {
            if ($source_link != '') {
                $pub_name = '<a href="' . $source_link . '"><h3 class="kicker">' . $pub_name . '</h3></a>';
            }
            else {
                $pub_name = '<h3 class="kicker">' . $pub_name . '</h3>';
            }
        } else {
       	    $pub_name = '';
        }
    $author_name   = get_post_meta( $id, 'author_name', true );
    ?>
    <div class="map">
        <?php jeo_map(); ?>
    </div>
    <div class="container">
        <div class="main">
            <a name="content"></a>
            <article class="sequence">
                <header class="sequence__hd">
                    <?php echo $pub_name ?>
                    <h1><?php the_title(); ?></h1>
                    <h2 class="subhead"><?php echo $sub_title ?></h2>
                </header>
                <div class="sequence__meta">
                    <p class="byline">By <strong><?php echo $author_name ?></strong></p>
                    <p class="dateline"><?php the_date( 'j M Y', '', '', true ); ?> </p>
                </div>
                <div class="sequence__bd">
                    <?php the_content(); ?>
                </div>
            </article>

            <?php related_posts(); ?>
        </div>
    </div>

<?php endif; ?>
<?php get_footer(); ?>
