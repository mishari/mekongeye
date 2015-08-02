<?php
// Include Article
require_once(STYLESHEETPATH . '/inc/story.php');

// Include Collection
require_once(STYLESHEETPATH . '/inc/collection.php');

// Include Link
require_once(STYLESHEETPATH . '/inc/link.php');

// Include Sequence
require_once(STYLESHEETPATH . '/inc/sequence.php');


function mekongeye_styles() {

	$options = get_option('mekongeye_options');

	$css_base = get_stylesheet_directory_uri() . '/assets/css/';


	wp_register_style('webfont-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic');
	wp_register_style('webfont-crimson-text', '//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic');
	wp_register_style('mekongeye-base',  $css_base . 'main.css', array('webfont-sans-pro', 'webfont-crimson-text'));

	wp_enqueue_style('mekongeye-base');
	if($options['style']) {
		wp_enqueue_style('mekongeye-' . $options['style']);
	}
	
	wp_dequeue_style('jeo-main');

}
add_action('wp_enqueue_scripts', 'mekongeye_styles', 15);

function sections_init() {
	// create a new taxonomy
	register_taxonomy(
		'sections',
		'post',
		array(
			'label' => __( 'Sections' ),
			'rewrite' => array( 'slug' => 'section'),
			'hierarchical'=> true,
			'capabilities' => array(
					'manage__terms' => 'edit_posts',
				    'edit_terms' => 'manage_categories',
				    'delete_terms' => 'manage_categories',
				    'assign_terms' => 'edit_posts'
				)
		)
	);
}
add_action( 'init', 'sections_init' );


function create_story_taxonomies() {
    $topic_labels = array(
        'name'              => _x( 'Topics', 'taxonomy general name' ),
        'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Topics' ),
        'all_items'         => __( 'All Topics' ),
        'parent_item'       => __( 'Parent Topic' ),
        'parent_item_colon' => __( 'Parent Topic:' ),
        'edit_item'         => __( 'Edit Topic' ),
        'update_item'       => __( 'Update Topic' ),
        'add_new_item'      => __( 'Add New Topic' ),
        'new_item_name'     => __( 'New Topic Name' ),
        'menu_name'         => __( 'Topic' ),
    );
    $topic_args = array(
        'hierarchical'          => true,
        'labels'                => $topic_labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'topic' ),
    );

    register_taxonomy( 'topic', array('post', 'link', 'sequence', 'map'), $topic_args );

    $region_labels = array(
        'name'              => _x( 'Regions', 'taxonomy general name' ),
        'singular_name'     => _x( 'Region', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Regions' ),
        'all_items'         => __( 'All Regions' ),
        'parent_item'       => __( 'Parent Region' ),
        'parent_item_colon' => __( 'Parent Region:' ),
        'edit_item'         => __( 'Edit Region' ),
        'update_item'       => __( 'Update Region' ),
        'add_new_item'      => __( 'Add New Region' ),
        'new_item_name'     => __( 'New Region Name' ),
        'menu_name'         => __( 'Region' ),
    );
    $region_args = array(
        'hierarchical'          => true,
        'labels'                => $region_labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'region' ),
    );

    register_taxonomy( 'region', array('post', 'link', 'sequence', 'map'), $region_args );
}
add_action( 'init', 'create_story_taxonomies', 0 );

?>
