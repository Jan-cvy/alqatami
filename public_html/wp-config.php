<?php

require __DIR__ . '/app/vendor/autoload.php';

define('WP_CACHE', false);
define( 'WPCACHEHOME', '/Users/vico/GIT/algatami/public_html/app/plugins/wp-super-cache/' );
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/public_html/';

if (!defined('ABSPATH')) {
  define('ABSPATH', $webroot_dir . 'wp/');
}

/** Load the Studio 24 WordPress Multi-Environment Config. */
require_once($webroot_dir . 'config/wp-config.load.php');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');