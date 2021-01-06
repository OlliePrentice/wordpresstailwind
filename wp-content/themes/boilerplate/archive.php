<?php

get_header();

$_post_type = get_queried_object();

if(is_tax() || is_category() || is_tag()) {
	$tax_obj = get_taxonomy($_post_type->taxonomy);
	$_post_type->name = $tax_obj->object_type[0];
}

$args = [
	'post_type' => 'page',
	'meta_query' => [
		[
			'key' => 'page_archive',
			'value' => $_post_type->name
		]
	]
];

$archive_query = new WP_Query($args);

if($archive_query->have_posts()) {
	while($archive_query->have_posts()) {
		$archive_query->the_post();

		$_id = $archive_query->post->ID;

		the_content($_id);
	}
	wp_reset_postdata();
}

get_footer();
