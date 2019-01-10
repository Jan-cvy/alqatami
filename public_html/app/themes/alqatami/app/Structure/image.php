<?php

namespace Alqatami\Theme\App\Image;

use function Alqatami\Theme\App\config;

global $ALL_SIZES, $ALL_CROP_SIZES;
$ALL_SIZES = [ 'image384', 'image512', 'image768', 'large', 'image1280', 'image1600' ];
$ALL_CROP_SIZES = [ 'image-crop-256', 'image-crop-384', 'image-crop-512', 'image-crop-768' ];

  // add_image_size('image1600', 0, 1600, false);
  // add_image_size('image1280', 0, 1280, false);
  // // add_image_size('image1024', 0, 1024, false); // large
  // add_image_size('image768', 0, 768, false);
  // add_image_size('image512', 0, 512, false);
  // add_image_size('image384', 0, 384, false);

  // add_image_size('image-crop-768', 1152, 768, true);
  // add_image_size('image-crop-512', 768, 512, true);
  // add_image_size('image-crop-384', 576, 384, true);
  // add_image_size('image-crop-256', 384, 256, true);

global $global_default_args;
global $global_default_crop_args;
$global_default_args = array(
  'image'   => '',
  'src'     => '',
  'srcset'  => '',
  'class'   => '',
  'min'     => 'image512',
  'max'     => 'image1600',
  'sizes'   => '100vw',
  'default' => 'large',
  'alt'     => '',
  'type'    => '',
  'prepend' => '',
  'append'  => '',
  'lazy'    => FALSE,
  'animation' => FALSE,
  'parallax' => FALSE,
  'crop'    => FALSE
);

$global_default_crop_args = array_merge(
  $global_default_args,
  array(
    'min' => 'image-crop-256',
    'max' => 'image-crop-768',
    'default' => 'image-crop-512',
    'crop' => TRUE
  )
);


function image_wrapper( $args ){
  if( isset( $args['image'] ) && !empty( $args['image'] ) ){
    get_acf_responsive_image(
      $args
    );
  }
}


function get_acf_responsive_image( $args ){

  global $global_default_args;

  $args = array_merge( $global_default_args, $args );

  $image = $args['image'];
  $thumbs = get_thumbs_size( $args['min'], $args['max'] );

  $src = $image[ 'sizes' ][ $args['default'] ];
  $srcset = '';

  for( $i = 0, $lg = count( $thumbs ); $i<$lg; $i++ ){
    if( isset( $image[ 'sizes' ][ $thumbs[ $i ] ] ) ){
      if( $i !== 0 ) $srcset .= ', ';
      $srcset .= $image[ 'sizes' ][ $thumbs[ $i ] ] . ' ' . $image[ 'sizes' ][ $thumbs[ $i ] . '-width' ] . 'w';
    }
  }

  $args['srcset'] = $srcset;
  $args['src'] = $src;

  if( $args['alt'] === '' ){
    $args['alt'] = $image['alt'];
  }

  echo_responsive_image( $args );

}

function get_responsive_featured_image( $args, $echo = true ){

  global $global_default_crop_args;
  $default_args = array_merge( 
    $global_default_crop_args, 
    $args
  );

  get_responsive_image( $default_args, $echo );

}

function get_responsive_image( $args, $echo = true ){
  
  global $global_default_args;
  $default_args = array_merge( 
    $global_default_args, 
    $args
  );

  $thumbs = get_thumbs_size( $default_args['min'], $default_args['max'], $default_args['crop'] );
  $attachment_id = get_post_thumbnail_id( $default_args['ID'] );
  $thumb_data = get_attachment_data( $attachment_id, $thumbs );

  $srcset = '';
  for( $i = 0, $lg = count( $thumbs ); $i<$lg; $i++ ){
    if( $i !== 0 ) $srcset .= ', ';
    $srcset .= $thumb_data[ $thumbs[ $i ] ][ 0 ] . ' ' . $thumb_data[ $thumbs[ $i ] ][ 1 ] . 'w';
  }

  $alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
  if ( !$alt_text ) { $alt_text = esc_html( get_the_title( $default_args['ID'] ) ); }

  $default_args['alt'] = $alt_text;
  $default_args['srcset'] = $srcset;
  $default_args['src'] = $thumb_data[ $thumbs[ 0 ] ][ 0 ];

  return echo_responsive_image( $default_args, $echo );
  
}

