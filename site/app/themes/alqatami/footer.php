<?php

namespace Alqatami\Theme\Footer;

/*
|------------------------------------------------------------------
| Footer Controller
|------------------------------------------------------------------
|
| Controller for outputting layout's closing markup. Template
| rendered here should include `wp_footer()` function call.
|
*/

use function Alqatami\Theme\App\template;

/**
 * Renders layout's footer.
 *
 * @see resources/templates/layout/footer.tpl.php
 */
template('layout/footer');