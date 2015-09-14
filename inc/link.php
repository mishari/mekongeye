<?php

/*
 * MekongEye
 * Link
 */

function register_link_post_type() {

    $labels = array(
        'name'               => _x( 'Links', 'post type general name', 'mekongeye' ),
        'singular_name'      => _x( 'Link', 'post type singular name', 'mekongeye' ),
        'menu_name'          => _x( 'Links', 'admin menu', 'mekongeye' ),
        'name_admin_bar'     => _x( 'Link', 'add new on admin bar', 'mekongeye' ),
        'add_new'            => _x( 'Add new', 'link', 'mekongeye' ),
        'add_new_item'       => __( 'Add new link', 'mekongeye' ),
        'new_item'           => __( 'New link', 'mekongeye' ),
        'edit_item'          => __( 'Edit link', 'mekongeye' ),
        'view_item'          => __( 'View link', 'mekongeye' ),
        'all_items'          => __( 'All links', 'mekongeye' ),
        'search_items'       => __( 'Search links', 'mekongeye' ),
        'parent_item_colon'  => __( 'Parent links:', 'mekongeye' ),
        'not_found'          => __( 'No links found.', 'mekongeye' ),
        'not_found_in_trash' => __( 'No links found in trash.', 'mekongeye' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'links' ),
        'capability_type'    => 'post',
        'taxonomies'         => array(),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'link', $args );

}

function link_settings_box() {
    global $post;
    $link_target = get_post_meta( $post->ID, 'link_target', true);
?>
    <input type="hidden" name="link_setting_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ) ?>">
    <div id="story_settings_box">
        <div class="metabox-tabs-div">
            <div id="genetal-tab" class="genetal-tab">
                <div class="type-title">
                    <h4>Link Target</h4>
                </div>
                <div class="settings">
                    <input type="text" size="100" name="link_target" id="link_target" value="<?php echo $link_target ?>">
                </div>
            </div>
        </div>
    </div>
<?php
}

function link_settings() {
        add_meta_box (
            'link_settings',
            'Link Settings Box',
            'link_settings_box',
            'link',
            'normal'
        );
    }

/* Save data for per story setting */
function save_link_settings ( $post_id ) {
    if ( ! array_key_exists( 'link_setting_meta_box_nonce', $_POST ) ) {
        $_POST['link_setting_meta_box_nonce'] = '';
    }

    // verify nonce
    if ( ! wp_verify_nonce( $_POST['link_setting_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // check permissions
    if ( 'link' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }
    elseif ( !current_user_can('edit_post', $post_id ) ) {
        return $post_id;
    }

    $link_target = $_POST['link_target'];

    update_post_meta($post_id, 'link_target', $link_target);    
}

/* Add action to wp function */
add_action( 'admin_init', 'link_settings' );
add_action('save_post', 'save_link_settings' );
add_action( 'init', 'register_link_post_type' );
