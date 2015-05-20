<?php

/*
 * Open Development
 * Story
 */

class MekongEye_Story {

	function __construct() {

		add_action('init', array($this, 'register_post_type'));

	}

	function register_post_type() {

		$labels = array(
			'name'               => _x( 'Stories', 'post type general name', 'mekongeye' ),
			'singular_name'      => _x( 'Story', 'post type singular name', 'mekongeye' ),
			'menu_name'          => _x( 'Stories', 'admin menu', 'mekongeye' ),
			'name_admin_bar'     => _x( 'Story', 'add new on admin bar', 'mekongeye' ),
			'add_new'            => _x( 'Add new', 'story', 'mekongeye' ),
			'add_new_item'       => __( 'Add new story', 'mekongeye' ),
			'new_item'           => __( 'New story', 'mekongeye' ),
			'edit_item'          => __( 'Edit story', 'mekongeye' ),
			'view_item'          => __( 'View story', 'mekongeye' ),
			'all_items'          => __( 'All stories', 'mekongeye' ),
			'search_items'       => __( 'Search stories', 'mekongeye' ),
			'parent_item_colon'  => __( 'Parent stories:', 'mekongeye' ),
			'not_found'          => __( 'No stories found.', 'mekongeye' ),
			'not_found_in_trash' => __( 'No stories found in trash.', 'mekongeye' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'stories' ),
			'capability_type'    => 'post',
			'taxonomies'         => array('category', 'post_tag'),
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 4,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'story', $args );

	}

}

$GLOBALS['opendev_story'] = new MekongEye_Story();