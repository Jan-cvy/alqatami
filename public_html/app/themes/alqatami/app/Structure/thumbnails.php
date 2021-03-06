<?php

namespace Alqatami\Theme\App\Structure;

/*
|-----------------------------------------------------------
| Custom Thumbnails Sizes
|-----------------------------------------------------------
|
| This file is for registering your custom
| image sizes, for posts thumbnails.
|
*/

/**
 * Adds new thumbnails image sizes.
 *
 * @return void
 */
function add_image_sizes()
{

  add_image_size('image1600', 0, 1600, false);
  add_image_size('image1280', 0, 1280, false);
  // add_image_size('image1024', 0, 1024, false); // full
  add_image_size('image768', 0, 768, false);
  add_image_size('image512', 0, 512, false);
  add_image_size('image384', 0, 384, false);

  add_image_size('image-crop-768', 1152, 768, true);
  add_image_size('image-crop-512', 768, 512, true);
  add_image_size('image-crop-384', 576, 384, true);
  add_image_size('image-crop-256', 384, 256, true);

}
add_action('after_setup_theme', 'Alqatami\Theme\App\Structure\add_image_sizes');
