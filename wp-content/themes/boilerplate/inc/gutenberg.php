<?php

add_filter('block_categories', function ($categories, $post) {
    return array_merge(
        [
            [
                'slug' => 'page-blocks',
                'title' => __('Page Blocks', 'theme-blocks'),
            ],

        ],
        $categories
    );
}, 10, 2);

add_action('acf/init', function () {

    if (function_exists('acf_register_block')) {

        acf_register_block([
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('Title, background image and CTA\'s.'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Hero'],
            'mode' => 'edit'
        ]);
    }

});


function theme_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/template-parts/blocks/{$slug}.php"))) {
        include(get_theme_file_path("/template-parts/blocks/{$slug}.php"));
    }
}