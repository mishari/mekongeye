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

<script src="/wp-content/themes/mekongeye/assets/javascript/vendor/modernizr-2.8.3.min.js"></script>


<?php wp_head(); ?>
</head>
<body <?php body_class(get_bloginfo('language')); ?>>
	<div class="container">
	<header class="global-header">
        <div class="nameplate" id="nameplate">
            <div class="nameplate__bd"><a href="#"><img class="logo" src="/static/images/logo-mekong.png" alt=""></a></div>
        </div>
	</header>
	<header class="navigation" role="banner">
	<div class="navigation-wrapper">
		<a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
			<nav role="navigation">
				<?php 
					$defaults = array(
						'theme_location'  => 'header_menu',
						'container'       => false,
						'container_class' => false,
						'menu_class'      => 'nav-link',
					);

					wp_nav_menu( $defaults );
				?>
			</nav>
		</div>
	</header>
	<script>
	$('.menu-item').addClass('nav-link');
	$('ul#menu-top-menu li:nth-child(3)').addClass('more');
	$('ul#menu-top-menu li:nth-child(4)').addClass('more');
	</script>
