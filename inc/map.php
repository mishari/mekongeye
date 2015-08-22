<?php

/*
 * MekongEye
 * Map
 */

function map_author_support()
{
    add_post_type_support('map', 'author');
}

/* Add action to wp function */
add_action('init', 'map_author_support', 100);
