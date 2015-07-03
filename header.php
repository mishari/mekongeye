<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php
	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo('description', 'display');
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . __('Page', 'jeo') . max($paged, $page);

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="/wp-content/themes/mekongeye/assets/css/main.css" />
<script src="/wp-content/themes/mekongeye/assets/javascript/vendor/modernizr-2.8.3.min.js"></script>


<?php wp_head(); ?>
</head>
<body <?php body_class(get_bloginfo('language')); ?>>
	<div class="container">
	
		<header class="global-header">
			<div class="nameplate" id="nameplate">
				<h1>
					<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
			</div>
			<nav class="global-nav">
				<?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
			</nav>
	</header>