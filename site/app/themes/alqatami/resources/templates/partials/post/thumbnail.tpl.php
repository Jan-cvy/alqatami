<?php
use Alqatami\Theme\App\Image;
?>

<article class="thumbnail col">
    <a href="<?php the_permalink(); ?>">
      <?php 
      Image\get_responsive_featured_image( array( 
        'ID' => get_the_ID(),
        'width' => 768,
        'height' => 512,
        'class' => 'rs',
        // 'animation' => $animation,
        'sizes' => '33vw'
      ) );
      ?>
      <p class="thumbnail__title">
        <?php the_title(); ?> <time>[<?php the_field('date'); ?>]</time>
      </p>
    </a>
</article>
