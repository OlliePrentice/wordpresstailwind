<?php

/**
 * Component: Mobile Navigation
 */

?>

<div class="mobile-navigation hidden">
    <span class="mobile-navigation__close"></span>
    <nav class="mobile-navigation__nav">
        <?php wp_nav_menu(['theme_location' => 'header', 'container' => false]); ?>
    </nav>
</div><!-- .mobile-navigation -->
