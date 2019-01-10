<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
    <div class="wrapper">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
