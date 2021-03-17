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

        acf_register_block_type([
            'name'              => 'full-container',
            'title'             => __('Full Container'),
            'mode'              => 'preview',
            'render_template'   => '/template-parts/containers/full-container.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true
            ),

        ]);

        acf_register_block([
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('Title, background image and CTA\'s.'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Hero'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true
            ),
        ]);
    }

});


function theme_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (!empty($block['layout']) && $block['layout']) {
        if($block['layout'] === 'full') {
            if (file_exists(get_theme_file_path("/template-parts/structures/layout-full-width.php"))) {
                include(get_theme_file_path("/template-parts/structures/layout-full-width.php"));
            }
        } else {
            if (file_exists(get_theme_file_path("/template-parts/structures/layout.php"))) {
                include(get_theme_file_path("/template-parts/structures/layout.php"));
            }
        }
    } else {
        if (file_exists(get_theme_file_path("/template-parts/blocks/{$slug}.php"))) {
            include(get_theme_file_path("/template-parts/blocks/{$slug}.php"));
        }
    }
}
