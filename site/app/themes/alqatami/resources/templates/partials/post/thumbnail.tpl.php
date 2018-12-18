<?php
use Alqatami\Theme\App\Image;
?>

<article class="thumbnail col">
    <a href="<?php the_permalink(); ?>">
      <div>
        <?php 
        Image\get_responsive_featured_image( array( 
          'ID' => get_the_ID(),
          'width' => 768,
          'height' => 512,
          'class' => 'rs',
          // 'animation' => $animation,
          'sizes' => '(min-width: 768px) 33vw, 94vw'
        ) );
        ?>
      </div>
      <p class="thumbnail__title">
        <?php the_title(); ?> <time>[<?php the_field('date'); ?>]</time>
      </p>
    </a>
</article>
