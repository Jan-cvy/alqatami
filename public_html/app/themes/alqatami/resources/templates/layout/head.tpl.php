<?php
use function Alqatami\Theme\App\asset_path;
use Alqatami\Theme\App\Structure;
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('no-touch'); ?>>
        <main id="app" class="app">
            <nav class="nav">
                <div class="nav__burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="nav__wrapper">
                    <?php
                    wp_nav_menu([
                      'theme_location' => 'primary',
                      'menu_class' => 'nav__menu',
                      'walker' => new Structure\Sublevel_Walker
                    ]);
                    ?>
                    <div class="nav__gcc">
                        <a href="http://www.gccdomain.com/" target="_blank">GCC</a>
                    </div>
                </div>
            </nav>

            <header class="header portrait">
              <a href="<?= get_home_url(); ?>"><img src="<?php echo asset_path('images/logo.svg') ?>" class="nav__logo" /></a>
            </header>

