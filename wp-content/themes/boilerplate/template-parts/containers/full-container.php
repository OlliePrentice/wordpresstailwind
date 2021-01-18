<?php

$id = seoUrl($block['title']) . '-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

?>

<div id="<?= $id; ?>" class="full-container">
    <div class="container mx-auto" data-aos="fade">
        <?php
//        $allowed_blocks = array('core/image', 'core/paragraph', 'core/heading');
//        echo '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />';
        //        $template = array(
        //            array('core/columns', array(), array(
        //                array('core/column', array(), array()),
        //            ))
        //        );

//        echo '<InnerBlocks template="' . esc_attr(wp_json_encode($template)) . '" templateLock="insert" />';
        echo '<InnerBlocks/>';
        ?>
    </div>
</div>
