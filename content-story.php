<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
	<?php jeo_map();
	$author_first_name   = get_the_author_meta( 'first_name' );
	$author_last_name   = get_the_author_meta( 'last_name' );
	$story_location   = get_post_meta( $id, 'geocode_address', true );
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
			<?php
			if ( has_post_thumbnail() ) {?>
				<div class="story__big-image">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php
			}
			?>
			<div class="story__meta">
				<p class="byline">By <strong><?php echo $author_first_name . ' ' . $author_last_name ?></strong></p>
				<p class="dateline"><i><?php echo $story_location?>,</i> <?php the_date( 'j M Y', '', '', true ); ?> </p>
			</div>
			<div class="story__bd">
				<?php the_content(); ?>
			</div>
		</article>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
