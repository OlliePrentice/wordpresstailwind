<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1"/>
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<header class="main-header shadow-sm bg-white">
    <div class="container mx-auto">
        <div class="flex -mx-2 items-center">
            <div class="flex-auto px-2">
                <div class="main-header__logo">
                    <a href="<?= home_url('/'); ?>"
                       class="main-header__logo-link text-lg font-medium text-gray-600"><?= __('Boilerplate'); ?></a>
                </div>
            </div>
            <div class="flex-initial px-2">
                <nav class="main-header__nav text-zero">
                    <?php wp_nav_menu(['theme_location' => 'header', 'container' => false, 'walker' => new OP_Walker_Nav]); ?>
                </nav>
                <?php get_template_part('template-parts/components/burger'); ?>
            </div>
        </div>
    </div>
</header><!-- .masthead -->

<?php

get_template_part('template-parts/components/mobile-navigation');

?>

<main class="site-wrapper">
