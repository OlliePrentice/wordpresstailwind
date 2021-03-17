<?php

$max_pages = ! empty( $args['max_pages'] ) ? $args['max_pages'] : 0;

?>

<?php if (get_next_posts_link('', $max_pages)) : ?>
    <div class="pagination pagination-infinite text-center">
        <div class="page-load-status"><span class="loader infinite-scroll-request mt-5"></span></div>
        <div class="next-posts-link hidden"><?php next_posts_link('Load more', $max_pages); ?></div>
    </div>
<?php endif; ?>
