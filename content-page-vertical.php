<?php 
/*
Template Name: Content Page Vertical
*/
get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
<?php
$topic = wp_get_post_terms($id, 'topic', array('fields' => 'all'));
$topic_name = $topic[0]->name;
$topic_desc = $topic[0]->description;
$region = wp_get_post_terms($id, 'region', array('fields' => 'all'));
$region_name = $region[0]->name;
$region_desc = $region[0]->description;
$args = array(
    'posts_per_page'   => 10,
    'offset'           => 0,
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => array('post', 'link', 'sequence', 'map'),
    'post_status'      => 'publish',
    'suppress_filters' => true,
    'region'           => $region_name,
    'topic'            => $topic_name
);
$posts = get_posts( $args );
?>
		
<div class="main">
    <a name="content"></a>
    <div class="map map-vertical">
        
    </div>

    <div class="section-list-vertical">

        <header class="section-header">
            <h1><?php echo $topic_name, $region_name; ?></h1>
            <h2 class="subhead"><?php echo $topic_desc, $region_desc; ?></h2>
        </header>

        <div class="sv-slice">
            <?php foreach ( $posts as $post ) { ?>
            <article class="sv-story">
                <?php 
                if (has_post_thumbnail($post->ID)) {
                ?>
                    <div class="sv-story__hd">
                        <?php
                        $thumbnail = get_the_post_thumbnail( $post->ID );
                        echo $thumbnail;
                        ?>
                    </div>
                <?php
                }
                ?>

                <div class="sv-story__bd">
                    <?php
                    $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
                    if ($kicker[0] != '') {
                    ?>
                        <p class="kicker"><?php echo $kicker[0]; ?></p>
                    <?php
                    }
                    ?>
                    
                    <h2><?php echo $post->post_title ?></h2>
                    <?php
                    $author_first_name = get_the_author_meta( 'first_name', $post->post_author );
                    $author_last_name = get_the_author_meta( 'last_name', $post->post_author );
                    ?>
                    <p class="byline">By <?php echo $author_first_name . ' ' . $author_last_name ?></p>
                    <?php
                        $date = get_the_date( 'j M Y', $post->ID );
                    ?>
                    <p class="dateline"><?php echo $date ?></p>
                </div>
                <div class="sv-story__ft">
                    <?php echo $post->post_content; ?>
                    <p class="more"><a href="<?php echo post_permalink($post->ID); ?>">read more &raquo;</a> </p>
                </div>
            </article>
            <?php } ?>
        </div>

    </div>

</div>

<?php endif; ?>

<?php get_footer(); ?>
