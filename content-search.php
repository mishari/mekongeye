<?php
    global $post;
?>
<li class="post-list-item">
    <article id="post-<?php echo $post->ID ?>">
        <div class="post-list-thumbnail">
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
        <div class="post-list-post-content">
            <h2>
                <?php
                $pub_name = get_post_meta( $post->ID, 'pub_name', true);
                if ($pub_name != '') {
                ?>
                    <p class="kicker"><?php echo $pub_name;?></p>
                <?php
                }
                ?>
                <?php
                $link = get_post_meta($post->ID, 'link_target', true);
                if ($link != '') {
                    echo '<a href="' . $link .'" target="_blank">';
                } else {
                    echo '<a href="' . post_permalink($post->ID) .'">';
                }
                ?><?php echo $post->post_title ?></a>
            </h2>
            <?php
                $date = get_post_meta( $post->ID, 'date', true);
                if ($date == '') {
                    $date = get_the_date( 'j M Y', $post->ID );
                }
            ?>
            <p class="dateline"><?php echo $date ?></p>
            <div class="excerpt"><p><?php echo $post->post_excerpt; ?></p></div>
        </div>
    </article>
</li>
