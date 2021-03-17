<?php

$id = seoUrl($block['title']) . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$classes = !empty( $block['classes'] ) ? [$block['classes']] : [];
$classes[] = !empty( $block['default_classes'] ) ? $block['default_classes'] : '';
$classes[] = padding_classes();

?>

<section id="<?php echo $id; ?>" class="<?php echo implode( ' ', $classes ); ?> <?php echo 'block-' . $slug; ?>">
    <?php include( get_theme_file_path( "/template-parts/blocks/{$slug}.php" ) ); ?>
</section>
