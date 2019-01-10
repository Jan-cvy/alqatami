<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
  <div class="wrapper">
    <div class="content">
      <div class="carrousel carrousel--home">
        <div class="carrousel__wrapper">
        <?php
        if( have_rows('list_featured_projects') ):

          echo '<ul class="carrousel__list">';
          while ( have_rows('list_featured_projects') ) : the_row();
            
            echo '<li>';
            echo '<a href="'.get_permalink(get_sub_field('project')->ID).'">';
              Image\image_wrapper( array(
                'image' => get_sub_field('image')
              ));
            echo '</a>';
            echo '</li>';

          endwhile;
          echo '</ul>';

        endif;
        ?>
        </div>
        <div class="carrousel__description">
          <?php
          if( have_rows('list_featured_projects') ):

            echo '<ul>';
            while ( have_rows('list_featured_projects') ) : the_row();
              
              echo '<li>'. get_the_title( get_sub_field('project')->ID ) .'</li>';

            endwhile;
            echo '</ul>';

          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
