<?php

$id = seoUrl( $block['title'] ) . '-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

$classes = !empty( $block['classes'] ) ? [$block['classes']] : [];
$classes[] = !empty( $block['default_classes'] ) ? $block['default_classes'] : '';
$classes[] = padding_classes();

?>

<div id="<?php echo $id; ?>" class="full-container <?php echo implode( ' ', $classes ); ?>">
    <div class="container mx-auto" data-aos="fade">
        <?php
        echo '<InnerBlocks/>';
        ?>
    </div>
</div>
