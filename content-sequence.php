<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
	<?php jeo_map();
	set_posts_views($id);
	$author_first_name   = get_the_author_meta( 'first_name' );
	$author_last_name   = get_the_author_meta( 'last_name' );
	$sequence_image_1 = get_post_meta( $id, 'sequence_image_1', true );
	$sequence_image_2 = get_post_meta( $id, 'sequence_image_2', true );
	$sequence_image_3 = get_post_meta( $id, 'sequence_image_3', true );
	$sequence_image_4 = get_post_meta( $id, 'sequence_image_4', true );
	$sequence_image_5 = get_post_meta( $id, 'sequence_image_5', true );
	?>
	<div class="main">
		<div class="featured">
			<p>featured/related stories</p>
		</div>
		<article id="content" class="story">
			<header class="story__hd">
				<h3 class="kicker">Kicker</h3>
				<h1><?php the_title(); ?></h1>
			</header>
			<div id="slider">
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
			
			<div class="story__meta">
				<p class="byline">By <strong><?php echo $author_first_name . ' ' . $author_last_name ?></strong></p>
				<p class="dateline"><?php the_date( 'j M Y', '', '', true ); ?> </p>
			</div>
			<div class="story__bd">
				<?php the_content(); ?>
			</div>
			<div class="story__ft">
				
			</div>
		</article>
	</div>

<?php endif; ?>
<?php
$img_width = 100/$count;
$slider_width = 100 * $count;
?>
<style type="text/css">
	div#slider { 
		width: <?php echo 100-$img_width ?>%; 
		max-width: 1000px; 
		overflow: hidden;
	}
	div#slider figure {
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
	div#slider figure img { 
		width: <?php echo $img_width ?>%; 
		height: auto; 
		float: left; 
	}
</style>

<?php get_footer(); ?>
