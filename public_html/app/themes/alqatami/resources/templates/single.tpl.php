<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
  <div class="wrapper">
    <div class="content">
      <div class="carrousel carrousel--single">
        <div class="carrousel__wrapper">
          <?php
          $gallery = get_field('gallery');
          if( $gallery ){
            echo '<ul class="carrousel__list">';
            foreach( $gallery as $image ){
              echo '<li>';
              Image\image_wrapper( array(
                'image' => $image
              ));
              echo '</li>';
            }
            echo '</ul>';
          }
          ?>
          <div class="carrousel__counter carrousel__counter--mobile mobile portrait">
            <span>1</span> / <?php echo count($gallery); ?>
          </div>
          <div class="carrousel__arrow carrousel__arrow--left"></div>
          <div class="carrousel__arrow carrousel__arrow--right"></div>
          <div class="carrousel__back portrait"><a href="javascript:history.back()">back</a></div>
        </div>
        <div class="carrousel__description portrait">
          <?php the_title(); ?><br>
          <?php 
          $date = get_field("date");
          if( $date ){
            $dateTime = DateTime::createFromFormat("d/m/Y", $date);
            $year = $dateTime->format('Y'); 
          }
          ?>
          <?php echo get_field('location'); ?>
          <?php if( isset( $year ) ): ?>
            <time>[<?php echo $year; ?>]</time> 
          <?php endif; ?>
          <div class="carrousel__counter carrousel__counter--desktop desktop">
            <span>1</span> / <?php echo count($gallery); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
