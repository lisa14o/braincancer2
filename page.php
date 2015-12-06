<?php get_header();?>
<!-----page.php--------->

<div id="content">
   
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    <article class="halfcol left">
        
        <?php the_post_thumbnail(); ?>
        
        <p><?php the_content(); ?></p>
   </article>      
       
    
    <?php endwhile; else: ?>
        <p>Sorry no posts to display</p>
    
    <?php endif; ?>
    

</div><!-- #content -->   

<?php get_footer(); ?>