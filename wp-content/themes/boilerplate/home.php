<?php

get_header();

$content_post = get_post(get_option( 'page_for_posts' ));
$content = apply_filters('the_content', $content_post->post_content);
$content = str_replace(']]>', ']]&gt;', $content);

echo $content;

get_footer();