function get_responsive_product_image( $args ){
  
  // global $post; 
  $new_args = array_merge( 
    array(
      'min'     => 'small',
      'max'     => 'large',
      'sizes'   => '(min-width:1440px) 360px, (min-width:768px) 25vw, 50vw',
      'default' => 'medium',
      'type'    => 'product',
      'width'   => 360,
      'height'  => 513,
    ),
    $args 
  );

  get_responsive_image( $new_args );
  
}

function get_responsive_taxonomy_image( $image, $alt, $lazy = true ){

  get_acf_responsive_image( array(
      'image'   => $image,
      'src'     => '',
      'srcset'  => '',
      'min'     => 'woocommerce_single',
      'max'     => 'extra_large',
      'sizes'   => '(min-width:1200px) 554px, (min-width:769px) 47vw, 100vw',
      'type'    => 'taxo',
      'default' => 'medium',
      'alt'     => $alt,
      'lazy'    => $lazy
    )
  );

}

function echo_responsive_image( $args, $echo = true ){

  $imgtag = '';

  if( isset( $args['width'] ) && $args['width'] != '' ){
    $w = $args['width'];
    $h = $args['height'];
  }else if( isset( $args['image'] ) ){
    $w = $args['image']['width'];
    $h = $args['image']['height'];
  }else{
    $w = '';
    $h = '';
  }

  $pb = round( $h / $w * 100, 3 );

  if( $args['animation'] ){
    $args['class'] .= ' js-on-viewport anim-image';
  }

  $class_image = $args['class'];

  if( $args['parallax'] === TRUE ){
    $class_image = "parallax--image";
  }

  // $imgtag .= '<div class="image ' . $args['class'] . '"><div class="imagewrapper" style="padding-bottom:' . $pb . '%">';
  $imgtag .= $args['prepend'];
  if( $args['lazy'] === TRUE ){
    $class_image .= ' js-lazy-load';
    $imgtag .= '<img 
        data-src="' . $args['src'] . '"
        data-srcset="' . $args['srcset'] . '"
        src=""
        srcset=""
        sizes="' . $args['sizes'] . '"
        alt="' . $args['alt'] . '"
        class="' . $class_image . '"
        width="' . $w . '"
        height="' . $h . '"
        />';
  }else{
    $imgtag .= '<img 
        src="' . $args['src'] . '"
        srcset="' . $args['srcset'] . '"
        sizes="' . $args['sizes'] . '"
        alt="' . $args['alt'] . '"
        width="' . $w . '"
        height="' . $h . '"
        class="' . $class_image . '"
        />';
  }
  $imgtag .= $args['append'];
  // $imgtag .= '</div></div>';

  if( $echo ){
    echo $imgtag;
  }else{
    return $imgtag;
  }

}


function get_static_image( $image ){

  echo '<div class="image js-on-viewport anim-image">
    <div class="imagewrapper" style="padding-bottom:41.667%">
    <img data-src="' . $image . '" sizes="360px" alt="" class="js-lazy-load">
    </div>
    </div>';
}

/////////////////////////////
// Image utils
/////////////////////////////
function get_thumbs_size( $min, $max, $crop = FALSE ){
  global $ALL_SIZES, $ALL_CROP_SIZES;

  if( $crop ){
    $sizes = $ALL_CROP_SIZES;
  }else{
    $sizes = $ALL_SIZES;
  }

  $start = array_search( $min,  $sizes );
  if( $start === FALSE ) $start = 0;

  $end = array_search( $max,  $sizes );
  if( $end === FALSE ) $end = count( $sizes ) - 1;

  return array_slice( $sizes, $start, $end - $start + 1 );
}

function get_attachment_data( $attachment_id, $sizes ){

  $data = array();

  for( $i = 0, $lg = count( $sizes ); $i<$lg; $i++ ){

    $data[ $sizes[ $i ] ] = wp_get_attachment_image_src( $attachment_id, $sizes[ $i ] );

  }

  return $data;

}
