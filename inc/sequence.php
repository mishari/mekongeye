<?php

/*
 * MekongEye
 * Sequence
 */

function register_sequence_post_type() {

    $labels = array(
        'name'               => _x( 'Sequences', 'post type general name', 'mekongeye' ),
        'singular_name'      => _x( 'Sequence', 'post type singular name', 'mekongeye' ),
        'menu_name'          => _x( 'Sequences', 'admin menu', 'mekongeye' ),
        'name_admin_bar'     => _x( 'Sequence', 'add new on admin bar', 'mekongeye' ),
        'add_new'            => _x( 'Add new', 'sequence', 'mekongeye' ),
        'add_new_item'       => __( 'Add new sequence', 'mekongeye' ),
        'new_item'           => __( 'New sequence', 'mekongeye' ),
        'edit_item'          => __( 'Edit sequence', 'mekongeye' ),
        'view_item'          => __( 'View sequence', 'mekongeye' ),
        'all_items'          => __( 'All sequences', 'mekongeye' ),
        'search_items'       => __( 'Search sequences', 'mekongeye' ),
        'parent_item_colon'  => __( 'Parent sequences:', 'mekongeye' ),
        'not_found'          => __( 'No sequences found.', 'mekongeye' ),
        'not_found_in_trash' => __( 'No sequences found in trash.', 'mekongeye' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'sequences' ),
        'capability_type'    => 'post',
        'taxonomies'         => array('category', 'post_tag'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'sequence', $args );

}

function custom_enqueue_script( $hook_suffix ) {
    wp_enqueue_script(
        'sequence-settings-script-handle', 
        get_stylesheet_directory_uri() . '/assets/javascript/custom_field_manager.js'
    );
}

function sequence_settings_box() {
    global $post;
    $sequence_image_1 = get_post_meta( $post->ID, 'sequence_image_1', true);
    $sequence_image_2 = get_post_meta( $post->ID, 'sequence_image_2', true);
    $sequence_image_3 = get_post_meta( $post->ID, 'sequence_image_3', true);
    $sequence_image_4 = get_post_meta( $post->ID, 'sequence_image_4', true);
    $sequence_image_5 = get_post_meta( $post->ID, 'sequence_image_5', true);
?>
    <input type="hidden" name="sequence_setting_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ) ?>">
    <div id="story_settings_box">
        <div class="metabox-tabs-div">
            <div id="genetal-tab" class="genetal-tab">
                <div class="type-title">
                    <h4>Sequence Image 1</h4>
                </div>
                <div id="sequence_image_1" class="settings">
                    <input class="custom_media_url" type="text" id="sequence_image_1" name="sequence_image_1" value="<?php echo $sequence_image_1 ?>">
                    <?php
                    if ( '' != $sequence_image_1 ) {
                        echo '<a class="button remove_image" id="sequence_image_1">Remove</a></br>';
                        echo '<img class="custom_media_image" id="sequence_image_1" src="' . $sequence_image_1 . '" height="100" width="400" />';
                    }
                    else {
                        echo '<a class="button media_upload" id="sequence_image_1">Upload</a>';
                    }
                    ?>
                </div>
                <div class="type-title">
                    <h4>Sequence Image 2</h4>
                </div>
                <div id="sequence_image_2" class="settings">
                    <input class="custom_media_url" type="text" id="sequence_image_2" name="sequence_image_2" value="<?php echo $sequence_image_2 ?>">
                    <?php
                    if ( '' != $sequence_image_2 ) {
                        echo '<a class="button remove_image" id="sequence_image_2">Remove</a></br>';
                        echo '<img class="custom_media_image" id="sequence_image_2" src="' . $sequence_image_2 . '" height="100" width="400" />';
                    }
                    else {
                        echo '<a class="button media_upload" id="sequence_image_2" id="sequence_image_2">Upload</a>';
                    }
                    ?>
                </div>
                <div class="type-title">
                    <h4>Sequence Image 3</h4>
                </div>
                <div id="sequence_image_3" class="settings">
                    <input class="custom_media_url" type="text" id="sequence_image_3" name="sequence_image_3" value="<?php echo $sequence_image_3 ?>">
                    <?php
                    if ( '' != $sequence_image_3 ) {
                        echo '<a class="button remove_image" id="sequence_image_3">Remove</a></br>';
                        echo '<img class="custom_media_image" id="sequence_image_3" src="' . $sequence_image_3 . '" height="100" width="400" />';
                    }
                    else {
                        echo '<a class="button media_upload" id="sequence_image_3" id="sequence_image_3">Upload</a>';
                    }
                    ?>
                </div>
                <div class="type-title">
                    <h4>Sequence Image 4</h4>
                </div>
                <div id="sequence_image_4" class="settings">
                    <input class="custom_media_url" type="text" id="sequence_image_4" name="sequence_image_4" value="<?php echo $sequence_image_4 ?>">
                    <?php
                    if ( '' != $sequence_image_4 ) {
                        echo '<a class="button remove_image" id="sequence_image_4">Remove</a></br>';
                        echo '<img class="custom_media_image" id="sequence_image_4" src="' . $sequence_image_4 . '" height="100" width="400" />';
                    }
                    else {
                        echo '<a class="button media_upload" id="sequence_image_4" id="sequence_image_4">Upload</a>';
                    }
                    ?>
                </div>
                <div class="type-title">
                    <h4>Sequence Image 5</h4>
                </div>
                <div id="sequence_image_5" class="settings">
                    <input class="custom_media_url" type="text" id="sequence_image_5" name="sequence_image_5" value="<?php echo $sequence_image_5 ?>">
                    <?php
                    if ( '' != $sequence_image_5 ) {
                        echo '<a class="button remove_image" id="sequence_image_5">Remove</a></br>';
                        echo '<img class="custom_media_image" id="sequence_image_5" src="' . $sequence_image_5 . '" height="100" width="400" />';
                    }
                    else {
                        echo '<a class="button media_upload" id="sequence_image_5" id="sequence_image_5">Upload</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

function sequence_settings() {
        add_meta_box (
            'sequence_settings',
            'Sequence Settings Box',
            'sequence_settings_box',
            'sequence',
            'normal'
        );
    }

/* Save data for per story setting */
function save_sequence_settings ( $post_id ) {
    if ( ! array_key_exists( 'sequence_setting_meta_box_nonce', $_POST ) ) {
        $_POST['sequence_setting_meta_box_nonce'] = '';
    }

    // verify nonce
    if ( ! wp_verify_nonce( $_POST['sequence_setting_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // check permissions
    if ( 'sequence' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }
    elseif ( !current_user_can('edit_post', $post_id ) ) {
        return $post_id;
    }

    $sequence_image_1 = $_POST['sequence_image_1'];
    $sequence_image_2 = $_POST['sequence_image_2'];
    $sequence_image_3 = $_POST['sequence_image_3'];
    $sequence_image_4 = $_POST['sequence_image_4'];
    $sequence_image_5 = $_POST['sequence_image_5'];

    update_post_meta($post_id, 'sequence_image_1', $sequence_image_1);
    update_post_meta($post_id, 'sequence_image_2', $sequence_image_2);
    update_post_meta($post_id, 'sequence_image_3', $sequence_image_3); 
    update_post_meta($post_id, 'sequence_image_4', $sequence_image_4); 
    update_post_meta($post_id, 'sequence_image_5', $sequence_image_5);    
}

function include_template_sequence( $template_path ) {
    if ( get_post_type() == 'sequence' ) {
        if ( is_single() ) {
            $template_path = get_stylesheet_directory() . '/content-sequence.php';
        }
    }

    return $template_path;
}


/* Add action to wp function */
add_filter('template_include', 'include_template_sequence' );
add_action( 'admin_enqueue_scripts', 'custom_enqueue_script' );
add_action( 'admin_init', 'sequence_settings' );
add_action('save_post', 'save_sequence_settings' );
add_action( 'init', 'revcon_change_post_object' );
add_action( 'init', 'register_sequence_post_type' );
