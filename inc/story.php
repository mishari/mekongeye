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

function story_settings_box() {
    global $post;

    $story_sub_title = get_post_meta( $post->ID, 'story_sub_title', true);
    $story_location = get_post_meta( $post->ID, 'story_location', true);
?>
    <input type="hidden" name="story_setting_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ) ?>">
    <div id="story_settings_box">
        <div class="metabox-tabs-div">
            <div id="genetal-tab" class="genetal-tab">
                <div class="type-title">
                    <h4>Story Sub Title</h4>
                </div>
                <div id="sub_title" class="settings">
                    <input type="text" size="100" name="story_sub_title" id="story_sub_title" value="<?php echo $story_sub_title ?>">
                </div>
                <div class="type-title">
                    <h4>Location</h4>
                </div>
                <div id="location" class="settings">
                    <input type="text" size="50" name="story_location" id="story_location" value="<?php echo $story_location ?>">
                </div>
            </div>
        </div>
    </div>
<?php
}

function story_settings() {
        add_meta_box (
            'story_settings',
            'Story Settings Box',
            'story_settings_box',
            'post',
            'normal'
        );
    }

/* Save data for per story setting */
function save_story_settings ( $post_id ) {
    if ( ! array_key_exists( 'story_setting_meta_box_nonce', $_POST ) ) {
        $_POST['story_setting_meta_box_nonce'] = '';
    }

    // verify nonce
    if ( ! wp_verify_nonce( $_POST['story_setting_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // check permissions
    if ( 'post' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }
    elseif ( !current_user_can('edit_post', $post_id ) ) {
        return $post_id;
    }

    $story_sub_title = $_POST['story_sub_title'];
    $story_location = $_POST['story_location'];

    update_post_meta($post_id, 'story_sub_title', $story_sub_title);
    update_post_meta($post_id, 'story_location', $story_location);
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
add_action( 'admin_init', 'story_settings' );
add_action( 'save_post', 'save_story_settings' );
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
