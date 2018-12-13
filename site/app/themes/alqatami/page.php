<?php

namespace Alqatami\Theme\Page;

/*
|------------------------------------------------------------------
| Page Controller
|------------------------------------------------------------------
|
| Think about theme template files as some sort of controllers
| from MVC design pattern. They should link application
| logic with your theme view templates files.
|
*/

use function Alqatami\Theme\App\template;

/**
 * Renders index page header.
 *
 * @see resources/templates/index.tpl.php
 */
function render_header()
{
    template('partials/header');
}
add_action('theme/index/header', 'Alqatami\Theme\Index\render_header');

/**
 * Renders single page.
 *
 * @see resources/templates/single.tpl.php
 */
template('page');
