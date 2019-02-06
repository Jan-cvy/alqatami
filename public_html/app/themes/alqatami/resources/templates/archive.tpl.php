<?php get_header(); ?>

<section class="section">
    <div class="wrapper">
        <div class="archive__title">
            <?php echo single_cat_title(); ?>
        </div>
        <div class="content">
            <?php 
            $num = 0;
            $line = 0;
            $opened = false;
            $max = 4;
            if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                    <?php
                        if( $num == 0 ){
                            echo '<div class="row row-'.$max.'">';
                            $opened = true;
                        }

                        /**
                         * Functions hooked into `theme/index/post/thumbnail` action.
                         *
                         * @hooked Alqatami\Theme\App\Structure\render_post_thumbnail - 10
                         */
                        do_action('theme/index/post/thumbnail');

                        $num++;
                        if( 
                            ( $line % 2 == 0 && $num == 4 )
                            || ( $line % 2 == 1 && $num == 3 )
                             ){
                            echo '</div>';
                            $line++;
                            $num = 0;
                            $opened = false;
                            if( $line % 2 == 0 ){
                                $max = 4;
                            }else{
                                $max = 3;
                            }
                        }
                    ?>
                <?php endwhile; ?>

                <?php 
                if( $opened ) {
                    echo '</div>';
                }
                ?>
            <?php else: ?>
                <div class="comingsoon">Coming soon</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
