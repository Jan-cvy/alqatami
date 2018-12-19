<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
    <div class="wrapper">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="content">
          <div class="row row-2">
            <div class="col page__content">
              <?php the_content(); ?>
            </div>
            <div class="col col-first page__image">
              <?php 
              Image\get_responsive_featured_image( array( 
                'ID' => get_the_ID(),
                'width' => 768,
                'height' => 512,
                'class' => 'rs',
                'sizes' => '50vw',
                'crop' => false
              ) );
              ?>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
