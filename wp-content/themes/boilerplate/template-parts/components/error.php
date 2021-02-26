<?php

$heading = get_field('404_heading', 'options');
$copy = get_field('404_copy', 'options');
$button = get_field('404_button', 'options');

?>

<section class="error-block py-20">
    <div class="container mx-auto">
        <div class="error-block__content text-center">
            <?php if ($heading) : ?>
                <h1 class="error-block__heading"><?php echo $heading; ?></h1>
            <?php endif; ?>
            <?php if ($copy) : ?>
                <div class="error-block__copy mb-6">
                    <?php echo $copy; ?>
                </div>
            <?php endif; ?>
            <?php if ($button) : ?>
               <?php get_template_part('template-parts/components/button','', $button); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
