<?php
/*
Template Name: Full Width
This is a utility page with basic loops and no sidebar. It will be an available choice.
*/

get_header();?>

<!----------page-full-width.php---------->

<div id="whole">
    
    
    
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_post_thumbnail(); ?>
        
        <p><?php the_content(); ?></p>
        
        <p><small>Posted
   			<time datetime="<?php the_time('Y-m-d'); ?>">
    		<?php the_time('M j'); ?>
    		</time>
    	by <?php the_author(); ?>
    	<?php comments_number("0 comments", "1 comment", "% comments"); ?>
		</small></p>    
		
    
	
	<?php endwhile; else: ?>
    	<p>Sorry no posts to display</p>
        
    <?php endif; ?>
   
   <?php comments_template(); ?>
   
   

   
</div><!-- #content -->   




<?php get_footer(); ?>
