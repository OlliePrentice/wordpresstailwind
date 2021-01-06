<?php

/**
 * Create Post Type
 */
//function theme_post_type()
//{
//    $labels = array(
//        'name' => __('Types'),
//        'singular_name' => __('Type'),
//        'all_items' => __('All Types'),
//        'add_new' => __('Add New'),
//        'add_new_item' => __('Add New'),
//        'edit_item' => __('Edit'),
//        'new_item' => __('New'),
//        'view_item' => __('View'),
//        'search_items' => __('Search'),
//        'not_found' => __('No Types Found'),
//        'not_found_in_trash' => __('No Types Found in Trash'),
//        'parent_item_colon' => ''
//    );
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'publicly_queryable' => true,
//        'show_ui' => true,
//        'exclude_from_search' => false,
//        'show_in_nav_menus' => true,
//        'has_archive' => true,
//        'rewrite' => array('slug' => 'type', 'with_front' => false),
//        'menu_icon' => 'dashicons-clipboard',
//        'menu_position' => 21,
//        'hierarchical' => false,
//        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
//    );
//    register_post_type('type', $args);
//}
//add_action('init', 'theme_post_type');
//
///**
// * Create Post Taxonomy
// */
//function theme_post_taxonomy()
//{
//    $labels = array(
//        'name' => _x('Categories', 'taxonomy general name'),
//        'singular_name' => _x('Category', 'taxonomy singular name'),
//        'search_items' => __('Categories'),
//        'all_items' => __('All Categories'),
//        'parent_item' => __('Parent Category'),
//        'parent_item_colon' => __('Parent Category:'),
//        'edit_item' => __('Edit Category'),
//        'update_item' => __('Update Category'),
//        'add_new_item' => __('Add Category'),
//        'new_item_name' => __('New Category'),
//        'menu_name' => __('Categories'),
//    );
//    register_taxonomy('type_category', array('type'), array(
//        'hierarchical' => true,
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//    ));
//}
//add_action('init', 'theme_post_taxonomy');
//
