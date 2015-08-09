<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
	<?php jeo_map();
	set_posts_views($id);
	$kicker = wp_get_post_terms($id, 'pub_type', array('fields' => 'names'));
    if ($kicker[0] != '') {
        $kicker = '<h3 class="kicker">' . $kicker[0] . '</h3>';
    } else {
    	$kicker = '';
    }
	$author_first_name   = get_the_author_meta( 'first_name' );
	$author_last_name   = get_the_author_meta( 'last_name' );
	$sequence_image_1 = get_post_meta( $id, 'sequence_image_1', true );
	$sequence_image_2 = get_post_meta( $id, 'sequence_image_2', true );
	$sequence_image_3 = get_post_meta( $id, 'sequence_image_3', true );
	$sequence_image_4 = get_post_meta( $id, 'sequence_image_4', true );
	$sequence_image_5 = get_post_meta( $id, 'sequence_image_5', true );
	?>
	<div class="container">
        <div id="sequence-image">
			<figure>
			<?php
				$count = 0;
				for ($index = 1; $index <= 5; $index++) {
					$img_id = 'sequence_image_' . $index;
					$sequence_image = get_post_meta( $id, $img_id, true );
					if ($sequence_image != '') {
						echo '<img src="' . $sequence_image . '">';
						$count++;
					}

				}
			?>
			</figure>
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
<?php
$img_width = 100/$count;
$slider_width = 100 * $count;
?>
<style type="text/css">
	div#sequence-image { 
		overflow: hidden;
		max-width: 1080px;
	    margin-left: auto;
	    margin-right: auto;
	}
	div#sequence-image figure {
		position: relative; 
		width:<?php echo $slider_width ?>%;
		margin: 0; 
		padding: 0; 
		font-size: 0; 
		text-align: left;
		animation: 5s slidy infinite;
	}
	@keyframes slidy {
		<?php for($index = 0; $index < $count; $index++) {
			echo ($img_width * $index) . '% { left: -' . (100 * $index) . '%; }';
		}
		?>
		100% { left: -0%; }
	}
	div#sequence-image figure img { 
		width: <?php echo $img_width ?>%; 
		height: auto; 
		float: left; 
	}
</style>

<?php get_footer(); ?>
