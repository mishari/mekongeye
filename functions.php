<?php
// Include Article
require_once(STYLESHEETPATH . '/inc/story.php');

// Include Collection
require_once(STYLESHEETPATH . '/inc/collection.php');

// Include Link
require_once(STYLESHEETPATH . '/inc/link.php');

// Include Sequence
require_once(STYLESHEETPATH . '/inc/sequence.php');

// Include Map
require_once(STYLESHEETPATH . '/inc/map.php');


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

function create_taxonomies() {
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
    register_taxonomy( 'topic', array('page', 'post', 'link', 'sequence', 'map'), $topic_args );

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
    register_taxonomy( 'region', array('page', 'post', 'link', 'sequence', 'map'), $region_args );

    $publication_type = array(
        'name'              => _x( 'Publication Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Publication Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Publication Types' ),
        'all_items'         => __( 'All Publication Types' ),
        'parent_item'       => __( 'Parent Publication Type' ),
        'parent_item_colon' => __( 'Parent Publication Type:' ),
        'edit_item'         => __( 'Edit Publication Type' ),
        'update_item'       => __( 'Update Publication Type' ),
        'add_new_item'      => __( 'Add New Publication Type' ),
        'new_item_name'     => __( 'New Publication Type Name' ),
        'menu_name'         => __( 'Publication Type' ),
    );

    $region_args = array(
        'hierarchical'          => true,
        'labels'                => $publication_type,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'pub_type' ),
    );
    register_taxonomy( 'pub_type', array('page', 'post', 'link', 'sequence', 'map'), $region_args );
}
add_action( 'init', 'create_taxonomies', 0 );

function editor_pick_settings_box() {
    global $post;
    $editor_pick = get_post_meta( $post->ID, 'editor_pick', true);
    $checked = ($editor_pick == "true" ? 'checked="checked"' : '');
?>
    <input type="hidden" name="editor_pick_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ) ?>">
    <div id="editor_pick">
        <div class="metabox-tabs-div">
            <div id="genetal-tab" class="genetal-tab">
                <input type="checkbox" name="editor_pick" value="true" <?php echo $checked; ?> />
                <label>Editor's Pick</label>
            </div>
        </div>
    </div>
<?php
}

function editor_pick_settings() {
    $types = array('post', 'link', 'sequence', 'map');
    foreach ($types as $type) {
        add_meta_box (
            'editor_pick',
            'Editor\'s Pick Box',
            'editor_pick_settings_box',
            $type,
            'side'
        );
    }        
}

