<?php

$id = seoUrl($block['title']) . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

?>

<section id="<?= $id; ?>" class="py-8 md:py-20 px-4 relative overflow-hidden <?= 'block-' . $slug; ?>">
        <?php include(get_theme_file_path("/template-parts/blocks/{$slug}.php")); ?>
</section>
