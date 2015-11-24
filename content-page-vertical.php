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
$pub_type = wp_get_post_terms($id, 'pub_type', array('fields' => 'all'));
$pub_type_name = $pub_type[0]->name;
$pub_type_desc = $pub_type[0]->description;
$args = array(
    'posts_per_page'   => 10,
    'offset'           => 0,
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => array('post', 'link', 'sequence'),
    'post_status'      => 'publish',
    'suppress_filters' => true,
    'region'           => $region_name,
    'topic'            => $topic_name,
    'pub_type'         => $pub_type_name
);
$query = new WP_Query( $args );
$map_id = get_post_meta( $post->ID, 'map_id', true);
?>
<div class="main">
    <a name="content"></a>
    <div class="map map-vertical">
        <div class="map-container clearfix map-fill map-tall">
            <div id="map_<?php echo $map_id; ?>_0"></div>
        </div>
        <script type="text/javascript">jeo({"postID":<?php echo $map_id; ?>,"count":0});</script>
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
    </div>

    <div class="section-list-vertical">

        <header class="section-header">
            <h1><?php echo $topic_name, $region_name, $pub_type_name; ?></h1>
            <h2 class="subhead"><?php echo $topic_desc, $region_desc, $pub_type_desc; ?></h2>
        </header>

        <div class="sv-slice">
            <?php foreach ( $query->posts as $post ) { ?>
            <article class="sv-story">
                <?php 
                if (has_post_thumbnail($post->ID)) {
                ?>
                    <div class="sv-story__hd">
                        <?php
                        $link = get_post_meta($post->ID, 'link_target', true);
                        if ($link != '') {
                            echo '<a href="' . $link .'" target="_blank">';
                        } else {
                            echo '<a href="' . post_permalink($post->ID) .'">';
                        }
                        $thumbnail = get_the_post_thumbnail( $post->ID );
                        echo $thumbnail;
                        ?>
                        </a>
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
                    
                    <h2><?php
                        $link = get_post_meta($post->ID, 'link_target', true);
                        if ($link != '') {
                            echo '<a href="' . $link .'" target="_blank">';
                        } else {
                            echo '<a href="' . post_permalink($post->ID) .'">';
                        }
                        ?><?php echo $post->post_title ?></a>
                    </h2>
                    <?php
                    $author_name = get_post_meta( $post->ID, 'author_name', true);
                    ?>
                    <p class="byline">By <?php echo $author_name; ?></p>
                    <?php
                        $date = get_post_meta( $post->ID, 'date', true);
                        if ($date == '') {
                            $date = get_the_date( 'j M Y', $post->ID );
                        }
                    ?>
                    <p class="dateline"><?php echo $date ?></p>
                    <?php
                    $pub_name   = get_post_meta( $post->ID, 'pub_name' , true );
                    $source_link   = get_post_meta( $post->ID, 'source_link', true );
                    if ($pub_name != '' and $source_link != '') {
                        $pub_name = '<a href="' . $source_link . '">' . $pub_name . '</a>';
                    } else {
                        $pub_name = '';
                    }
                    ?>
                    <p class="source"><?php echo $pub_name ?></p>
                </div>
                <div class="sv-story__ft">
                    <?php 
                        echo $post->post_excerpt;
                        $custom_link_text = get_post_meta( $post->ID, 'custom_link_text', true);
                        if ($custom_link_text == '') {
                            $custom_link_text = 'read more';
                        }
                    ?>
                    <p class="more">
                        <?php
                        $link = get_post_meta($post->ID, 'link_target', true);
                        if ($link != '') {
                            echo '<a href="' . $link .'" target="_blank">';
                        } else {
                            echo '<a href="' . post_permalink($post->ID) .'">';
                        }
                        echo $custom_link_text;
                        ?>
                         &raquo</a>
                    </p>
                </div>
            </article>
            <?php } ?>
        </div>
        <?php
            echo paginate_links( array(
                'base' => '%_%',
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $query->max_num_pages
        ) );
        ?>
    </div>

</div>

<?php endif; ?>

<?php get_footer(); ?>
