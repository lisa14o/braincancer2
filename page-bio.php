<?php 
/* 
 * Template Name: Bio Gateway
 *
 */
;?>

    <?php get_header();?>
        <!-----page.php--------->

        <div id="content">

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <?php the_content(); ?>



                    <?php endwhile; else: ?>
                        <p>Sorry nobody works here.</p>

                        <?php endif; ?>


        </div>
        <!-- #content -->

        <?php get_footer(); ?>