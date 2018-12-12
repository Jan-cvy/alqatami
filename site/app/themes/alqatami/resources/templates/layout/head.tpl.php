<?php
use function Alqatami\Theme\App\asset_path;
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <main id="app" class="app">
            <nav class="nav">
                <div class="nav__burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <a href="<?= get_home_url(); ?>"><img src="<?php echo asset_path('images/logo.png') ?>" class="nav__logo" /></a>
                <div class="nav__wrapper">
                    <?php
                    wp_nav_menu([
                      'theme_location' => 'primary',
                      'menu_class' => 'nav__menu'
                    ]);
                    ?>
                </div>
            </nav>
