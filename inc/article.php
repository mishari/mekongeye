<?php

/*
 * MekongEye
 * Story
 */

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Article';
    $submenu['edit.php'][5][0] = 'Article';
    $submenu['edit.php'][10][0] = 'Add Article';
    $submenu['edit.php'][16][0] = 'Article Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Article';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'Article';
    $labels->view_item = 'View Article';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No Article found';
    $labels->not_found_in_trash = 'No Article found in Trash';
    $labels->all_items = 'All Articles';
    $labels->menu_name = 'Article';
    $labels->name_admin_bar = 'Article';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );