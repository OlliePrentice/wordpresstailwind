<?php

/**
 * Component: Link
 */

$button = $args;

?>

<div class="btn-wrap">
    <a href="<?= $button['url']; ?>" <?= (!empty($button['target'])) ? 'target="_blank"' : ''; ?>
       class="link <?= (!empty($button['classes'])) ? $button['classes'] : ''; ?>" <?= (!empty($button['attr'])) ? $button['attr'] : ''; ?>><?= !empty($button['icon']) ? $button['icon'] : ''; ?><span><?= $button['title']; ?></span></a>
</div>
