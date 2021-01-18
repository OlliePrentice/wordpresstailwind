<?php

$id = seoUrl($block['title']) . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

?>

<section id="<?= $id; ?>" class="py-8 md:py-20 position-relative <?= !empty($block['overflow']) && $block['overflow'] === 'hidden' ? 'overflow-hidden' : ''; ?> <?= 'block-' . $slug; ?>">
    <div class="container mx-auto">
        <?php include(get_theme_file_path("/template-parts/blocks/{$slug}.php")); ?>
    </div>
</section>
