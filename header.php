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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="/wp-content/themes/mekongeye/assets/javascript/vendor/modernizr-2.8.3.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67570914-1', 'auto');
  ga('send', 'pageview');

</script>


<?php wp_head(); ?>
</head>
<body <?php body_class(get_bloginfo('language')); ?>>
	<div class="container">
	<header class="global-header">
        <div class="nameplate" id="nameplate">
            <div class="nameplate__bd"><a href="<?php echo get_site_url(); ?>"><img class="logo" src="<?php bloginfo('stylesheet_directory');?>/images/logo-mekong.png" alt=""></a></div>
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
			<?php get_search_form( false ); ?>
		</div>
	</header>
	<script>
	$('.menu-item').addClass('nav-link');
	$('ul#menu-header-menu>li:nth-child(3)').addClass('more');
	$('ul#menu-header-menu>li:nth-child(4)').addClass('more');
	</script>
