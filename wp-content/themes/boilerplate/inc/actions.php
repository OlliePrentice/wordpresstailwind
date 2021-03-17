<?php

/*
Remove info from headers
- remove the stuff we don't need
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/*
Admin Menus
- hide unused menu items
 */
add_action('admin_menu', function() {
    remove_menu_page('edit-comments.php');
});


/**
 * Remove the content from post types
 */
//add_action('admin_init', function() {
//
//});


/**
 * Google Maps ACF key
 */
add_action('acf/init', function() {

    $google_maps_key = get_field('google_maps_api_key', 'options');

    if($google_maps_key) {
        acf_update_setting('google_api_key', get_field('google_maps_api_key', 'options'));
    }
});


/**
 * Add the wp-editor back into WordPress after it was removed in 4.2.2.
 *
 * @see https://wordpress.org/support/topic/you-are-currently-editing-the-page-that-shows-your-latest-posts?replies=3#post-7130021
 * @param $post
 * @return void
 */
function fix_no_editor_on_posts_page($post)
{

    if ($post->ID != get_option('page_for_posts')) {
        return;
    }

    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');

}

// This is applied in a namespaced file - so amend this if you're not namespacing
add_action('edit_form_after_title', __NAMESPACE__ . '\\fix_no_editor_on_posts_page', 0);



function sci_pre_posts($query)
{

    if (is_admin()) {
        return;
    }

    if (($query->is_archive() || $query->is_home()) && $query->is_main_query() && !is_admin()) {

        $page_obj = get_queried_object();

        $default_post_type  = 'post';
        $_post_type         = $default_post_type;
        $_posts_per_page    = get_option( 'posts_per_page' );
    
        if ($query->is_archive()) {
          
            $archive_post_type = get_queried_object();
            $type_name = $archive_post_type->name;

            if ( is_tax() || is_category() || is_tag() ) {
                $tax_obj = get_taxonomy( $archive_post_type->taxonomy );
                $type_name = $tax_obj->object_type[0];
            }
            
            if ( $type_name === 'post' ) {

                $_post = get_post( get_option( 'page_for_posts' ) );

            } else {
                
                $_post = get_field( $type_name, 'options' );
            }

            $default_post_type = $type_name;
            $_post_type        = $default_post_type;
            
        } else {
            $_post = get_post($query->queried_object->ID);
        }    


        if (has_blocks($_post->post_content)) {
            $blocks = parse_blocks($_post->post_content);

            foreach ($blocks as $block) {

                if ($block['blockName'] === 'acf/post-loop') {
                    
                    $_post_type = !empty($block['attrs']['data']['post_type']) ? $block['attrs']['data']['post_type'] : $default_post_type;
                    $_posts_per_page = !empty($block['attrs']['data']['posts_per_page']) ? $block['attrs']['data']['posts_per_page'] : get_option( 'posts_per_page' );

                }
            }
        }

        $query->set('post_type', $_post_type);
        $query->set('posts_per_page', $_posts_per_page);

        $tax_query = get_url_tax_query($_post_type, $page_obj);

        if ($tax_query) {
            $query->set('tax_query', $tax_query);
        }

        if(isset($_GET['_s']) && $_GET['_s'] !== '') {
            $query->set('s', $_GET['_s']);
        }
    }
}

add_action('pre_get_posts', 'sci_pre_posts');


function sci_filter_posts()
{

    $tax_obj        = $_GET['_taxQuery'];
    $post_types     = $_GET['_postTypes'];
    $per_page       = sanitize_text_field($_GET['_perPage']);
    $result         = [];

    $args = [
        'post_type'        => $post_types,
        'post_status'      => 'publish',
        'posts_per_page'   => $per_page ? $per_page : get_option( 'posts_per_page' ),
    ];

    $tax_query = [];

    if ($tax_obj) {
        foreach ($tax_obj as $_taxonomy) {
            $tax_query[] = [
                'taxonomy' => $_taxonomy['name'],
                'terms' => $_taxonomy['terms']
            ];

        }
    }

    $args['tax_query'] = $tax_query;

    $_query = new WP_Query( $args );

    ob_start();

    get_template_part( 'template-parts/components/post-grid', '', ['query' => $_query] );

    $result['content'] = ob_get_clean();

    echo json_encode($result);
    
    die();
    
}

add_action("wp_ajax_filter_posts", "sci_filter_posts");
add_action("wp_ajax_nopriv_filter_posts", "sci_filter_posts");