<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
    <div class="wrapper">
        <div class="content">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                    <div class="single__back">back</div>
                    <?php
                        /**
                         * Functions hooked into `theme/single/content` action.
                         *
                         * @hooked Alqatami\Theme\App\Structure\render_post_content - 10
                         */
                        // do_action('theme/single/content');
                    
                        $gallery = get_field('gallery');
                        if( $gallery ){
                            echo '<ul class="single__list">';
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
                    <div class="single__description">
                        <?php the_title(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php if (apply_filters('theme/single/sidebar/visibility', false)) : ?>
            <?php
                /**
                 * Functions hooked into `theme/single/sidebar` action.
                 *
                 * @hooked Alqatami\Theme\App\Structure\render_sidebar - 10
                 */
                do_action('theme/single/sidebar');
            ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