/* Save data for per story setting */
function save_editor_pick ( $post_id ) {
    if ( ! array_key_exists( 'editor_pick_meta_box_nonce', $_POST ) ) {
        $_POST['editor_pick_meta_box_nonce'] = '';
    }

    // verify nonce
    if ( ! wp_verify_nonce( $_POST['editor_pick_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    $editor_pick = $_POST['editor_pick'];

    update_post_meta($post_id, 'editor_pick', $editor_pick);

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
    }
}

add_action( 'admin_init', 'editor_pick_settings' );
add_action( 'save_post', 'save_editor_pick' );

function content_settings_box() {
    global $post;
    $editor_pick = get_post_meta( $post->ID, 'pub_name', true);
    $editor_pick = get_post_meta( $post->ID, 'source_link', true);
    $editor_pick = get_post_meta( $post->ID, 'author_name', true);
?>
    <input type="hidden" name="editor_pick_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ) ?>">
    <div id="content_settings_box">
        <div class="metabox-tabs-div">
            <div id="genetal-tab" class="genetal-tab">
                <div class="type-title">
                    <h4>Publication Name</h4>
                </div>
                <div class="settings">
                    <input type="text" size="100" name="pub_name" id="pub_name" value="<?php echo $pub_name ?>">
                </div>
                <div class="type-title">
                    <h4>Source link</h4>
                </div>
                <div class="settings">
                    <input type="text" size="100" name="source_link" id="source_link" value="<?php echo $source_link ?>">
                </div>
                <div class="type-title">
                    <h4>Author Name</h4>
                </div>
                <div class="settings">
                    <input type="text" size="100" name="author_name" id="author_name" value="<?php echo $author_name ?>">
                </div>
            </div>
        </div>
    </div>
<?php
}

function content_settings() {
    $types = array('post', 'link', 'sequence', 'map');
    foreach ($types as $type) {
        add_meta_box (
            'content_settings_box',
            'Content Settings Box',
            'content_settings_box',
            $type,
            'normal'
        );
    }        
}

/* Save data for per story setting */
function save_content_settings ( $post_id ) {
    if ( ! array_key_exists( 'editor_pick_meta_box_nonce', $_POST ) ) {
        $_POST['editor_pick_meta_box_nonce'] = '';
    }

    // verify nonce
    if ( ! wp_verify_nonce( $_POST['editor_pick_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    $pub_name = $_POST['pub_name'];
    $source_link = $_POST['source_link'];
    $author_name = $_POST['author_name'];

    update_post_meta($post_id, 'pub_name', $pub_name);
    update_post_meta($post_id, 'source_link', $source_link);
    update_post_meta($post_id, 'author_name', $author_name);

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
    }
}

add_action( 'admin_init', 'content_settings' );
add_action( 'save_post', 'save_content_settings' );

function set_posts_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function shortcode_posts( $atts ) {
    extract( shortcode_atts( array(
        'size' => 'medium',
        'topic' => '',
        'region' => '',
        'exclude' => '',
        'offset' => 0,
        'id' => NULL,
        'class' => NULL,
    ), $atts ) );

    if ('' != $id) {
        $post = get_post($id);
        $html = $post->ID;
    }

    else {
    	if ($size == 'extra_large') {
            $posts_per_page = 1;
            $width = 1080;
            $height = 460;
        }
        elseif ($size == 'large') {
            $posts_per_page = 2;
            $width = 166;
            $height = 166;
        }
        elseif ($size == 'medium') {
            $posts_per_page = 3;
            $width = 64;
            $height = 64;
        }
    	$arg_defaults = array(
            'width'              => $width,
            'height'             => $height,
            'crop'               => true,
            'crop_from_position' => 'center,center',
            'resize'             => true,
            'cache'              => true,
            'default'            => null,
            'jpeg_quality'       => 70,
            'resize_animations'  => false,
            'return'             => 'url',
            'background_fill'    => null
    	);
        
        $args = array(
            'posts_per_page'   => $posts_per_page,
            'offset'           => $offset,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'exclude'          => $exclude,
            'post_type'        => array('post', 'link', 'sequence', 'map'),
            'post_status'      => 'publish',
            'suppress_filters' => true,
            'region'           => $region,
            'topic'            => $topic
        );
        $posts = get_posts( $args );
        if ($size == 'extra_large') {
            $html .= '<div class="sc-slice size-xl ' . $class . '">';
        }
        elseif ($size == 'large') {
            $html .= '<div class="sc-slice size-lg ' . $class . '">';
        }
        elseif ($size == 'medium') {
            $html .= '<div class="sc-slice size-md format-3col format-md-bg ' . $class . '">';
        }
        foreach ( $posts as $post ) {
            if (has_post_thumbnail($post->ID)) {
            	$image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                $featured_image = '<img src="' . wpthumb( $image_src[0], $arg_defaults ) . '" alt="' . $post->post_title . '" />';
                $html .= '<article class="sc-story option-image">';
            } else {
                $html .= '<article class="sc-story">';
            }
            
            if ($post->post_type == 'link') {
                $link = get_post_meta($post->ID, 'link_target', true);
                $html .= '<a href="' . $link .'">';
            }
            else {
                $html .= '<a href="' . post_permalink($post->ID) .'">';
            }
            if (has_post_thumbnail($post->ID)) {
                $html .= '<div class="sc-story__hd">';
                $html .= $featured_image;
                $html .= '</div>';
            }
            else {
                if ($size == 'extra_large') {
                    $html .= '<div class="sc-story__hd">';
                    $html .= '<p>';
                    $html .= $post->post_excerpt;
                    $html .= '</p>';
                    $html .= '</div>';
                }
            }
            $html .= '<div class="sc-story__bd">';
            $kicker = wp_get_post_terms($post->ID, 'pub_type', array('fields' => 'names'));
            if ($kicker[0] != '') {
                $html .= '<p class="kicker">' . $kicker[0] . '</p>';
            }
            $html .= '<h4>' . $post->post_title . '</h4>';
            $date = get_the_date( 'j M Y', $post->ID );
            $html .= '<p class="dateline">' . $date . '</p>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</article>';
        }
        $html .= '</div>';
    }
    return $html;
}

add_shortcode( 'posts', 'shortcode_posts' );

function shortcode_section( $atts, $content=null ) {
    extract( shortcode_atts( array(
        'name' => '',
        'link' => '#',
        'class' => ''
    ), $atts ) );

    $html = '<section class="sc-container ' . $class . '">';
    if ($name != '') {
        $html .= '<h2><a href="' . $link . '">' . $name . ' <b>»</b></a></h2>';
    }
    $html .= do_shortcode($content);
    $html .= '</section>';
    return $html;
}

add_shortcode( 'section', 'shortcode_section' );

function shortcode_map_group( $atts ) {
    extract( shortcode_atts( array(
        'id' => NULL,
    ), $atts ) );
    $html = '<div class="sc-slice size-xl">';
    $html .= '<ul id="map-group" class="nav nav-tabs" role="tablist">';
    $maps_group_data = jeo_get_mapgroup_data($id);
    $maps = $maps_group_data["maps"];
    $first_map_id = reset($maps)["id"];
    foreach ($maps as $map) {
        if($map["id"] == $first_map_id) {
            $html .= '<li role="presentation" class="active"><a href="#' . $map["id"] . '" aria-controls="' . $map["id"]  . '" role="tab" data-toggle="tab">' . $map["title"] . '</a></li>';
        } else {
             $html .= '<li role="presentation"><a href="#' . $map["id"] . '" aria-controls="' . $map["id"]  . '" role="tab" data-toggle="tab">' . $map["title"] . '</a></li>';
        }
    }
    $html .= '</ul>';
    $html .= '<div class="tab-content">';
    foreach ($maps as $map) {
        $html .= '<div role="tabpanel" class="tab-pane active" id="' . $map["id"] . '">';
        $html .= '<article class="sc-story option-image">';
        $html .= '<div class="sc-story__hd">';
        $html .= '<div class="map-container clearfix map-fill map-tall">';
        $html .= '<div id="map_' . $map["id"] . '_0"></div>';
        $html .= '</div>';
        $html .= '<script type="text/javascript">jeo({"postID":' . $map["id"] . ',"count":0});</script>';
        $html .= '</div>';
        $html .= '<a href="' . post_permalink($map["id"]) . '">';
        $html .= '<div class="sc-story__bd">';
        $kicker = wp_get_post_terms($post["id"], 'pub_type', array('fields' => 'names'));
        if ($kicker[0] != '') {
            $html .= '<p class="kicker">' . $kicker[0] . '</p>';
        }
        $html .= '<h4>' . $map["title"] . '</h4>';
        $html .= '<p class="dateline">' . get_the_date( 'j M Y', $map["id"] ) . '</p>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</article>';
        $html .= '</div>';
    }
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<script>';
    $html .= '$("#map-group a").click(function (e) {';
    $html .= 'e.preventDefault()';
    $html .= '$(this).tab("show")';
    $html .= '$(this).hide().fadeIn("fast");';
    $html .= '})';
    $html .= '</script>';
    $html .= '<script>';
    $html .= '$(window).load(function(){';
    $html .= '$("div.tab-content>div:gt(0)").removeClass("active")';
    $html .= '});';
    $html .= '</script>';
    
    return $html;
}

add_shortcode( 'map_group', 'shortcode_map_group' );
  
function the_content_filter($content) {
    $block = "section";
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}

add_filter("the_content", "the_content_filter");

?>
