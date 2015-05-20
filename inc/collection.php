<?php

/*
 * Open Development
 * Collection
 */

class MekongEye_Collection {

	function __construct() {

		add_action('init', array($this, 'register_post_type'));

	}

	function register_post_type() {

		$labels = array(
			'name'               => _x( 'Collections', 'post type general name', 'mekongeye' ),
			'singular_name'      => _x( 'Collection', 'post type singular name', 'mekongeye' ),
			'menu_name'          => _x( 'Collections', 'admin menu', 'mekongeye' ),
			'name_admin_bar'     => _x( 'Collection', 'add new on admin bar', 'mekongeye' ),
			'add_new'            => _x( 'Add new', 'collection', 'mekongeye' ),
			'add_new_item'       => __( 'Add new collection', 'mekongeye' ),
			'new_item'           => __( 'New collection', 'mekongeye' ),
			'edit_item'          => __( 'Edit collection', 'mekongeye' ),
			'view_item'          => __( 'View collection', 'mekongeye' ),
			'all_items'          => __( 'All collections', 'mekongeye' ),
			'search_items'       => __( 'Search collections', 'mekongeye' ),
			'parent_item_colon'  => __( 'Parent collections:', 'mekongeye' ),
			'not_found'          => __( 'No collections found.', 'mekongeye' ),
			'not_found_in_trash' => __( 'No collections found in trash.', 'mekongeye' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'collections' ),
			'capability_type'    => 'post',
			'taxonomies'         => array('category', 'post_tag'),
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 4,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'collection', $args );

	}

}

$GLOBALS['opendev_collection'] = new MekongEye_Collection();