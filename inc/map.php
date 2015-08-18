<?php

/*
 * MekongEye
 * Map
 */

function map_author_support()
{
    add_post_type_support('map', 'author');
}

function include_template_map( $template_path ) {
    if ( get_post_type() == 'map' ) {
        if ( is_single() ) {
            $template_path = get_stylesheet_directory() . '/content-map.php';
        }
    }

    return $template_path;
}

/* Add action to wp function */
add_filter( 'template_include', 'include_template_map' );
add_action('init', 'map_author_support', 100);
