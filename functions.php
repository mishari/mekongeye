<?php
// Include Story
// require_once(STYLESHEETPATH . '/inc/story.php');

// Include Collection
require_once(STYLESHEETPATH . '/inc/collection.php');


function mekongeye_styles() {

	$options = get_option('mekongeye_options');

	$css_base = get_stylesheet_directory_uri() . '/assets/css/';

	wp_dequeue_style('jeo-main');

	wp_register_style('webfont-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic');
	wp_register_style('webfont-crimson-text', '//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic');
	wp_register_style('mekongeye-base',  $css_base . 'main.css', array('webfont-sans-pro', 'webfont-crimson-text'));

	wp_enqueue_style('mekongeye-base');
	if($options['style']) {
		wp_enqueue_style('mekongeye-' . $options['style']);
	}

}
add_action('wp_enqueue_scripts', 'mekongeye_styles', 15);

?>