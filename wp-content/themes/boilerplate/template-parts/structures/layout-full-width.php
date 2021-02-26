<?php

$id = seoUrl($block['title']) . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$classes = !empty( $block['classes'] ) ? [$block['classes']] : [];
$classes[] = !empty( $block['default_classes'] ) ? $block['default_classes'] : '';
$classes[] = padding_classes();

?>

<section id="<?php echo $id; ?>" class="py-8 md:py-20 px-4 <?php echo 'block-' . $slug; ?>">
        <?php include( get_theme_file_path( "/template-parts/blocks/{$slug}.php" ) ); ?>
</section>
