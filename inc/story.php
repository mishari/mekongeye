<?php

/*
 * MekongEye
 * Story
 */

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Stories';
    $submenu['edit.php'][5][0] = 'Stories';
    $submenu['edit.php'][10][0] = 'Add Story';
    $submenu['edit.php'][16][0] = 'Story Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Stories';
    $labels->singular_name = 'Story';
    $labels->add_new = 'Add Story';
    $labels->add_new_item = 'Add Story';
    $labels->edit_item = 'Edit Story';
    $labels->new_item = 'Story';
    $labels->view_item = 'View Story';
    $labels->search_items = 'Search Stories';
    $labels->not_found = 'No Story found';
    $labels->not_found_in_trash = 'No Story found in Trash';
    $labels->all_items = 'All Stories';
    $labels->menu_name = 'Story';
    $labels->name_admin_bar = 'Story';
}

function include_template_story( $template_path ) {
    if ( get_post_type() == 'post' ) {
        if ( is_single() ) {
            $template_path = get_stylesheet_directory() . '/content-story.php';
        }
    }

    return $template_path;
}

/* Add action to wp function */

add_filter( 'template_include', 'include_template_story' );
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
