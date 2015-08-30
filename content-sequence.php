<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
	<?php
	set_posts_views($id);
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
	$sequence_image_1 = get_post_meta( $id, 'sequence_image_1', true );
	$sequence_image_2 = get_post_meta( $id, 'sequence_image_2', true );
	$sequence_image_3 = get_post_meta( $id, 'sequence_image_3', true );
	$sequence_image_4 = get_post_meta( $id, 'sequence_image_4', true );
	$sequence_image_5 = get_post_meta( $id, 'sequence_image_5', true );
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
						echo '<img src="' . wpthumb( $sequence_image, $arg_defaults ) . '"/>';
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
					<?php echo $pub_name ?>
					<h1><?php the_title(); ?></h1>
					<h2 class="subhead">Subhead Here Below the Main Hed</h2>
				</header>
				<div class="sequence__meta">
					<p class="byline">By <strong><?php echo $author_name ?></strong></p>
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
