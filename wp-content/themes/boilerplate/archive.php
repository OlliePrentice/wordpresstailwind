<?php

get_header();

$post_type = get_queried_object();
$type_name = $post_type->name;

if ( is_tax() || is_category() || is_tag() ) {
	$tax_obj = get_taxonomy( $post_type->taxonomy );
	$type_name = $tax_obj->object_type[0];
}

if ( $type_name === 'post' ) {
    $content_post = get_post(get_option( 'page_for_posts' ));
} else {
    $content_post = get_field($type_name, 'options');
}

if ( $content_post ) {
    $content = apply_filters( 'the_content', $content_post->post_content );
    $content = str_replace( ']]>', ']]&gt;', $content );

    echo $content;
}


get_footer();