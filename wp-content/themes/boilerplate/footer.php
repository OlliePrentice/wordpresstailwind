</main>

<?php

$logo = get_field('logo', 'options');

?>

<footer class="main-footer hidden">
    <?php if ($logo) : ?>
        <div class="main-footer__logo">
            <a href="<?= home_url('/'); ?>" class="main-footer__logo-link"><img
                        src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>"></a>
        </div>
    <?php endif; ?>
        <nav class="main-footer__nav">
            <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false)); ?>
        </nav>
</footer><!-- .mastfoot -->

<?php

$google_maps_key = get_field('google_maps_api_key', 'options');

?>

<?php if($google_maps_key) : ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_key; ?>"></script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
